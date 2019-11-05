<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening_model extends CI_Model {
    
       function get_all(){
            
            $this->db->select('*');
            $this->db->from('rekening');
            $this->db->order_by('id_rekening', 'desc');
            
            $query = $this->db->get();
            return $query->result();
        }
        function tambah($data){
            $this->db->insert('rekening', $data);
        }
        
        
        function update_rekening($data){
            $this->db->where('id_rekening', $data['id_rekening']);
            $this->db->update('rekening', $data);
        }
        
        function detail($id_rekening) {
            $this->db->select('*');
            $this->db->from('rekening');
            $this->db->where('id_rekening', $id_rekening);
            $this->db->order_by('id_rekening', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function hapus($data){
            $this->db->where('id_rekening', $data['id_rekening']);
            $this->db->delete('rekening', $data);
        }
}