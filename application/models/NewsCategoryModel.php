<?php

class NewsCategoryModel extends MY_Model
{

	protected $primary_key = 'id';

	protected $fillable = [
		"name",
		"slug",
		"author_id",
		"order",
		"created_at",
		"updated_at",
	];

	public function __construct()
	{
		$this->table = 'news_category';
	}
}
