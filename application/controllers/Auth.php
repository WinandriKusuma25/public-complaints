<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        //memanggil method kosntrukter di CI Controller
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->model('User_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
    

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim', [
            'required' => 'NIK tidak boleh kosong !',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password tidak boleh kosong !',
        ]);


        if ($this->form_validation->run() == false) {
            $data['title'] = 'Pengaduan Masyarakat | Login';

            $this->load->view('auth/login');

        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nik' => $nik])->row_array();

        //jika user nya ada
        if ($user) {
            //jika user nya atif
            if ($user['status'] == 1) {
                //cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                        'nik' => $user['nik'],
                        'level' => $user['level'],
                    ];
                    $this->session->set_userdata($data);
                    if ($user['level'] == 'admin') {
                        // helper_log("login", "telah melakukan login");
                        redirect('admin/home');
                    }else if ($user['level'] == 'pengunjung') {
                        // helper_log("login", "telah melakukan login");
                        redirect('superadmin/home');
                    }else{
                        redirect('member/home');
                    }
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                           Password Salah !
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'message',
                    '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                     Akun belum di validasi Admin !
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                   NIK Belum Registrasi!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );
            redirect('auth');
        }
    }

    public function registrasi()
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
            $data['title'] = 'Pengaduan Masyarakat | Registrasi';
            $this->load->view('auth/registrasi');

        } else {
            $this->load->model('User_model');
            $this->User_model->registrasi();
            $this->session->set_flashdata(
            'message',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Selamat Anda Berhasil Registrasi, Mohon Menunggu Validasi Admin. 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>'
            );
            redirect('auth', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('level');
        // $this->session->sess_destroy();

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
               Anda telah Keluar !
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'
        );
        redirect('auth');
    }
}