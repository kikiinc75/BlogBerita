<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	function __construct()
	{
		$this->setFrontend();
		parent::__construct();
		$this->load->model(['NewsModel']);
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$featured_news = $this->NewsModel->getFeatured(5);
		$news = $this->NewsModel->getNonFeatured(5);

		$this->pushData([
			'featured_news' => $featured_news,
			'news' => $news
		]);

		$this->load->view('home', $this->data);
	}

	public function newsCategory($category)
	{
		$config = [
			'base_url' => base_url() . 'article/' . $category,
			'page_query_string' => true,
			'per_page' => 10,
			'total_rows' => $this->NewsModel->getPublishedByCategoryCount($category),
		];
		$data = $this->NewsModel->getByPagination($config, $category);

		$this->pushData([
			'datas' => $data
		]);

		$this->load->view('news', $this->data);
	}

	public function newsDetail($category, $slug)
	{
		$this->pushData([
			'data' => $this->NewsModel->getBySlug($slug)
		]);
		$this->load->view('news-detail', $this->data);
	}
}
