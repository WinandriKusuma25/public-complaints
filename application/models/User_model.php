<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function tampil()
    {
        return $this->db->get('user')->result();
    }
    
    public function tambah()
    {
        $data = [
            'id_user' => $this->input->post('id_user', true),
            'nama' => $this->input->post('nama', true),
            'nik' => $this->input->post('nik', true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'no_telp' => $this->input->post('no_telp', true),
            'alamat' => $this->input->post('alamat', true),
            'status' => $this->input->post('status', true),
            'level' => $this->input->post('level', true),
        ];
        $this->db->insert('user', $data);
    }

    public function registrasi()
    {
        $data = [
            'id_user' => $this->input->post('id_user', true),
            'nama' => $this->input->post('nama', true),
            'nik' => $this->input->post('nik', true),
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'no_telp' => $this->input->post('no_telp', true),
            'alamat' => $this->input->post('alamat', true),
            'status' => 0,
            'level' => 'pengunjung',    
        ];
        $this->db->insert('user', $data);
    }

    public function hapus($id_user)
    {
        $this->db->where('id_user', $id_user);
        if (
            $this->db->delete('user')
        ) {
            return true;
        } else {
            return false;
        }
    }

    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }
    
    public function ubah()
    {
        $data = [
            'id_user' => $this->input->post('id_user', true),
            'nama' => $this->input->post('nama', true),
            'nik' => $this->input->post('nik', true),
            'no_telp' => $this->input->post('no_telp', true),
            'alamat' => $this->input->post('alamat', true),
            'level' => $this->input->post('level', true),
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

}