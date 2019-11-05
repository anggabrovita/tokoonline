<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function index()
	{
            if ($this->session->userdata('email')){
                redirect('admin/dashboard');
            }
        
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email',[
                'required' => 'Email harus diisi!',
                'valid_email' => 'Email tidak valid!'
            ]);
            $this->form_validation->set_rules('password', 'Password', 'required|trim', [
                'required' => 'Password harus diisi!',
            ]);
            
            if($this->form_validation->run() == FALSE){
            $data['title'] = 'Oktias Bakery & Cake : Admin Login';
            $this->load->view('admin/nav_admin', $data, FALSE);
            $this->load->view('admin/login', $data, FALSE);
            $this->load->view('admin/foot_admin', $data, FALSE);
            }else{
                //validasi sukses
                $this->_login();
            }
        }
        
        private function _login(){
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            
            $admin = $this->db->get_where('admin', ['email' => $email])->row_array();
        
            if($admin){
                if(password_verify($password, $admin['password'])){
                    $data = [
                        'email' => $admin['email'],
                        'password' => $admin['password']
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin/dashboard');
                }else{
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Kata sandi salah!</div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
                redirect('auth');
            }
        }
       

        public function register()
	{
            if ($this->session->userdata('email')){
            redirect('admin/dashboard');
        }

            $this->form_validation->set_rules('nama', 'Nama', 'required|trim',[
                'required' => 'Nama harus diisi!'
            ]);
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[admin.email]',[
                'required' => 'Email harus diisi!',
                'valid_email' => 'Email tidak valid!',
                'is_unique' => 'Email ini sudah terdaftar!'
            ]);
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]',[
                'min_length' => 'Password terlalu pendek!',
                'matches' => 'Password tidak sama!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
            
            if($this->form_validation->run() == FALSE){
            $data['title'] = 'Oktias Bakery & Cake : Admin Register';
            $this->load->view('admin/nav_admin', $data, FALSE);
            $this->load->view('admin/register', $data, FALSE);
            $this->load->view('admin/foot_admin', $data, FALSE);
            }else {
                $data = [
                    'nama' => htmlspecialchars($this->input->post('nama', TRUE)),
                    'email' => htmlspecialchars($this->input->post('email', TRUE)),
                    'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                    'tanggal_daftar' => time()
                ];
                $this->db->insert('admin', $data);
                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat! Anda berhasil daftar. Silahkan Login!</div>');
                redirect('auth');
            }
        }
	
        public function logout(){
            $this->session->unset_userdata('email');
            $this->session->unset_userdata('password');
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda berhasil keluar!</div>');
            redirect('auth');
        }
}
