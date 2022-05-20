<?php

class UserModel extends CI_Model
{

	protected $primary_key = 'id';

	protected $fillable = [
		"name",
		"position",
		"phone",
		"email",
		"username",
		"password"
	];

	public function __construct()
	{
		$this->table = 'user';
	}

	/**
	 * Fungsi ini untuk validasi login administrator
	 *
	 * @param String $username
	 * @param String $password
	 * @return array
	 */
	function cekLogin($username)
	{
		$this->db->select('*');
		$this->db->where('username', $username);
		return $this->db->get($this->table);
	}
}
