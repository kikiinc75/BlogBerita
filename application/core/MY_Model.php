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
		if ($this->table != 'newsletter')
			$params['author_id'] = $this->session->userdata('user_id');

		if (strpos($this->table, 'translate') === false) {
			$params['created_at'] = date('Y-m-d H:i:s');
			$params['updated_at'] = date('Y-m-d H:i:s');
		}

		$this->db->insert($this->table, $params);
		return $this->db->insert_id();
	}

	public function update($key, $params)
	{
		$this->db->set($params);
		$this->db->where($this->primary_key, $key);
		return $this->db->update($this->table);
	}

	public function delete($key)
	{
		$this->db->where($this->primary_key, $key);
		$this->db->delete($this->table);
	}
}
