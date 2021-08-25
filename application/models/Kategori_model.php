<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_model extends CI_Model
{

    public function tampil()
    {
        return $this->db->get('kategori')->result();
    }


    public function tambah()
    {
        $data = [
            'id_kategori' => $this->input->post('id_kategori', true),
            'nama_kategori' => $this->input->post('nama_kategori', true),
        ];
        $this->db->insert('kategori', $data);
    }

    public function ubah()
    {
        $data = [
            'id_kategori' => $this->input->post('id_kategori', true),
            'nama_kategori' => $this->input->post('nama_kategori', true),
        ];
        $this->db->where('id_kategori', $this->input->post('id_kategori'));
        $this->db->update('kategori', $data);
    }

    public function hapus($id_kategori)
    {
        $this->db->where('id_kategori', $id_kategori);
        if (
            $this->db->delete('kategori')
        ) {
            return true;
        } else {
            return false;
        }
    }
    
}