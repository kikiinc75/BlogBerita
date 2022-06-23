<?php

class NewsModel extends MY_Model
{

	protected $primary_key = 'id';
	protected $table = 'news';

	protected $fillable = [
		"category_id",
		"title",
		"subtitle",
		"excerpt",
		"description",
		"image_1",
		"image_2",
		"meta_title",
		"meta_keyword",
		"meta_description",
		"status",
		"featured",
		"created_at",
		"updated_at",
	];

	public function __construct()
	{
		// 
	}

	/**
	 * Fungsi untuk get All data
	 *
	 * @return array
	 */
	public function getFeatured($limit = 5)
	{
		$this->db->select('news.*, news_category.name as category_name,news_category.slug as category_slug, user.name as user_name');
		$this->db->where('featured', 1);
		$this->db->where('news.status', 'active');
		$this->db->join('news_category', 'news_category.id = news.category_id');
		$this->db->join('user', 'user.id = news.author_id');
		$this->db->order_by('created_at', 'desc');
		$this->db->limit($limit);
		return $this->db->get($this->table)->result();
	}

	public function getNonFeatured($limit = 5)
	{
		$this->db->select('news.*, news_category.name as category_name,news_category.slug as category_slug, user.name as user_name');
		$this->db->where('featured', 0);
		$this->db->where('news.status', 'active');
		$this->db->join('news_category', 'news_category.id = news.category_id');
		$this->db->join('user', 'user.id = news.author_id');
		$this->db->order_by('created_at', 'desc');
		$this->db->limit($limit);
		return $this->db->get($this->table)->result();
	}

	/**
	 * Fungsi untuk get All data
	 *
	 * @return array
	 */
	public function frontEndGetAll()
	{
		$this->db->select('news.*, news_category.name as category_name,news_category.slug as category_slug, user.name as user_name');
		$this->db->where('news.status', 'active');
		$this->db->join('news_category', 'news_category.id = news.category_id');
		$this->db->join('user', 'user.id = news.author_id');
		$this->db->order_by('created_at', 'desc');

		return $this->db->get($this->table)->result();
	}

	public function getByPagination($params = [], $category = 'all')
	{
		$this->load->library('pagination');
		// Membuat Style pagination untuk BootStrap v4
		$params = paginationConfig($params);
		$this->pagination->initialize($params);
		$limit = $params['per_page'];
		$offset = html_escape($this->input->get('per_page'));

		$this->db->select('news.*, news_category.name as category_name,news_category.slug as category_slug, user.name as user_name');
		$this->db->join('news_category', 'news_category.id = news.category_id');
		$this->db->join('user', 'user.id = news.author_id');
		$this->db->order_by('created_at', 'desc');
		if ($category !== 'all') {
			$this->db->where('news_category.slug', $category);
		}

		if (!$limit && $offset) {
			$query = $this->db->get_where($this->table, ['news.status' => 'active']);
		} else {
			$query =  $this->db->get_where($this->table, ['news.status' => 'active'], $limit, $offset);
		}
		return $query->result();
	}

	public function getPublishedCount()
	{
		$this->db->where('status', 'active');
		return $this->db->get($this->table)->num_rows();
	}
	public function getPublishedByCategoryCount($category)
	{
		$this->db->where('status', 'active');
		if ($category !== 'all') {
			$this->db->join('news_category', 'news_category.id = news.category_id');
			$this->db->where('news_category.slug', $category);
		}
		return $this->db->get($this->table)->num_rows();
	}

	public function getBySlug($slug)
	{
		$this->db->select('news.*, news_category.name as category_name,news_category.slug as category_slug, user.name as user_name');
		$this->db->join('news_category', 'news_category.id = news.category_id');
		$this->db->join('user', 'user.id = news.author_id');
		$this->db->where('news.slug', $slug);
		$query = $this->db->get($this->table);
		return $query->row();
	}
}
