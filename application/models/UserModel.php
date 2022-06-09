<?php

class UserModel extends MY_Model
{

	protected $primary_key = 'id';

	protected $fillable = [
		"name",
		"position",
		"phone",
		"email",
		"username",
		"password",
		"created_at",
		"updated_at",
	];

	public function __construct()
	{
		$this->table = 'user';
	}

	/**
	 * Fungsi ini untuk validasi login administrator
	 *
	 * @param String $email
	 * @param String $password
	 * @return array
	 */
	function cekLogin($email)
	{
		$this->db->select('*');
		$this->db->where('email', $email);
		return $this->db->get($this->table);
	}
}
