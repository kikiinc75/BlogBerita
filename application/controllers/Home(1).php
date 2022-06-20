<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller
{

	function __construct()
	{
		$this->setFrontend();
		parent::__construct();
		// $this->load->model(['cms_page/Section_model', 'cms_content/Dynamic_content_model', 'cms_news/News_model', 'cms_slider/Slider_item_model', 'cms_newsletter/Newsletter_model']);
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
		$this->load->view('home', $this->data);
	}

	public function newsCategory()
	{
		$this->load->view('news', $this->data);
	}

	public function newsDetail()
	{
		$this->load->view('news-detail', $this->data);
	}
}
