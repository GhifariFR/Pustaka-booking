<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autentifikasi extends CI_Controller {

	public function index()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', ['required' => 'Email Harus diisi!!', 'valid_email' => 'Email Tidak Benar!!']);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password Harus diisi!!']);

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('auth/header');
			$this->load->view('auth/login');
			$this->load->view('auth/footer');
		} else {
			$this->load->model('Model_User');
			$this->load->model('Model_Buku');

			$this->load->view('admin/header');
			// $this->load->view('admin/topbar');
			$this->load->view('admin/sidebar');
			$this->load->view('admin/index');
			$this->load->view('admin/footer');

			// masalah masih ada di topbar dan index
			// masalah yg di index = variabel $anggota & $buku
		}
	}

	public function login()
	{
		$this->load->view('auth/header');
		$this->load->view('auth/login');
		$this->load->view('auth/footer');
	}
}
