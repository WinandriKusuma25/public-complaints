<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Home extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('Pengaduan_model');
            $this->load->model('Kategori_model');
            $this->load->model('User_model');
        }
        
        public function index()
        {

           $data['title'] = 'Pengaduan Masyarakat | Home';
        //    $this->load->view('template/header',$data);
        $data['pengaduan'] = $this->Pengaduan_model->tampil();
        //    $this->load->view('template/sidebar');
           $this->load->view('index', $data);
        //    $this->load->view('template/footer');  
        }
     
    }
?>