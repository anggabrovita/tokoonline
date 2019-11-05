<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('app');
    }
    
    public function index(){
        
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
                'required' => 'Email harus diisi!',
                'valid_email' => 'Email tidak valid!'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim', [
                'required' => 'Password harus diisi!',
            ]);
            
            if($this->form_validation->run() == FALSE){
            $data['title'] = 'Oktias Bakery & Cake : Member Login';
            $this->load->view('templates/navbar', $data, FALSE);
            $this->load->view('login', $data, FALSE);
            $this->load->view('templates/footer');
            }else{
                //validasi sukses
                $this->_login();
            }
        }
        
        private function _login(){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $nama = $this->input->post('nama');
            
            $users = $this->db->get_where('users', ['email' => $email])->row_array();
        
            if($users){
                if(password_verify($password, $users['password'])){
                    $data = [
                        'id_user' => $users['id_user'],
                        'email' => $users['email'],
                        'nama' => $users['nama'],
                        'password' => $users['password']
                    ];
                    $this->session->set_userdata($data);
                    redirect('dashboard/belanja');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi salah!
                        <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button></div>');
                    redirect('member');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('member');
            }
        }
        
    public function register(){
            $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim',[
                'required' => 'Nama harus diisi!'
            ]);
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]',[
                'required' => 'Email harus diisi!',
                'valid_email' => 'Email tidak valid!',
                'is_unique' => 'Email ini sudah terdaftar!'
            ]);
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim',[
                'required' => 'Alamat harus diisi!'
            ]);
            $this->form_validation->set_rules('telepon', 'Telepon', 'required|trim',[
                'required' => 'Telepon harus diisi!'
            ]);
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]',[
                'min_length' => 'Password terlalu pendek!',
                'required' => 'Password harus diisi!',
                'matches' => 'The Password field does not match the Password field!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            
            if($this->form_validation->run() == FALSE){
            $data['title'] = 'Oktias Bakery & Cake : Registration';
            $this->load->view('templates/navbar', $data, FALSE);
            $this->load->view('register', $data, FALSE);
            $this->load->view('templates/footer');
            }else {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', TRUE)),
                    'email' => htmlspecialchars($this->input->post('email', TRUE)),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'alamat' => htmlspecialchars($this->input->post('alamat', TRUE)),
                    'telepon' => htmlspecialchars($this->input->post('telepon', TRUE)),
                    'tanggal_daftar' => time()
                ];
                $this->db->insert('users', $data);
              
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat. Anda berhasil melakukan registrasi. Silahkan login!
                    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button></div>');
                redirect('member');
            }
        }
        
        public function logout(){
            $this->session->unset_userdata('id_user');
            $this->session->unset_userdata('nama');
            $this->session->unset_userdata('email') ;
            $this->session->unset_userdata('password');
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar.
                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button></div>');
            redirect('member');
        }
}