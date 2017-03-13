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

$route['default_controller'] = "index/login";
$route['404_override'] = '';

// my custom routing //
$route['employer/message/(:any)'] = "employer/message/$1";
$route['employer/project/(:any)'] = "employer/project/$1";
$route['employer/inbox/(:any)'] = "employer/message/$1";
$route['employer/(:any)'] = "employer/index/$1";
$route['employer'] = "employer/index";

$route['contractor/lead/(:any)'] = "contractor/lead/$1";
$route['contractor/recurringPaymentChecker/(:any)'] = "contractor/recurringPaymentChecker/$1";
$route['contractor/lead/(:any)'] = "contractor/lead/$1";
$route['contractor/message/(:any)'] = "contractor/message/$1";
$route['contractor/(:any)'] = "contractor/index/$1";
$route['contractor'] = "contractor/index";


$route['login'] = "index/login";
$route['forgotPassword'] = "index/forgotPassword";
$route['reset_password'] = "index/reset_password";
$route['upload'] = 'upload';
$route['upload/do_upload'] = 'upload/do_upload';
/* End of file routes.php */
/* Location: ./application/config/routes.php */