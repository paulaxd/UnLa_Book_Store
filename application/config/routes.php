<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['books/(:any)'] = 'books/view/$1';
$route['purchase/(:any)/(:any)/(:any)/(:any)/(:any)'] = 'cart/purchase/$1/$2/$3/$4/$5';
$route['admin/view/(:any)'] = 'books/update/$1';
$route['admin/delete/(:any)'] = 'books/delete/$1';
$route['default_controller'] = 'books';
$route['books/create'] = 'books/create';
$route['books/insert'] = 'books/insert';
$route['books/admin/list'] = 'books/list_books';
$route['books/update'] = 'books/update';
$route['cart/view'] = 'cart';
$route['cart/update'] = 'cart/update';
$route['ckeditor'] = 'ckeditor';
$route['404_override'] = '';
$route['books'] = 'books';
$route['(:any)'] = 'pages/view/$1';
$route['auth/register'] = 'auth/register';
$route['auth/change/email'] = 'auth/change_email';
$route['auth/change/pass'] = 'auth/change_password';
$route['auth/login'] = 'auth/login';
$route['auth/logout'] ='auth/logout';
$route['auth'] = 'auth';
$route['checkout'] ='cart/checkout';
$route['descuentos'] ='descuentos';

$route['descuentos/update_form'] ='descuentos/update_form';
$route['descuentos/update'] ='descuentos/update';

$route['descuentos/create_form'] ='descuentos/create_form';
$route['descuentos/create'] ='descuentos/create';

$route['descuentos/delete_form'] ='descuentos/delete_form';
$route['descuentos/delete'] ='descuentos/delete';


//$route['default_controller'] = 'pages/view';


/* End of file routes.php */
/* Location: ./application/config/routes.php */
