<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('kategori_model');
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth/');
        }
    }


    public function index()
	{
            $data['title'] = 'Kategori Produk';
            
            $data['data'] = $this->kategori_model->get_all();
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/kategori', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
        }

    public function tambah_kategori(){
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required|trim|is_unique[kategori.nama_kategori]',[
            'required' => 'Nama Kategori harus diisi.',
            'is_unique' => 'Nama Kategori Sudah Ada. Buat kategori baru!'
        ]);
        $this->form_validation->set_rules('urutan', 'Urutan', 'required|trim',[
            'required' => 'Urutan harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){
        $data['title'] = 'Oktias Bakery & Cake : Tambah Kategori';
        $this->load->view('admin/nav', $data, FALSE);
        $this->load->view('admin/tambah_kategori', $data, FALSE);
        $this->load->view('admin/foot', $data, FALSE);
        }else{
            $input = $this->input;
            
            $url = url_title($this->input->post('nama_kategori'), 'dash', true);
            $data = [
            'nama_kategori' => $input->post('nama_kategori', true),
            'url' => $url,
            'urutan' => $input->post('urutan', true)
            ];
            
            $this->kategori_model->tambah($data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect(base_url('admin/kategori'), 'refresh');
        }
    }
    
    public function update_kategori($id_kategori){
            
        if($id_kategori==null){
            redirect('admin/kategori');
        }else{
            $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required',[
            'required' => 'Nama Kategori harus diisi.']);
            $this->form_validation->set_rules('urutan', 'Urutan', 'required|trim',[
                    'required' => 'Urutan harus diisi.'
                ]);
                
            if ($this->form_validation->run() == false){
            $kategori = $this->kategori_model->detail($id_kategori);
            $data = array ('title' => 'Update Kategori : '.$kategori->nama_kategori, 
                'kategori' => $kategori);
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/update_kategori', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
            //kalau tidak ada error
            }else{
                $input = $this->input;
                
                $slug = url_title($this->input->post('nama_kategori'), 'dash', true);
                $data = [
                'id_kategori' => $id_kategori,
                'nama_kategori' => $input->post('nama_kategori', true),
                'url' => $slug,
                'urutan' => $input->post('urutan', true)
            ];
            $this->kategori_model->update_kategori($data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diupdate.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
            redirect(base_url('admin/kategori'), 'refresh');
            }
        }
    }
    
    public function hapus_kategori($id){
        $data = array('id_kategori' => $id);
        $this->kategori_model->hapus($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/kategori', 'refresh');
    }
    
}