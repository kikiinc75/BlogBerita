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
	}

	public function setFrontend()
	{
		$this->frontend = true;
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

	public function generate_datatable($conditions = [], $actions = [], $model)
	{
		$this->load->library('datatables');

		if ($model->translate) {
			$this->datatables->select(implode(",", array_merge(["{$model->table}.*", "{$model->table}.id as data_id"], $model->translateable)), FALSE);
			$this->datatables->join("{$model->table}_translate", "{$model->table}.id = {$model->table}_translate.{$model->table}_id", 'left');
		} else {
			$this->datatables->select("*");
		}

		if (!empty($conditions)) {
			foreach ($conditions as $key => $value) {
				$this->datatables->where("{$key} = ", $value);
			}
		}

		$action_str = '';
		if (!empty($actions)) {
			foreach ($actions as $key => $value) {
				if ($key == 'delete') {
					$action_str .= "<a href='{$value}' class='btn btn-danger btn-xs delete-button' title='{$key}'>{$key}</a>&nbsp;&nbsp;&nbsp;";
				} else {
					$action_str .= "<a href='{$value}' class='btn btn-primary btn-xs' title='{$key}'>{$key}</a>&nbsp;&nbsp;&nbsp;";
				}
			}
		}

		$this->datatables->add_column('action', $action_str, "data_id");
		$this->datatables->from($model->table);
		echo $this->datatables->generate();
	}
}
