<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NewsCategory extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->isAuthenticated();
		$this->load->model(['NewsCategoryModel']);
		$this->load->library('slug');
	}

	public function index()
	{
		$categories = $this->NewsCategoryModel->getAll();
		$data = $this->setData(["page" => "News Category", 'categories' => $categories]);
		$this->load->view('admin/news/category/index', $data);
	}

	public function create()
	{
		$data = $this->setData(["page" => 'Create New News Category']);
		$this->load->view('admin/news/category/create', $data);
	}

	public function store()
	{
		$valid = $this->_validate();

		if ($valid == false) {
			$this->create();
		} else {
			$input = $this->input->post();

			$input = array_merge($input, [
				'slug' => $this->slug->create($this->input->post('name'), true, 'news_category', 'slug'),
			]);

			// Proses Store Data
			$this->db->trans_start();
			$this->NewsCategoryModel->create($input);
			$this->db->trans_complete();

			$this->session->set_flashdata('success', 'Content has been created');
			redirect(base_url() . 'admin/news/category');
		}
	}

	public function edit($id)
	{
		$category = $this->NewsCategoryModel->getById($id);
		$data = $this->setData(["page" => 'Edit Category', 'category' => $category]);
		$this->load->view('admin/news/category/edit', $data);
	}

	public function update($id)
	{
		$category = $this->NewsCategoryModel->getById($id);
		$valid = $this->_validate($category);

		if ($valid == false) {
			$this->edit($id);
		} else {
			$input = $this->input->post();
			$input = array_merge($input, [
				'slug' => $this->slug->create($this->input->post('name'), true, 'news_category', 'slug', $id),
			]);

			// Proses Update Data
			$this->db->trans_start();
			$this->NewsCategoryModel->update($id, $input);
			$this->db->trans_complete();

			$this->session->set_flashdata('success', 'Content has been updated');
			redirect(base_url() . 'admin/news/category/edit/' . $id);
		}
	}

	public function delete($id)
	{
		// Proses Delete Data
		$this->db->trans_start();
		$this->NewsCategoryModel->delete($id);
		$this->db->trans_complete();

		$this->session->set_flashdata('success', 'Content has been deleted');
		redirect(base_url() . 'admin/news/category/');
	}

	public function _validate()
	{
		$config = array(
			[
				"field" => 'name',
				"label" => 'name',
				"rules" => "required"
			]
		);

		$this->form_validation->set_rules($config);
		return $this->form_validation->run();
	}
}
