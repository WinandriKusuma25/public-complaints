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
           $data['pengaduan'] = $this->Pengaduan_model->tampiluser($this->session->userdata('nik'));
           $data['kategori'] = $this->Kategori_model->tampil();
           $this->load->view('template/header',$data);
           $this->load->view('template/user/sidebar');
           $this->load->view('user/pengaduan/index', $data);
           $this->load->view('template/footer', $data);  
        }

        public function tambah()
        {
    
            $this->form_validation->set_rules('judul', 'judul', 'required|trim');
            $this->form_validation->set_rules('id_kategori', 'kategori ', 'required|trim');
     
            $data['kategori'] = $this->Kategori_model->tampil();
            $data['user'] = $this->User_model->getUser($this->session->userdata('nik'));
    
            if ($this->form_validation->run() == false) {
                $data['title'] = 'Pengaduan Masyarakat | Tambah ';
                $this->load->view('template/header',$data);
                $this->load->view('template/user/sidebar');
                $this->load->view('user/pengaduan/tambah', $data);
                $this->load->view('template/footer', $data); 
            } else {
                $upload = $this->Pengaduan_model->upload();
                if ($upload['result'] == 'success') {
                    $this->Pengaduan_model->tambah($upload);
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data berhasil di tambahkan, Mohon tunggu validasi dan tanggapan dari Admin ! 
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                    );
                    redirect('user/pengaduan');
                } else {
                    echo $this->upload->display_errors();
                }
            }
        }

        public function edit()
        {      
            //check jika ada gambar yang akan di upload
            $upload_image = $_FILES['bukti']['name'];
            if ($upload_image) {
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048; //2mb
                $config['upload_path']          = './assets/bukti';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('bukti')) {
                    $old_image = $data['pengaduan']['bukti'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/bukti/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('bukti', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $id_pengaduan = $this->input->post('id_pengaduan');
            $id_kategori = $this->input->post('id_kategori');
            $judul = $this->input->post('judul');
            $keterangan = $this->input->post('keterangan');
            // $ketersedian = $this->input->post('ketersedian');


            $this->db->set('judul', $judul);
            $this->db->set('id_kategori', $id_kategori);
            $this->db->set('keterangan', $keterangan);
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
            redirect('user/pengaduan');
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
            redirect('user/pengaduan');
    }
    }
?>