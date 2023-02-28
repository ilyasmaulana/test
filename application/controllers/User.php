<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		//cek session yang aktif
		if (!$this->session->userdata('username')) {
			redirect('auth');
		}

		//load model user
		$this->load->model('User_model', 'um');
	}

	public function index()
	{
		$data['title'] = "User Page";
		$data['user'] = $this->um->getUser();
		$this->load->view('layout/header', $data);
		$this->load->view('user/index', $data);
		$this->load->view('layout/footer');
	}

	public function insertUser()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[user_muda.username]');
		$this->form_validation->set_rules('nama_user', 'Nama User', 'required|min_length[3]');
		$this->form_validation->set_rules('email', 'Email', 'required|min_length[3]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[3]');

		if ($this->form_validation->run() == false) {
			$this->index();
		} else {
			$this->um->insertUser();

			$this->session->set_flashdata('siswa_message', '<div class="alert alert-success" role="alert">
      Data berhasil disimpan!
      </div>');
			redirect('user');
		}
	}
}
