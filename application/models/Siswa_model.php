<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa_model extends CI_Model
{
  public function getSiswa()
  {
    return $this->db->get('siswa_muda')->result_array();
  }

  public function getUser()
  {
    //ambil data berdasarkan sesion user
    return $this->db->get_where('user_muda', ['username' => $this->session->userdata('username')])->row_array();
  }

  public function insertSiswa()
  {
    $data = [
      'nisn' => $this->input->post('nisn'),
      'nama_siswa' => $this->input->post('nama_siswa', true),
      'jurusan' => $this->input->post('jurusan', true)
    ];
    $this->db->insert('siswa_muda', $data);
  }
}
