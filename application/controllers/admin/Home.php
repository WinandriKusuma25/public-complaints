<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            is_logged_in();
        }
        
        public function index()
        {

           $data['title'] = 'Pengaduan Masyarakat | Home';
           $this->load->view('template/header',$data);
           $this->load->view('template/sidebar');
           $this->load->view('admin/home/index', $data);
           $this->load->view('template/footer');  
        }
     
    }
?>