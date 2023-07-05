<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    //cek session yang aktif
    if (!$this->session->userdata('username')) {
      redirect('auth');
    }

    //load model siswa
    $this->load->model('Siswa_model', 'sm');
  }

  public function index()
  {
    $data['title'] = "Siswa Page";
    $data['user'] = $this->sm->getUser();
    $this->load->view('layout/header', $data);
    $this->load->view('siswa/index', $data);
    $this->load->view('layout/footer');
  }

  public function dataSiswa()
  {
    $data['title'] = 'Data Peserta Didik';
    $data['siswa'] = $this->sm->getSiswa();
    $this->load->view('layout/header', $data);
    $this->load->view('siswa/datasiswa', $data);
    $this->load->view('layout/footer');
  }

  public function insertSiswa()
  {
    $this->form_validation->set_rules('nisn', 'NISN', 'is_natural|min_length[10]|max_length[10]|is_unique[siswa_muda.nisn]');
    $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required|min_length[3]');
    $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');

    if ($this->form_validation->run() == false) {
      $data['title'] = 'Data Peserta Didik';
      $data['siswa'] = $this->sm->getSiswa();
      $this->load->view('siswa/datasiswa', $data);
    } else {
      $this->sm->insertSiswa();

      $this->session->set_flashdata('siswa_message', '<div class="alert alert-success" role="alert">
      Data berhasil disimpan!
      </div>');
      redirect('siswa/datasiswa');
    }
  }


}
