<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    //
    $this->defaultPage();

    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('auth/index');
    } else {
      // validasi loginnya
      $this->_login();
    }
  }

  private function _login()
  {
    $username = $this->input->post('username', true);
    $password = $this->input->post('password', true);
    //cek username pada table user_muda
    $ceklogin = $this->db->get_where('user_muda', ['username' => $username])->row_array();

    if ($ceklogin) {
      //cek apakah user ada, jika ada maka..
      if ($ceklogin['aktif'] == 1) {
        //jika akun aktif maka cocokan password
        if (password_verify($password, $ceklogin['password'])) {

          $data = [
            'username' => $ceklogin['username'],
            'nama_user' => $ceklogin['nama_user'],
            'email' => $ceklogin['email']
          ];
          $this->session->set_userdata($data);
          redirect('siswa');
        } else {
          $this->session->set_flashdata('auth_message', '<div class="alert alert-danger" role="alert">
              Password Anda salah!</div>');
          redirect('auth');
        }
      } else {
        //jika akun tidak aktif
        $this->session->set_flashdata('auth_message', '<div class="alert alert-danger" role="alert">
              Akun Anda di Suspend!</div>');
        redirect('auth');
      }
    } else {
      //jika username tidak ada
      $this->session->set_flashdata('auth_message', '<div class="alert alert-danger" role="alert">
              Username tidak terdaftar!</div>');
      redirect('auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('nama_user');
    $this->session->unset_userdata('email');

    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
      Kamu telah logout!</div>');
    redirect('auth');
  }

  public function defaultPage()
  {
    //bila user telah login arahkan controller Siswa
    if ($this->session->userdata('username')) {
      redirect('siswa');
    }
  }
}
