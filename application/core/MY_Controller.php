<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	protected $settings;
	protected $frontend = false;
	protected $data = [];

	public function __construct()
	{
		parent::__construct();
		$this->setNewsMenu();
	}

	public function setFrontend()
	{
		$this->frontend = true;
	}

	public function setNewsMenu()
	{
		if ($this->frontend) {
			$this->load->model(['NewsCategoryModel']);
			$categories = $this->NewsCategoryModel->getAll();

			$this->pushData(["news_categories" => $categories]);
		}
	}

	public function isAuthenticated()
	{
		if ($this->session->userdata('name') == '') {
			redirect(base_url() . 'admin/login');
		}
	}

	public function pushData($params)
	{
		if (sizeof($params) > 0) {
			$this->data = array_merge($this->data, $params);
		}
	}

	public function setData($params)
	{
		if (sizeof($params) > 0) {
			$this->data = array_merge($this->data, $params);
		}

		return $this->data;
	}

	public function security_filtering($array_input, $except = array(), $date = array())
	{
		foreach ($array_input as $k => $v) {
			if (!in_array($k, $except) && $k != 'image_1' && $k != 'image_2') {
				$array_input[$k] = $this->security->xss_clean($v);
			} else if ($k == 'image_1' || $k == 'image_2') {
				$array_input[$k] = $array_input['old_' . $k];
				unset($array_input['old_' . $k]);
			}
		}
		return $array_input;
	}

	public function process_upload($array_input, $fields = ["image_1", "image_2"], $path = 'uploads')
	{
		$config['upload_path'] = './' . $path . '/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 500;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		foreach ($_FILES as $k => $v) {
			if ($_FILES[$k]['error'] !== UPLOAD_ERR_NO_FILE) {
				if (in_array($k, $fields)) {
					if (!$this->upload->do_upload($k)) {
						throw new Exception($this->upload->display_errors());
					} else {
						$data = $this->upload->data('file_name');
					}
					$array_input[$k] = $data;
				}
			}
		}

		return $array_input;
	}

	public function upload_ckeditor($path = 'uploads')
	{
		$config['upload_path'] = './' . $path . '/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size'] = 500;
		$config['encrypt_name'] = TRUE;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		foreach ($_FILES as $k => $v) {
			if ($_FILES[$k]['error'] !== UPLOAD_ERR_NO_FILE) {
				if (!$this->upload->do_upload($k)) {
					echo "error";
					throw new Exception($this->upload->display_errors());
				} else {
					$data = $this->upload->data('file_name');

					$funcNum = $_GET['CKEditorFuncNum'];
					$url = base_url() . 'uploads/' . $data;
					echo '<script>window.parent.CKEDITOR.tools.callFunction(' . $funcNum . ', "' . $url . '", "' . $message . '")</script>';
				}
			} else {
				echo 'error';
			}
		}
	}
}
