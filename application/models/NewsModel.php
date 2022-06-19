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
		"created_at",
		"updated_at",
	];

	public function __construct()
	{
		// 
	}
}
