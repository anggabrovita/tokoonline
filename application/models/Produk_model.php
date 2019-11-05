<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk_model extends CI_Model {
       
   function get_all(){
        $this->db->select('produk.*,kategori.nama_kategori,Kategori.url');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function read($url){
        $this->db->select('kategori.*,produk.nama_produk,produk.gambar, produk.harga, produk.id_produk, produk.kode_produk');
        $this->db->from('kategori');
        $this->db->join('produk', 'produk.id_kategori = kategori.id_kategori', 'left');
        $this->db->where('kategori.url',$url);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function listing_kategori(){
        $this->db->select('produk.*,kategori.nama_kategori,Kategori.url');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->group_by('produk.id_kategori');
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    
    function tambah($data){
        $this->db->insert('produk', $data);
    }
    
    function update_produk($data){
        $this->db->where('id_produk', $data['id_produk']);
        return $this->db->update('produk', $data);
    }
    
    public function detail($kode_produk) {

        $this->db->select('produk.*, kategori.url');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->where('kode_produk', $kode_produk);
        $this->db->order_by('kode_produk', 'desc');
        $query = $this->db->get();
        
        return $query->row();
    }

    public function getbyid($id_produk) {

        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        
        return $query->row();
    }

    public function get($id_produk) {

        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('id_produk', $id_produk);
        $this->db->order_by('id_produk', 'desc');
        $query = $this->db->get();
        
        return $query->result();
    }
    
    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }
    
    function hapus($data){
        $this->db->where('id_produk', $data['id_produk']);
        $this->db->delete('produk', $data);
    }
    function nav_produk(){
        $this->db->select('produk.*,
                kategori.nama_kategori,
                kategori.url');
        $this->db->from('produk');
        $this->db->join('kategori', 'kategori.id_kategori = produk.id_kategori', 'left');
        $this->db->group_by('produk.id_kategori');
        $this->db->order_by('kategori.urutan', 'asc');
        $query = $this->db->get();
        return $query->result();
        
    }
    
    public function getProduk($limit = null, $id_produk = null, $range = null)
    {
        $this->db->select('*');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($id_produk != null) {
            $this->db->where('id_produk', $id_user);
        }
        if ($range != null) {
            $this->db->where('tanggal_daftar' . ' >=', $range['mulai']);
            $this->db->where('tanggal_daftar' . ' <=', $range['akhir']);
        }
        $this->db->order_by('id_produk', 'DESC');
        return $this->db->get('produk')->result_array();
    }
    
    function total_produk(){
        $this->db->select('COUNT(*)');
        $this->db->from('produk');
        $this->db->where('produk', 'id_produk');
        $query = $this->db->get();
        return $query->row();
    }        
}