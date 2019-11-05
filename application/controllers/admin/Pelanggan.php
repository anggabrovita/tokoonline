<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth/');
        }
        $this->load->model('pelanggan_model');
    }
    
    public function index(){
            $data['title'] = 'Data Pelanggan';
            $data['pelanggan'] = $this->pelanggan_model->get_all();
            
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/pelanggan', $data, FALSE);
            $this->load->view('admin/foot');
    }
    public function detail_pelanggan($id_user){
        $data['pelanggan'] = $this->pelanggan_model->get($id_user);
        
        if($id_user==null){
            redirect('admin/pelanggan');
        }else{
        $data['title'] = 'Detail Pelanggan';
        $this->load->view('admin/nav', $data);
        $this->load->view('admin/detail_pelanggan', $data);
        $this->load->view('admin/foot');
        }
    }
    public function hapus_pelanggan($id){
        $data = array('id_user' => $id);
        $this->admin->hapus($data, 'users');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/pelanggan', 'refresh');
    }
}