<?php
defined('BASEPATH') or exit('No direct script access allowed');

class News extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->isAuthenticated();
		$this->load->model(['NewsCategoryModel', 'NewsModel']);
	}

	public function index()
	{
		$data = $this->setData(["page" => 'News List']);

		$this->load->view('admin/news/index', $data);
	}

	public function create()
	{
		$categories = $this->NewsCategoryModel->getAll();
		$data = $this->setData(["page" => 'Create New News', "categories" => $categories]);
		$this->load->view('admin/news/create', $data);
	}

	public function store()
	{
		$valid = $this->_validate();

		if ($valid == false) {
			$this->create();
		} else {
			$input = $this->security_filtering($this->input->post(), ["description"]);
			$input = $this->process_upload($input, ["image_1", "image_2"]);
			// Proses Update Data
			$this->db->trans_start();
			$this->NewsModel->create($input);
			$this->db->trans_complete();

			$this->session->set_flashdata('success', 'Content has been created');
			redirect(base_url() . 'admin/news/');
		}
	}

	public function edit($id)
	{
		$news = $this->NewsModel->getById($id);
		$categories = $this->NewsCategoryModel->getAll();
		$data = $this->setData(["page" => 'Edit Category', 'categories' => $categories, 'news' => $news]);
		$this->load->view('admin/news/edit', $data);
	}

	public function update($id)
	{
		$news = $this->NewsModel->getById($id);
		$valid = $this->_validate();

		if ($valid == false) {
			$this->edit($id);
		} else {
			$input = $this->security_filtering($this->input->post(), ["description"]);
			$input = $this->process_upload($input, ["image_1", "image_2"]);
			// Proses Update Data
			$this->db->trans_start();
			$this->NewsModel->update($id, $input);
			$this->db->trans_complete();

			$this->session->set_flashdata('success', 'Content has been updated');
			redirect(base_url() . 'admin/news/edit/' . $id);
		}
	}

	public function delete($id)
	{
		// Proses Delete Data
		$this->db->trans_start();
		$this->NewsModel->delete($id);
		$this->db->trans_complete();

		$this->session->set_flashdata('success', 'Content has been deleted');
		redirect(base_url() . 'admin/news/');
	}

	public function _validate()
	{
		$config = array(
			[
				"field" => 'title',
				"label" => 'title',
				"rules" => "required"
			],
			[
				"field" => 'title',
				"label" => 'title',
				"rules" => "required"
			],
			[
				"field" => 'category_id',
				"label" => 'category',
				"rules" => "required"
			],
			[
				"field" => 'status',
				"label" => 'status',
				"rules" => "required"
			],
			[
				"field" => 'subtitle',
				"label" => 'subtitle',
				"rules" => "required"
			],
			[
				"field" => 'excerpt',
				"label" => 'excerpt',
				"rules" => "required"
			],
			[
				"field" => 'description',
				"label" => 'description',
				"rules" => "required"
			],
		);
		// array([
		// 	"field" => 'image_1',
		// 	"label" => 'image_1',
		// 	"rules" => "callback_validate_image[image_1]"
		// ], [
		// 	"field" => 'image_2',
		// 	"label" => 'image_2',
		// 	"rules" => "callback_validate_image[image_2]"
		// ]);

		$this->form_validation->set_rules($config);
		return $this->form_validation->run();
	}

	public function datatable()
	{
		$this->load->library('datatables');
		$this->datatables->select('id, title,status, created_at,updated_at');
		$this->datatables->add_column('action', "<a href='/admin/news/edit/$1' class='btn btn-primary btn-xs' title='Edit'>Edit</a>&nbsp;&nbsp;&nbsp;<a href='/admin/news/delete/$1' class='btn btn-danger btn-xs delete-button' title='Delete'>Delete</a>&nbsp;&nbsp;&nbsp;", 'id');
		$this->datatables->from('news');
		echo $this->datatables->generate();
	}
}
