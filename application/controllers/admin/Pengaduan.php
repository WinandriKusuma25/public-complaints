<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Pengaduan extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('Pengaduan_model');
            $this->load->model('Kategori_model');
            $this->load->model('User_model');
            $this->load->library('form_validation');
            is_logged_in();
         
        }
        
        public function index()
        {

           $data['title'] = 'Pengaduan Masyarakat | Daftar Pengaduan';
           $data['pengaduan'] = $this->Pengaduan_model->tampil();
           $data['kategori'] = $this->Kategori_model->tampil();
           $this->load->view('template/header',$data);
           $this->load->view('template/sidebar');
           $this->load->view('admin/pengaduan/index', $data);
           $this->load->view('template/footer', $data);  
        }

        public function edit()
        {      
            $id_pengaduan = $this->input->post('id_pengaduan');
            $status = $this->input->post('status');
            $tanggapan = $this->input->post('tanggapan');
            $this->db->set('tanggapan', $tanggapan);
            $this->db->set('status', $status);
            $this->db->where('id_pengaduan', $id_pengaduan);
            $this->db->update('pengaduan');
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data berhasil di edit ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('admin/pengaduan');
        }

        public function hapus($id_pengaduan)
        {
           
            $this->Pengaduan_model->hapus($id_pengaduan);
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil di hapus !
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                );
                redirect('admin/pengaduan');
        }
    }
?>