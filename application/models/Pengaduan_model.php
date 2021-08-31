<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengaduan_model extends CI_Model
{
    
    public function tampiluser($nik)
    {
        $this->db->select('pengaduan.*, user.nama, user.nik, kategori.nama_kategori');
        $this->db->join('user', 'pengaduan.id_user = user.id_user');
        $this->db->join('kategori', 'pengaduan.id_kategori = kategori.id_kategori');
        return $this->db->get_where('pengaduan', ['nik' => $nik])->result();
    }

    public function tampil()
    {
        $this->db->select('pengaduan.*, user.nama,  user.nik,  kategori.nama_kategori');
        $this->db->join('user', 'pengaduan.id_user = user.id_user');
        $this->db->join('kategori', 'pengaduan.id_kategori = kategori.id_kategori');
        return $this->db->get('pengaduan')->result();
    }

     public function tambah($upload)
    {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'id_kategori' => $this->input->post('id_kategori', true),
            'judul' => $this->input->post('judul', true),
            'keterangan' => $this->input->post('keterangan', true),
            'status' => 'diajukan',
            'bukti' => $upload['file']['file_name'],
        ];
        $this->db->insert('pengaduan', $data);
    }

    public function upload()
    {
        $config['upload_path'] = './assets/bukti';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('bukti')) {
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function hapus($id_pengaduan)
    {
        $this->db->where('id_pengaduan', $id_pengaduan);
        if (
            $this->db->delete('pengaduan')
        ) {
            return true;
        } else {
            return false;
        }
    }
    
}