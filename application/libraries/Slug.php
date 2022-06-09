<?php

class Slug
{

	public function create($value = '', $unique = false, $table = null, $column = null, $id = '')
	{
		if (empty($value)) {
			return FALSE;
		}

		if ($unique) {
			return $this->_check_uri($this->create_slug($value), $table, $column, $id);
		} else {
			return $this->create_slug($value);
		}
	}

	/**
	 * Check URI
	 *
	 * Checks other items for the same uri and if something else has it
	 * change the name to "name-1".
	 *
	 * @param   string $uri
	 * @param   int $id
	 * @param   int $count
	 * @return  string
	 */
	private function _check_uri($value, $table, $column, $id, $count = 0)
	{
		$CI = &get_instance();
		$new_uri = ($count > 0) ? $value . "-" . $count : $value;

		// Setup the query
		$CI->db->select($column)->where($column, $new_uri);

		if ($id) {
			$CI->db->where('id !=', $id);
		}

		if ($CI->db->count_all_results($table) > 0) {
			return $this->_check_uri($value, $table, $column, $id, ++$count);
		} else {
			return $new_uri;
		}
	}

	/**
	 * Create Slug
	 *
	 * Returns a string with all spaces converted to underscores (by default), accented
	 * characters converted to non-accented characters, and non word characters removed.
	 *
	 * @param   string $string the string you want to slug
	 * @param   string $replacement will replace keys in map
	 * @return  string
	 */
	public function create_slug($value)
	{
		$CI = &get_instance();
		$CI->load->helper(array('url', 'text', 'string'));
		$value = strtolower(url_title(convert_accented_characters($value), "-"));
		return reduce_multiples($value, "-", TRUE);
	}
}
