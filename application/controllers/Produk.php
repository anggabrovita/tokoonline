<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
    
   public function __construct() {
        parent::__construct();
        
        $this->load->model('produk_model');
    }
    public function index(){
        $produk_listing  = $this->produk_model->nav_produk();
        $listing_kategori = $this->produk_model->listing_kategori();
        $data['produk'] = $this->produk_model->get_all();
        
        $data = array('title'=>'Produk : Oktias Bakery & Cake',
            'produk_listing'=>$produk_listing,'listing_kategori'=>$listing_kategori,
            //'produk'=>$produk,
            //'pagin'=> $this->pagination->create_links()
            );
        $this->load->view('templates/navbar', $data);
        $this->load->view('member/produk', $data);
        $this->load->view('templates/footer');
    }

    public function detail($kode_produk) {

        if($kode_produk==null){
            redirect('produk');
        }else{
            $produk = $this->produk_model->detail($kode_produk);
            $listing_kategori = $this->produk_model->listing_kategori();
            
            $data = array('title'=>'Detail : Oktias Bakery & Cake', 
                'produk'=> $produk,
                'listing_kategori'=> $listing_kategori);
            $this->load->view('templates/navbar', $data);
            $this->load->view('member/detail', $data);
            $this->load->view('templates/footer');
        }
    }

    public function kategori($url) {

        if($url==null){
            redirect('produk');
        }else{
            $perkategori = $this->produk_model->read($url);
            
            $data = array('title'=>'Kategori : Oktias Bakery & Cake', 
                'perkategori'=> $perkategori);
            $this->load->view('templates/navbar', $data);
            $this->load->view('member/kategori', $data);
            $this->load->view('templates/footer');
        }
    }
}