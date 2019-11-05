<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->library('Pdf_report');
        $this->load->model('produk_model');
        $this->load->model('kategori_model');
        $this->load->model('pelanggan_model');
        $this->load->model('pembelian_model');
    }
    
    public function data_produk(){
        $produk = $this->produk_model->get_all();
        $data = array ('title'=> 'Laporan Data Produk',
            'produk'=>$produk);
        $this->load->view('admin/c_produk', $data);
        }
        
    public function stok_produk(){
        $produk = $this->produk_model->get();
        $kategori = $this->kategori_model->get_all();
        $data = array ('title'=> 'Laporan Data Produk',
            'produk'=>$produk, 
            'kategori', $kategori);
        $this->load->view('admin/c_stok_produk', $data);
        }

    public function data_pelanggan(){
        $pelanggan = $this->pelanggan_model->get_all();
        $data = array ('title'=> 'Laporan Data Pelanggan',
            'pelanggan' =>$pelanggan);
        $this->load->view('admin/c_data_pelanggan', $data);
        }

    public function penjualan(){
        $pembelian = $this->pembelian_model->transaksi();
        $data = array ('title'=> 'Laporan Penjualan',
            'pembelian' =>$pembelian);
        $this->load->view('admin/c_penjualan', $data);
        }

    public function resi($id_transaksi){
        $pembelian = $this->pembelian_model->resi($id_transaksi);
        $data = array ('title'=> 'Laporan Penjualan',
            'pembelian' =>$pembelian);
        $this->load->view('admin/c_resi', $data);
        }
}