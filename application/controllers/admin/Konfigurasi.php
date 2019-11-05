<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfigurasi extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model('konfigurasi_model');
        if(!$this->session->userdata('email')){
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Silahkan Login terlebih dahulu!</div>');
            redirect('auth/');
        }
    }

    //Konfigurasi Umum
    public function index()
	{
        $data['title'] = 'Konfigurasi';
        
        $data['konfigurasi'] = $this->konfigurasi_model->get_all();
        $this->load->view('admin/nav', $data, FALSE);
        $this->load->view('admin/konfigurasi', $data, FALSE);
        $this->load->view('admin/foot', $data, FALSE);
    }

    public function simpan(){
        $konfigurasi = $this->konfigurasi_model->get_all();

        $this->form_validation->set_rules('email', 'Email', 'required|trim',[
            'required' => 'Email harus diisi.'
        ]);
        $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim',[
            'required' => 'Telepon harus diisi.'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
            'required' => 'alamat harus diisi.'
        ]);
        $this->form_validation->set_rules('facebook', 'Facebook', 'required|trim',[
            'required' => 'Facebook harus diisi.'
        ]);
        $this->form_validation->set_rules('instagram', 'Instagram', 'required|trim',[
            'required' => 'instagram harus diisi.'
        ]);
        $this->form_validation->set_rules('author', 'Author', 'required|trim',[
            'required' => 'Telepon harus diisi.'
        ]);
        $this->form_validation->set_rules('keyword', 'Keywords', 'required|trim',[
            'required' => 'Telepon harus diisi.'
        ]);
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim',[
            'required' => 'Telepon harus diisi.'
        ]);
        
        if ($this->form_validation->run() == false){

        $data = array( 'title' => 'Oktias Bakery & Cake : Konfigurasi Website', 
                        'konfigurasi' => $konfigurasi);
        $this->load->view('admin/nav', $data, FALSE);
        $this->load->view('admin/konfigurasi', $data, FALSE);
        $this->load->view('admin/foot', $data, FALSE);
    }else{
            $input = $this->input;
           
            $data = ['id_konfigurasi' => $konfigurasi->id_konfigurasi,
                    'email' => $input->post('email'),
                    'telepon' => $input->post('telepon'),
                    'alamat' => $input->post('alamat'),
                    'facebook' => $input->post('facebook'),
                    'instagram' => $input->post('instagram'),
                    'author' => $input->post('author'),
                    'keyword' => $input->post('keyword'),
                    'deskripsi' => $input->post('deskripsi')
        ];
        $this->konfigurasi_model->edit($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect(base_url('admin/konfigurasi'), 'refresh');
        }
    }
    //End Konfigurasi Umum
    
    //Konfigurasi logo
    public function logo(){

        $konfigurasi = $this->konfigurasi_model->get_all();
        $data = array('title' => 'Konfigurasi Logo Website',
                    'konfigurasi' => $konfigurasi);
        $this->load->view('admin/nav', $data, FALSE);
        $this->load->view('admin/konfigurasi_logo', $data, FALSE);
        $this->load->view('admin/foot', $data, FALSE);
    }

    public function simpan_logo()
    {
        $konfigurasi = $this->konfigurasi_model->get_all();

        if(!empty($_FILES['logo']['name'])){
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);

            if(! $this->upload->do_upload('logo')){
                $data = array('title' => 'Konfigurasi Logo Website',
                            'konfigurasi' => $konfigurasi
                 );
            
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/konfigurasi_logo', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
            }else{
                $upload_gambar = array('upload_data' => $this->upload->data());

                $data = array('id_konfigurasi' => $konfigurasi->id_konfigurasi,
                            'logo' => $upload_gambar['upload_data']['file_name'] );

                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan.
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect(base_url('admin/konfigurasi/logo'), 'refresh');
            }
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/konfigurasi/logo', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
        }
    }
    //End konfigurasi logo

    //Konfigurasi icon
    public function icon(){

        $konfigurasi = $this->konfigurasi_model->get_all();
        $data = array('title' => 'Konfigurasi Icon Website',
                    'konfigurasi' => $konfigurasi);
        $this->load->view('admin/nav', $data, FALSE);
        $this->load->view('admin/konfigurasi_icon', $data, FALSE);
        $this->load->view('admin/foot', $data, FALSE);
    }

    public function simpan_icon()
    {
        $konfigurasi = $this->konfigurasi_model->get_all();

        if(!empty($_FILES['icon']['name'])){
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);

            if(! $this->upload->do_upload('icon')){
                $data = array('title' => 'Konfigurasi Icon Website',
                            'konfigurasi' => $konfigurasi
                 );
            
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/konfigurasi_icon', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
            }else{
                $upload_gambar = array('upload_data' => $this->upload->data());

                $data = array('id_konfigurasi' => $konfigurasi->id_konfigurasi,
                            'icon' => $upload_gambar['upload_data']['file_name'] );

                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan.
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect(base_url('admin/konfigurasi/icon'), 'refresh');
            }
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/konfigurasi/icon', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
        }
    }
    //End konfigurasi icon

    //Konfigurasi banner
    public function banner(){

        $konfigurasi = $this->konfigurasi_model->get_all();
        $data = array('title' => 'Konfigurasi Banner Website',
                    'konfigurasi' => $konfigurasi);
        $this->load->view('admin/nav', $data, FALSE);
        $this->load->view('admin/konfigurasi_banner', $data, FALSE);
        $this->load->view('admin/foot', $data, FALSE);
    }

    public function simpan_banner()
    {
        $konfigurasi = $this->konfigurasi_model->get_all();

        if(!empty($_FILES['banner']['name'])){
            $config['upload_path'] = './assets/img';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload', $config);

            if(! $this->upload->do_upload('banner')){
                $data = array('title' => 'Konfigurasi Banner Website',
                            'konfigurasi' => $konfigurasi
                 );
            
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/konfigurasi_banner', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
            }else{
                $upload_gambar = array('upload_data' => $this->upload->data());

                $data = array('id_konfigurasi' => $konfigurasi->id_konfigurasi,
                            'banner' => $upload_gambar['upload_data']['file_name'] );

                $this->konfigurasi_model->edit($data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data berhasil disimpan.
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                redirect(base_url('admin/konfigurasi/banner'), 'refresh');
            }
            $this->load->view('admin/nav', $data, FALSE);
            $this->load->view('admin/konfigurasi/banner', $data, FALSE);
            $this->load->view('admin/foot', $data, FALSE);
        }
    }
    //End konfigurasi banner
}