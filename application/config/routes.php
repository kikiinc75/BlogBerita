<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['article/(:any)'] = 'Home/newsCategory';
$route['article/(:any)/(:any)'] = 'Home/newsDetail';

// Back End Admin
$route['admin'] = "admin/Main/login";
$route['admin/login'] = "admin/Main/login";
$route['admin/do-login'] = "admin/Main/do_Login";
$route['admin/logout'] = "admin/Main/logout";
$route['admin/upload-ckeditor'] = 'admin/Main/upload_ckeditor';

/* Module News */
$route['admin/news/category'] = 'admin/NewsCategory/index';
$route['admin/news/category/create'] = 'admin/NewsCategory/create';
$route['admin/news/category/store'] = 'admin/NewsCategory/store';
$route['admin/news/category/edit/(:num)'] = 'admin/NewsCategory/edit/$1';
$route['admin/news/category/update/(:num)'] = 'admin/NewsCategory/update/$1';
$route['admin/news/category/delete/(:num)'] = 'admin/NewsCategory/delete/$1';

$route['admin/news'] = 'admin/News/index';
$route['admin/news/datatable'] = 'admin/News/datatable';
$route['admin/news/create'] = 'admin/News/create';
$route['admin/news/store'] = 'admin/News/store';

$route['admin/news/edit/(:num)'] = 'admin/News/edit/$1';
$route['admin/news/update/(:num)'] = 'admin/News/update/$1';
$route['admin/news/delete/(:num)'] = 'admin/News/delete/$1';

$route['admin/user'] = 'admin/User/index';
$route['admin/user/create'] = 'admin/User/create';
$route['admin/user/store'] = 'admin/User/store';
$route['admin/user/datatable'] = 'admin/User/datatable';
$route['admin/user/edit/(:num)'] = 'admin/User/edit/$1';
$route['admin/user/update/(:num)'] = 'admin/User/update/$1';
$route['admin/user/delete/(:num)'] = 'admin/User/delete/$1';
