<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Kategori extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('Kategori_model');
            $this->load->library('form_validation');
            is_logged_in();
         
        }
        
        public function index()
        {

           $data['title'] = 'Pengaduan Masyarakat | Kategori';
           $data['kategori'] = $this->Kategori_model->tampil();
           $this->load->view('template/header',$data);
           $this->load->view('template/sidebar');
           $this->load->view('admin/kategori/index', $data);
           $this->load->view('template/footer', $data);  
        }

        public function tambah()
        {
    
            $this->form_validation->set_rules('nama_kategori', 'nama_kategori', 'required|trim', [
                'required' => 'Nama Kategori tidak boleh kosong !',
            ]);
        
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Pengaduan Masyarakat | Kategori';
                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('admin/kategori/tambah', $data);
                $this->load->view('template/footer');
                  
            } else {
                $this->load->model('Kategori_model');
                $this->Kategori_model->tambah();
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil di tambahkan ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                );
                redirect('admin/kategori', 'refresh');
            }
        }

        public function edit()
        {       
            $this->Kategori_model->ubah();
            $this->load->library('session');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Data berhasil diedit ! 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/kategori', 'refresh');
         }

        public function hapus($id_kategori)
        {
        if ($this->Kategori_model->hapus($id_kategori) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Data tidak dapat dihapus, karena data digunakan !
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/kategori');
        } else {
            $this->load->library('session');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data berhasil di hapus !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/kategori', 'refresh');
        }
    }
        
    
    }
?>