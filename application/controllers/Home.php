<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
   public function __construct() {
        parent::__construct();
        
        $this->load->model('app');
    }
     public function index(){
            $data['data'] = $this->app->get_all('produk');
            $data['title'] = 'Oktias Bakery & Cake : Home';
            
            $this->load->view('templates/navbar', $data, FALSE);
            $this->load->view('templates/slide', $data, FALSE);
            $this->load->view('index', $data, FALSE);
            $this->load->view('templates/footer');        
        }
        
        public function profile() {
            
            $data['title'] = 'Oktias Bakery & Cake : Detail';
            $this->load->view('templates/head', $data);
            $this->load->view('member/profile', $data);
            $this->load->view('templates/foot');
        }   
}
