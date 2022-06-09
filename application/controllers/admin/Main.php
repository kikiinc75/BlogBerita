<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('UserModel');
	}

	public function login()
	{
		$this->load->view('admin/Login');
	}

	public function do_login()
	{
		$this->load->library('form_validation');

		$config = array(
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			),
			array(
				'field' => 'password',
				'label' => 'Password',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$this->login();
		} else {
			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$cek = $this->UserModel->cekLogin($email, $password);

			if ($cek->num_rows() > 0) {

				// Validate password
				$data_user = $cek->row();
				if (password_verify($password, $data_user->password)) {
					$data_session = array(
						'name' => $email,
						'user_id' => $data_user->id,
						'status' => "Login"
					);

					$this->session->set_userdata($data_session);

					redirect(base_url('admin/dashboard'));
				}
			}

			$this->session->set_flashdata('error', 'Invalid email or password !');
			redirect(base_url('admin/login'));
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('name');
		redirect(base_url() . 'admin/login');
	}
}
