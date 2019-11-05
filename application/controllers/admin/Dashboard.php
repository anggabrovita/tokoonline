<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth');
        }
        $this->load->model('produk_model');
        $this->load->model('pelanggan_model');
    }

    public function index()
	{
            $data['title'] = 'Oktias Bakery & Cake : Admin';
            $data['kategori'] = $this->db->query("SELECT count(id_kategori) FROM kategori ")->result_array();
            $data['rekening'] = $this->db->query("SELECT count(id_rekening) FROM rekening ")->result_array();
            $data['produk'] = $this->db->query("SELECT count(id_produk) FROM produk ")->result_array();
            $data['pelanggan'] = $this->db->query("SELECT count(id_user) FROM users ")->result_array();
            $data['getproduk'] = $this->produk_model->getProduk(5);
            $data['transaksi'] = $this->pembelian_model->getPembelian(5);
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/dashboard', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
        }
}
