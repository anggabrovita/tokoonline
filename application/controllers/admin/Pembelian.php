<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth/');
        }
        $this->load->model('pembelian_model');
        $this->load->model('produk_model');
    }
    
    public function index(){
            $pembelian = $this->pembelian_model->get_all();
            $data= array('title'=> 'Data Pembelian', 'pembelian'=>$pembelian);
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/pembelian', $data);
            $this->load->view('admin/foot');
            
        }
    public function hapus_pembelian($id_transaksi){
        $data = array('id_transaksi' => $id_transaksi);
        $this->pembelian_model->hapus_pembelian($data);
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
        redirect('admin/pembelian', 'refresh');
    }
    public function detail_pembelian($id_transaksi){
        $transaksi = $this->pembelian_model->detail($id_transaksi);

        if($id_transaksi==''){
            redirect('admin/pembelian');
        }else{
            $data = array('title'=> 'Detail Pembelian','transaksi'=>$transaksi);
            $this->load->view('admin/nav', $data);
            $this->load->view('admin/detail_pembelian', $data);
            $this->load->view('admin/foot');
        }
    }
    
}