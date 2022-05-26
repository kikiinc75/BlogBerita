<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->isAuthenticated();
	}

	public function index()
	{
		$data = $this->setData(["page" => "Dashboard"]);
		$this->load->view('admin/dashboard', $data);
	}
}
