<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth/');
        }
    }

    public function index(){
        $produk = $this->produk_model->get_all('produk');
         
        $data = array ('title'=>'Data Produk', 
            'produk'=>$produk);
        $this->load->view('admin/nav', $data, FALSE);
        $this->load->view('admin/produk', $data, FALSE);
        $this->load->view('admin/foot', $data, FALSE);
    }

    public function tambah_produk(){
        //Ambil data kategori
        $kategori = $this->kategori_model->get_all();
        
        $this->form_validation->set_rules('id_kategori', 'kategori produk', 'required|trim',[
            'required' => 'kategori produk harus diisi.'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
            'required' => 'Nama produk harus diisi.'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim',[
            'required' => 'Harga harus diisi.'
        ]);
        $this->form_validation->set_rules('stok', 'Stok', 'required|trim',[
            'required' => 'Stok harus diisi.'
        ]);
        $this->form_validation->set_rules('ukuran', 'Ukuran', 'required|trim',[
            'required' => 'Ukuran harus diisi.'
        ]);
        $this->form_validation->set_rules('berat', 'Berat', 'required|trim',[
            'required' => 'Berat harus diisi.'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim',[
            'required' => 'Deskripsi harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){

        // Mengenerate ID Barang
        $kode_terakhir = $this->produk_model->getMax('produk', 'kode_produk');
        $kode_tambah = substr($kode_terakhir, -6, 6);
        $kode_tambah++;
        $number = str_pad($kode_tambah, 6, '0', STR_PAD_LEFT);
        $kode_produk['kode_produk'] = 'KP' . $number;
        $data = array ('title' => 'Tambah Produk', 
                'kode_produk'=> $kode_produk,
                'kategori' => $kategori);
        $this->load->view('admin/nav', $data,$kode_produk, FALSE);
        $this->load->view('admin/tambah_produk', $kode_produk, $data, FALSE);
        $this->load->view('admin/foot', $data, $kode_produk, FALSE);
        //End validasi
    }else{
        $config['upload_path'] ='assets/admin/foto/';
        $config['allowed_types'] ='jpg|png|jpeg';
        $config['max_size'] ='2048';
        $this->load->library('upload',$config);
        
        if($this->upload->do_upload('foto')){
            
            $gbr = $this->upload->data(); 
            //proses insert
            $data = [
            'id_kategori' => $this->input->post('id_kategori', true),
            'kode_produk' => $this->input->post('kode_produk', true),
            'nama_produk' => htmlspecialchars($this->input->post('nama', true)),
            'harga' => htmlspecialchars($this->input->post('harga', true)),
            'stok' => htmlspecialchars($this->input->post('stok', true)),
            'ukuran' => htmlspecialchars($this->input->post('ukuran', true)),
            'berat' => htmlspecialchars($this->input->post('berat', true)),
            'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
            'tanggal_post' => $this->input->post('tanggal_post', true),
            'gambar' => $gbr['file_name']
        ];
            $this->produk_model->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('admin/produk', 'refresh');
            }
        }
    }

    public function update_produk($id_produk = null){
    //Ambil data
    $produk = $this->produk_model->getbyid($id_produk);
    $kategori = $this->kategori_model->get_all();

    if($id_produk==null){
        redirect('admin/produk');
    }else{
    //validasi input
    $valid = $this->form_validation;
    $valid->set_rules('nama_produk', 'Nama Produk', 'required',
        array('required' => '%s harus diisi.'));
    
    $valid->set_rules('harga', 'Harga', 'required',
        array('required' => '%s harus diisi.'));
    
    $valid->set_rules('stok', 'Stok', 'required',
        array('required' => '%s harus diisi.'));
    
    $valid->set_rules('ukuran', 'Ukuran', 'required',
        array('required' => '%s harus diisi.'));
    
    $valid->set_rules('berat', 'Berat', 'required',
        array('required' => '%s harus diisi.'));

    $valid->set_rules('deskripsi', 'Deskripsi', 'required',
        array('required' => '%s harus diisi.'));        
    

    if($valid->run()){
        //Cek jika gambar diganti
        if(!empty($_FILES['gambar']['name'])){

        $config['upload_path'] ='./assets/admin/foto/';
        $config['allowed_types'] ='jpg|png|jpeg';
        $config['max_size'] ='2048';
        $this->load->library('upload',$config);
        
        if(!$this->upload->do_upload('gambar')){
    //end validasi

    $data = array('title' => 'Edit Data Produk : '.$produk->nama_produk,
                'message' => $this->upload->display_errors(),
                'produk' => $produk,
                'kategori' => $kategori);
    $this->load->view('admin/nav', $data, FALSE);
    $this->load->view('admin/update_produk', $data, FALSE);
    $this->load->view('admin/foot', $data, FALSE);
    
    //Masuk database
    }else{
          
        $gbr = array('upload_data' => $this->upload->data());
        $i = $this->input;
        $data = array('id_produk'   => $id_produk,
                    'id_kategori'   => $i->post('id_kategori'),
                    'kode_produk'   => $i->post('kode_produk'),
                    'nama_produk'   => $i->post('nama_produk'),
                    'harga'         => $i->post('harga'),
                    'stok'          => $i->post('stok'),
                    'ukuran'        => $i->post('ukuran'),
                    'berat'         => $i->post('berat'),
                    'deskripsi'     => $i->post('deskripsi'),
                    'gambar'        => $gbr['upload_data']['file_name']
                    );

        $this->produk_model->update_produk($data);
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diedit.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/produk'), 'refresh');
        }}else{
            //Edit produk tanpa mengganti gambar
            $i = $this->input;
            $data = array('id_produk'   => $id_produk,
                'id_kategori'   => $i->post('id_kategori'),
                'kode_produk'   => $i->post('kode_produk'),
                'nama_produk'   => $i->post('nama_produk'),
                'harga'         => $i->post('harga'),
                'stok'          => $i->post('stok'),
                'ukuran'        => $i->post('ukuran'),
                'berat'         => $i->post('berat'),
                'deskripsi'     => $i->post('deskripsi'),
                // 'gambar'        => $gbr['upload_data']['file_name']
                );

            $this->produk_model->update_produk($data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diedit.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect(base_url('admin/produk'), 'refresh');
        }}
            $data = array('title' => 'Edit Data Produk : '.$produk->nama_produk,
            'produk' => $produk,
            'kategori' => $kategori);
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/update_produk', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
        }   
    }
     
    public function detail_produk($id_produk){
        $data['produk'] = $this->produk_model->get($id_produk);
        if($id_produk==null){
            redirect('admin/produk');
        }else{
        $data['title'] = 'Detail Produk';
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/detail_produk', $data);
        $this->load->view('admin/foot');
        }
    }
    
    public function hapus_produk($id){
        $data = array('id_produk' => $id);
        $this->produk_model->hapus($data, 'produk');
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
        redirect('admin/produk', 'refresh');
    }
    
}