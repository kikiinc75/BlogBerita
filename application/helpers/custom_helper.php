<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('paginationConfig')) {
	function paginationConfig($params = [])
	{
		$params['first_link']       = 'First';
		$params['last_link']        = 'Last';
		$params['next_link']        = 'Next';
		$params['prev_link']        = 'Prev';
		$params['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$params['full_tag_close']   = '</ul></nav></div>';
		$params['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$params['num_tag_close']    = '</span></li>';
		$params['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$params['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$params['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$params['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$params['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$params['prev_tagl_close']  = '</span>Next</li>';
		$params['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$params['first_tagl_close'] = '</span></li>';
		$params['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$params['last_tagl_close']  = '</span></li>';

		return $params;
	}
}
