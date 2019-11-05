<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian_model extends CI_Model {

    function konfirmasi($id_user){
        $this->db->select('*');
        $this->db->from('header_transaksi');
        $this->db->where('header_transaksi.id_pembelian', $id_user);
        $this->db->join('transaksi', 'header_transaksi.id_transaksi = transaksi.id_transaksi');
        $query = $this->db->get();
        return $query->result();
    }

    function user($id_user){
        $this->db->select('header_transaksi.*, produk.nama_produk, transaksi.jumlah, transaksi.total_harga');
        $this->db->from('header_transaksi');
        $this->db->where('header_transaksi.id_user', $id_user);
        $this->db->join('transaksi','transaksi.id_transaksi = header_transaksi.id_transaksi', 'left');
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
        $this->db->group_by('header_transaksi.id_transaksi');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function riwayat($id_pelanggan){
        $this->db->select('*');
        $this->db->from('transaksi'); 
        $this->db->where('transaksi.id_user', $id_pelanggan);
        $this->db->group_by('transaksi.id_pembayaran');
        $this->db->order_by('id_pembayaran', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function get_all(){
        $this->db->select('transaksi.*,users.nama,produk.nama_produk, header_transaksi.status, header_transaksi.telepon');
        $this->db->from('transaksi');
        $this->db->join('users', 'users.id_user = transaksi.id_user', 'left');
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
        $this->db->join('header_transaksi', 'header_transaksi.id_transaksi = transaksi.id_transaksi', 'left');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    function tambah($data){
        $this->db->insert('transaksi', $data);
    }

    function tambah_konfirmasi($data){
        $this->db->insert('header_transaksi', $data);
    }

    function hapus_pembelian($data){
        $this->db->where('id_transaksi', $data['id_transaksi']);
        $this->db->delete('header_transaksi', $data);
        $this->db->delete('transaksi', $data);
    }
   
    function update_pembelian($data=null){
        $this->db->where('id_transaksi',$data['id_transaksi']);
        $this->db->update('header_transaksi', $data);
    }

    function detail($id_transaksi) {
        $this->db->select('*');
        $this->db->from('header_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();

        return $query->result();
    }

    function get($id_transaksi) {
        $this->db->select('*');
        $this->db->from('header_transaksi');
        $this->db->where('id_transaksi', $id_transaksi);
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();

        return $query->row();
    }
    
    public function getPembelian($limit = null, $id_pembelian = null, $range = null)
    {
        $this->db->select('*');
        $this->db->join('users', 'users.id_user = header_transaksi.id_user');
        $this->db->join('transaksi', 'transaksi.id_transaksi = header_transaksi.id_transaksi');
        if ($limit != null) {
            $this->db->limit($limit);
        }
        if ($id_pembelian != null) {
            $this->db->where('id_pembelian', $id_pembelian);
        }
        if ($range != null) {
            $this->db->where('tanggal_transaksi' . ' >=', $range['mulai']);
            $this->db->where('tanggal_transaksi' . ' <=', $range['akhir']);
        }
        $this->db->order_by('id_pembelian', 'DESC');
        return $this->db->get('header_transaksi')->result_array();
    }

    function transaksi() {
        $this->db->select('transaksi.*,users.nama,produk.nama_produk, header_transaksi.status, header_transaksi.telepon');
        $this->db->from('transaksi');
        $this->db->where('status','Konfirmasi');
        $this->db->join('users', 'users.id_user = transaksi.id_user', 'left');
        $this->db->join('produk', 'produk.id_produk = transaksi.id_produk', 'left');
        $this->db->join('header_transaksi', 'header_transaksi.id_transaksi = transaksi.id_transaksi', 'left');
        $this->db->order_by('id_transaksi', 'desc');
        $query = $this->db->get();

        return $query->result();
    }
   
}