<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends CI_Controller {
    
   public function __construct() {
        parent::__construct();
        $this->load->model('app');
        $this->load->model('produk_model');
        $this->load->model('pelanggan_model');
        $this->load->model('pembelian_model');
        //random string
        $this->load->helper('String');
    }
    public function index() {
        $data['keranjang'] = $this->cart->contents();
            
        $data['title'] = 'Keranjang Belanja : Oktias Bakery & Cake';
        $this->load->view('templates/navbar', $data);
        $this->load->view('member/keranjang', $data);
        $this->load->view('templates/footer');
    }
    
    public function sukses() {
        
        $pembelian = $this->pembelian_model->transaksi();
        $data = array('title'=> 'Belanja Berhasil',
                'pembelian'=>$pembelian);
        $this->load->view('templates/navbar', $data);
        $this->load->view('member/sukses', $data);
        $this->load->view('templates/footer');
    }
    public function berhasil() {
        $data['title'] = 'Konfirmasi Berhasil';
        $this->load->view('templates/navbar', $data);
        $this->load->view('member/berhasil', $data);
        $this->load->view('templates/footer');
    }
    
    public function checkout() {
        //cek sudah login atau belum
        if(!$this->session->userdata('email')){
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
        redirect('member');
        }
        //cek sudah atau belum belanja
        if(!$this->cart->contents()){
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
        redirect('index');
        }

            if($this->session->userdata('email')){
                $email = $this->session->userdata('email');
                $nama = $this->session->userdata('nama');
                $pelanggan = $this->pelanggan_model->sudah_login($email, $nama);
                $keranjang = $this->cart->contents();
                
                $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim',[
                'required' => 'Nama harus diisi!'
                ]);
                $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
                    'required' => 'Email harus diisi!',
                    'valid_email' => 'Email tidak valid!'
                ]);
                $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
                    'required' => 'Alamat harus diisi!'
                ]);
                $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim',[
                    'required' => 'Telepon harus diisi!']);

                if($this->form_validation->run() == FALSE){
                    
                $data = array('title'=>'Checkout : Oktias Bakery & Cake',
                    'pelanggan'=> $pelanggan,
                    'keranjang'=>$keranjang);
                $this->load->view('templates/navbar', $data);
                $this->load->view('member/checkout', $data);
                $this->load->view('templates/footer');
            }else{
                $i = $this->input;
                $data = [
                    'id_user' => $pelanggan->id_user,
                    'id_transaksi' => $i->post('id_transaksi'),
                    'nama' => $i->post('nama'),
                    'status' => 'Belum Konfirmasi',
                    'email' => $i->post('email'),
                    'telepon' => $i->post('telepon'),
                    'alamat' => $i->post('alamat'),
                    'tanggal_transaksi' => $i->post('tanggal_transaksi')];
                    $this->pembelian_model->tambah_konfirmasi($data);
                
                foreach ($keranjang as $keranjang) {
                    $subtotal = $keranjang['price'] * $keranjang['qty'];
                    
                    $data = [
                    'id_user' => $pelanggan->id_user,
                    'id_transaksi' => $i->post('id_transaksi'),
                    'id_produk' => $keranjang['id'],
                    'harga' => $keranjang['price'],
                    'jumlah' => $keranjang['qty'],
                    'total_harga' => $subtotal,
                    'tanggal_transaksi' => $i->post('tanggal_transaksi')];
                $this->pembelian_model->tambah($data);
                }
                $this->cart->destroy();
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Belanja Berhasil. Silahkan konfirmasi pembayaran agar bisa segera kami proses.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>');
                redirect(base_url('keranjang/sukses'),'refresh');
            }
    }}
    
    public function add() {
            
        $id = $this->input->post('id');
        $qty = $this->input->post('qty');
        $price = $this->input->post('price');
        $name = $this->input->post('name');
        $redirect_page = $this->input->post('redirect_page');
         
            $data = array (
              'id' => $id,  
              'qty' => $qty,  
              'price' => $price,  
              'name' => $name  
            );
            $this->cart->insert($data);
            redirect($redirect_page, 'refresh');
    }

    public function update_cart($rowid){
        if($rowid){
            $data = ['rowid' => $rowid,
                    'qty' => $this->input->post('qty')];
            $this->cart->update($data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning m-t-10" role="alert">Belanja berhasil diupdate.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect(base_url('keranjang'),'refresh');
        }else{
            redirect(base_url('keranjang'),'refresh');
        }
    }

    public function hapus($rowid){

        if($rowid){
            $this->cart->remove($rowid);
            $this->session->set_flashdata('message', '<div class="alert alert-warning m-t-10" role="alert">Keranjang belanja berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect(base_url('keranjang'),'refresh');
        }
    }

    public function hapus_keranjang(){
        $this->cart->destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-warning m-t-10" role="alert">Keranjang belanja berhasil dihapus.
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button></div>');
        redirect(base_url('keranjang'),'refresh');
    }
}