<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_model extends CI_Model {
    
       function get_all(){
            
            $this->db->select('*');
            $this->db->from('kategori');
            $this->db->order_by('id_kategori', 'desc');
            
            $query = $this->db->get();
            return $query->result();
        }
        
        function tambah($data){
            $this->db->insert('kategori', $data);
        }
        
        
        function update_kategori($data){
            $this->db->where('id_kategori', $data['id_kategori']);
            return $this->db->update('kategori', $data);
        }
        
        function detail($id_kategori) {
            $this->db->select('*');
            $this->db->from('kategori');
            $this->db->where('id_kategori', $id_kategori);
            $this->db->order_by('id_kategori', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function hapus($data){
            $this->db->where('id_kategori', $data['id_kategori']);
            $this->db->delete('kategori', $data);
        }
}