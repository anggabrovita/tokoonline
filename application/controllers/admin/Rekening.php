<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekening extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('rekening_model');
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth/');
        }
    }


    public function index()
	{
            $data['title'] = 'Rekening Produk';
            
            $data['data'] = $this->rekening_model->get_all();
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/rekening', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
        }

    public function tambah_rekening(){
        
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required|trim',[
            'required' => 'Nama rekening harus diisi.'
        ]);

        $this->form_validation->set_rules('nomor_rekening', 'Nomor Rekening', 'required|trim|is_unique[rekening.nomor_rekening]',[
            'required' => 'Nomor Rekening harus diisi.',
            'is_unique' => 'Nomor Rekening Sudah Ada. Buat rekening baru!'
        ]);
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|trim',[
            'required' => 'Nama pemilik harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){

        $data['title'] = 'Oktias Bakery & Cake : Tambah Rekening';
        $this->load->view('admin/nav', $data, FALSE);
        $this->load->view('admin/tambah_rekening', $data, FALSE);
        $this->load->view('admin/foot', $data, FALSE);
    }else{
            $input = $this->input;
            
            $data = [
            'nama_bank' => $input->post('nama_bank', true),
            'nomor_rekening' => $input->post('nomor_rekening', true),
            'nama_pemilik' => $input->post('nama_pemilik', true)
        ];
        $this->rekening_model->tambah($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil ditambahkan.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/rekening'), 'refresh');
        }
    }
    
    //Edit
    public function update_rekening($id_rekening){
            
        if($id_rekening==null){
            redirect('admin/rekening');
        }else{
        $this->form_validation->set_rules('nama_bank', 'Nama Bank', 'required',[
        'required' => 'Nama Bank harus diisi.']);
        $this->form_validation->set_rules('nama_pemilik', 'Nama Pemilik', 'required|trim',[
                'required' => 'Urutan harus diisi.'
            ]);
            
            if ($this->form_validation->run() == false){
            $rekening = $this->rekening_model->detail($id_rekening);
            $data =array ('title' => 'Update Rekening : '.$rekening->nama_pemilik, 'rekening' => $rekening);
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/update_rekening', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
            //kalau tidak ada error
            }else{
                $input = $this->input;
                
                $data = [
                'id_rekening' => $id_rekening,
                'nama_bank' => $input->post('nama_bank', true),
                'nomor_rekening' => $input->post('nomor_rekening', true),
                'nama_pemilik' => $input->post('nama_pemilik', true)
            ];
            $this->rekening_model->update_rekening($data);
            $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Data berhasil diupdate.
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect(base_url('admin/rekening'), 'refresh');
            }
        }
    }
    
    public function hapus_rekening($id){
        $data = array('id_rekening' => $id);
        $this->rekening_model->hapus($data);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data berhasil dihapus.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('admin/rekening', 'refresh');
    }
    
}