<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Model {
    
	public function tambah($tabel='', $data='')
	{
            $this->db->insert($tabel, $data);
        }
        
        public function sudah_login($email= null, $nama= null){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email', $email);
            $this->db->where('nama', $nama);
            $this->db->order_by('id_user', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function get_all($table){
            $this->db->from($table);
            
            return $this->db->get();
        }
        function get_where($where = null, $table = null){
            return $this->db->get_where($table, $where);
        }
        function detail($id_produk) {
            $this->db->select('*');
            $this->db->from('produk');
            $this->db->where('id_produk', $id_produk);
            $this->db->order_by('id_produk', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function update_produk($where, $table, $data){
            $this->db->where($where);
            $this->db->update($table, $data);
        }
                
        function hapus_produk($where, $table){
            $this->db->where($where);
            $this->db->delete($table);
        }
}
