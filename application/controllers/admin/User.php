<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->isAuthenticated();

		$this->load->model(['UserModel']);
	}

	public function index()
	{
		$data = $this->setData(["page" => "user"]);
		$this->load->view('admin/users/index', $data);
	}

	public function create()
	{
		$data['page'] = 'Create';
		$this->load->view('admin/users/create', $data);
	}

	public function edit($id)
	{
		$data['page'] = 'Edit';
		$data['user'] = $this->UserModel->getById($id);

		$this->load->view('admin/users/edit', $data);
	}

	public function store()
	{
		$config = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required'
			),
			array(
				'field' => 'position',
				'label' => 'Position',
				'rules' => 'required'
			),
			array(
				'field' => 'phone',
				'label' => 'Phone',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			),
			array(
				'field' => 'username',
				'label' => 'Username',
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
			$this->create();
		} else {
			$this->db->trans_begin();
			try {
				$input = $this->input->post();
				$input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);
				$user_id = $this->UserModel->create($input);

				$this->session->set_flashdata('success', 'User has been created');
			} catch (Exception $e) {
				$this->db->trans_rollback();
				$this->session->set_flashdata('error', 'Opps.. Something went wrong');
			}

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$this->session->set_flashdata('error', 'Opps.. Something went wrong');
			} else {
				$this->db->trans_commit();
			}

			redirect(base_url() . 'admin/user');
		}
	}

	public function update($id)
	{
		$config = array(
			array(
				'field' => 'name',
				'label' => 'Name',
				'rules' => 'required'
			),
			array(
				'field' => 'position',
				'label' => 'Position',
				'rules' => 'required'
			),
			array(
				'field' => 'phone',
				'label' => 'Phone',
				'rules' => 'required'
			),
			array(
				'field' => 'email',
				'label' => 'Email',
				'rules' => 'required'
			),
			array(
				'field' => 'username',
				'label' => 'Username',
				'rules' => 'required'
			)
		);

		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$this->create();
		} else {
			$this->db->trans_begin();
			try {
				$input = $this->input->post();
				if (!empty($input['password'])) {
					$input['password'] = password_hash($input['password'], PASSWORD_BCRYPT);
				}
				$this->UserModel->update($id, $input);

				$this->session->set_flashdata('success', 'User has been updated');
			} catch (Exception $e) {
				$this->db->trans_rollback();
				$this->session->set_flashdata('error', 'Opps.. Something went wrong');
			}

			if ($this->db->trans_status() === FALSE) {
				$this->db->trans_rollback();
				$this->session->set_flashdata('error', 'Opps.. Something went wrong');
			} else {
				$this->db->trans_commit();
			}

			redirect(base_url() . 'admin/user/edit/' . $id);
		}
	}

	public function datatable()
	{
		$this->load->library('datatables');
		$this->datatables->select('id, name, position, email, username, status, created_at');
		$this->datatables->add_column('action', '<a href="user/edit/$1" class="btn btn-primary btn-xs" title="Edit">Edit</a>&nbsp;&nbsp;<a href="user/delete/$1" class="btn btn-danger btn-xs" title="Delete">Delete</a>', 'id');
		$this->datatables->from('user');
		echo $this->datatables->generate();
	}
}
