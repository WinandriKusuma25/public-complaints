<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller {
    
        
        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('User_model');
            $this->load->library('form_validation');
            is_logged_in();
         
        }
        
        public function index()
        {

           $data['title'] = 'Pengaduan Masyarakat | Pengguna';
           $data['user'] = $this->User_model->tampil();
           $this->load->view('template/header',$data);
           $this->load->view('template/sidebar');
           $this->load->view('admin/user/index', $data);
           $this->load->view('template/footer', $data);  
        }

        public function tambah()
        {
    
            $this->form_validation->set_rules('nama', 'nama', 'required|trim', [
                'required' => 'Nama tidak boleh kosong !',
            ]);
            $this->form_validation->set_rules('nik', 'nik', 'required|trim', [
                'required' => 'NIK tidak boleh kosong !',
            ]);
            $this->form_validation->set_rules('no_telp', 'no_telp', 'required|trim', [
                'required' => 'No.Telp tidak boleh kosong !',
            ]);
            $this->form_validation->set_rules('alamat', 'alamat', 'required|trim', [
                'required' => 'Alamat tidak boleh kosong !',
            ]);
            $this->form_validation->set_rules('status', 'status', 'required|trim', [
                'required' => 'Status tidak boleh kosong !',
            ]);
            $this->form_validation->set_rules('level', 'level', 'required|trim', [
                'required' => 'Level tidak boleh kosong !',
            ]);
            $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
                'matches' => 'Konfirmasi Password tidak sama !',
                'required' => 'Password tidak boleh kosong !',
                'min_length' => 'Password terlalu pendek!'
            ]);
            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]', [
                'matches' => 'Konfirmasi Password tidak sama !',
                'required' => 'Password tidak boleh kosong !',
                'min_length' => 'Password terlalu pendek!'
            ]);
         
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Pengaduan Masyarakat | Pengguna';
                $this->load->view('template/header',$data);
                $this->load->view('template/sidebar');
                $this->load->view('admin/user/tambah', $data);
                $this->load->view('template/footer');
                  
            } else {
                $this->load->model('User_model');
                $this->User_model->tambah();
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Data berhasil di tambahkan ! 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
                );
                redirect('admin/user', 'refresh');
            }
        }

        public function hapus($id_user)
     {
        if ($this->User_model->hapus($id_user) == false) {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                 Data tidak dapat dihapus, karena data digunakan !
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                </button>
                </div>'
            );
            redirect('admin/user');
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
            redirect('admin/user', 'refresh');
        }
    }

    public function toggle($getId)
    {
        $id = encode_php_tags($getId);
        $status = $this->User_model->get('user', ['id_user' => $id])['status'];
        $toggle = $status ? 0 : 1; //Jika user aktif maka nonaktifkan, begitu pula sebaliknya
        $pesan = $toggle ? 'diaktifkan.' : 'dinonaktifkan.';

        if ($this->User_model->update('user', 'id_user', $id, ['status' => $toggle])) {
            set_pesan($pesan);
        }
        redirect('admin/user');
    }

    public function edit()
    {       
            $this->User_model->ubah();
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
            redirect('admin/user', 'refresh');
    }  
    }
?>