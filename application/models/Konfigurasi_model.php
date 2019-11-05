<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi_model extends CI_Model {
    
       function get_all(){
            
            $this->db->select('*');
            $this->db->from('konfigurasi');
            $this->db->order_by('id_konfigurasi', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }

        function tambah($data){
            $this->db->insert('konfigurasi', $data);
        }
        
        
        function update_konfigurasi($data){
            $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
            return $this->db->update('konfigurasi', $data);
        }

        //Edit
        public function edit($data){
        $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
        $this->db->update('konfigurasi', $data);
        }
        
        function detail($id_konfigurasi) {
            $this->db->select('*');
            $this->db->from('konfigurasi');
            $this->db->where('id_konfigurasi', $id_konfigurasi);
            $this->db->order_by('id_konfigurasi', 'desc');
            $query = $this->db->get();
            
            return $query->row();
        }
        
        function hapus($data){
            $this->db->where('id_konfigurasi', $data['id_konfigurasi']);
            $this->db->delete('konfigurasi', $data);
        }
}