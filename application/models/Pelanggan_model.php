<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan_model extends CI_Model {
    
       function get_all(){
            
            $this->db->select('*');
            $this->db->from('users');
            $this->db->order_by('id_user', 'desc');
            
            $query = $this->db->get();
            return $query->result();
        }
        
        function sudah_login($email= null, $nama= null){
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('email', $email);
            $this->db->where('nama', $nama);
            $this->db->order_by('id_user', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function get($id_user) {
            $this->db->select('*');
            $this->db->from('users');
            $this->db->where('id_user', $id_user);
            $this->db->order_by('id_user', 'desc');
            $query = $this->db->get();
            
            return $query->result();
        }

        function hapus($data){
            $this->db->where('id_user', $data['id_user']);
            $this->db->delete('users', $data);
        }
}