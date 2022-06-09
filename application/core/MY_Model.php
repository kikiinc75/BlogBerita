<?php

class MY_Model extends CI_Model
{

	protected $table;
	protected $fillable = ['*'];

	public function __construct()
	{
		$this->load->database();
	}

	/**
	 * Fungsi untuk get All data
	 *
	 * @return array
	 */
	public function getAll($select = "*")
	{
		if (is_array($select))
			$select = implode(",", $select);
		else
			$select = "*";

		$this->db->select($select);

		return $this->db->get($this->table)->result();
	}

	/**
	 * Fungsi untuk get All data
	 *
	 * @return array
	 */
	public function getAllFromView($lang = 'id')
	{
		$this->db->where('language', $lang);
		return $this->db->get($this->table)->result();
	}

	public function getCount()
	{
		return $this->db->count_all($this->table);
	}

	/**
	 * Fungsi ini untuk validasi login administrator
	 *
	 * @param Array|String|Null $primary_keys
	 * @return Object
	 */
	public function getById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
		return $query->row();
	}

	/**
	 * Fungsi ini untuk validasi login administrator
	 *
	 * @param Array|String|Null $primary_keys
	 * @return Object
	 */
	public function getByColumn($column, $value)
	{
		$this->db->select('*');
		$this->db->where($column, $value);
		$query = $this->db->get($this->table);
		return $query->result();
	}

	/**
	 * Fungsi ini untuk validasi login administrator
	 *
	 * @param Array|String|Null $primary_keys
	 * @return Object
	 */
	public function set($key, $value)
	{
		if (in_array($key, $this->updateable)) {
			$this->db->where('name', $key);
			return $this->db->update($this->table, array('value' => $value));
		}
	}

	/**
	 * Fungsi ini untuk validasi login administrator
	 *
	 * @param Array|String|Null $primary_keys
	 * @return Object
	 */
	public function create($params)
	{
		// Filter parameter berdasarkan fillable variable

		if ($this->fillable[0] != '*') {
			$filtered_params = $this->_doFilterParams($params);
		} else {
			$filtered_params = $params;
		}

		if ($this->table != 'newsletter')
			$filtered_params['author_id'] = $this->session->userdata('user_id');

		if (strpos($this->table, 'translate') === false) {
			$filtered_params['created_at'] = date('Y-m-d H:i:s');
			$filtered_params['updated_at'] = date('Y-m-d H:i:s');
		}

		// Filter parameter berdasarkan fillable variable
		if ($this->table == 'product_group' && (!isset($params['order']) || empty($params['order']))) {
			$order = $this->getLastOrder()->order ? $this->getLastOrder()->order : 0;
			$filtered_params['order'] = $order + 1;
		}

		$this->db->insert($this->table, $filtered_params);
		return $this->db->insert_id();
	}

	/**
	 * Fungsi ini untuk validasi login administrator
	 *
	 * @param Array|String|Null $primary_keys
	 * @return Object
	 */
	public function create_batch($params)
	{
		// Filter parameter berdasarkan fillable variable
		if ($this->fillable[0] != '*') {
			$filtered_params = $this->_doFilterParams($params);
		} else {
			$filtered_params = $params;
		}

		return $this->db->insert_batch($this->table, $filtered_params);
	}

	public function _doFilterParams($params)
	{
		if ($this->fillable[0] === "*") {
			return $params;
		} else {
			$filtered_params = array();
			foreach ($params as $key => $value) {
				if (in_array($key, $this->fillable)) {
					$filtered_params[$key] = $value;
				}
			}

			return $filtered_params;
		}
	}

	public function update($key, $params)
	{
		$filtered_params = $this->_doFilterParams($params);

		if (!empty($filtered_params)) {
			if (strpos($this->table, 'translateable') === false) {
				$filtered_params['updated_at'] = date('Y-m-d H:i:s');
			}

			$this->db->set($filtered_params);
			$this->db->where($this->primary_key, $key);
			return $this->db->update($this->table);
		} else {
			return true;
		}
	}

	public function delete($key)
	{
		$this->db->where($this->primary_key, $key);
		$this->db->delete($this->table);
	}

	public function delete_batch($condition)
	{
		return $this->db->delete($this->table, $condition);
	}

	public function getLastOrder($filter_by = Null, $filter = Null)
	{
		if (!is_null($filter_by) && !is_null($filter)) {
			$this->db->where($filter_by . ' =', $filter);
		}

		$this->db->order_by('order', 'desc');
		return $this->db->get($this->table)->row();
	}

	public function sort($desired_order, $current_order, $filter_by = '', $filter = '')
	{
		// Cek pindahnya ke atas atau bawah
		$move = $desired_order > $current_order ? 'down' : 'up';

		// Set order item yang akan dipindahkan ke 0
		if ($filter_by != '' && $filter != '')
			$this->db->where($filter_by, $filter);

		$this->db->set('order', 0);
		$this->db->where('order', $current_order);
		$this->db->update($this->table);

		if ($filter_by != '' && $filter != '')
			$this->db->where($filter_by, $filter);

		if ($move == 'down') {
			$this->db->set('`order`', '`order`-1', false);
			$this->db->where('order > ', $current_order);
			$this->db->where('order <=', $desired_order);
			$this->db->update($this->table);
		} else {
			$this->db->set('`order`', '`order`+1', false);
			$this->db->where('order < ', $current_order);
			$this->db->where('order >=', $desired_order);
			$this->db->update($this->table);
		}

		// Update data yang dipindahkan
		if ($filter_by != '' && $filter != '')
			$this->db->where($filter_by, $filter);
		$this->db->set('order', $desired_order);
		$this->db->where('order', 0);
		$this->db->update($this->table);
	}

	public function reorder($delete_order, $filter_by = null, $filter = null)
	{
		if (!is_null($filter_by) && !is_null($filter)) {
			$this->db->where($filter_by, $filter);
		}

		$this->db->set('`order`', '`order`-1', false);
		$this->db->where('order > ', $delete_order);
		$this->db->update($this->table);
	}

	public function initialOrder($filter_by = null, $filter = null)
	{
		// Set order to default
		$this->db->set('order', 0);
		$this->db->update($this->table);

		$this->db->order_by('id', 'asc');
		$all_datas = $this->db->get($this->table)->result();

		foreach ($all_datas as $key => $data) {
			$this->db->where('id', $data->id);
			$this->db->set('order', $key + 1);
			$this->db->update($this->table);
		}
	}

	public function addPrefixColumn($table, $columns = array())
	{
		for ($i = 0; $i < sizeof($columns); $i++) {
			$columns[$i] = $table . '.' . $columns[$i];
		}

		return $columns;
	}

	public function filterStatus($status = '', $column = 'status')
	{
		if (!empty($status))
			$this->db->where($column, $status);

		return $this;
	}
}
