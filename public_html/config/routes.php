<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
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
$route['default_controller'] = 'main';

$route['jobs'] = 'jobs/index';
$route['resources'] = 'page/coming_soon';
$route['contact'] = 'statics/contact';
$route['verification/resetpassword'] = 'verification/resetpassword';
$route['verification/(:any)'] = 'verification/index/$1';
$route['jobs/search'] = 'jobs/search';
$route['jobs/categories'] = 'jobs/category_list';
$route['jobs/cities'] = 'jobs/city_list';
$route['jobs/(:num)'] = 'jobs/index/$1';
$route['jobs-in-(:any)'] = 'jobs/cities/$1';
$route['jobs-in-(:any)/(:num)'] = 'jobs/cities/$1/$2';
$route['jobs/(:any)'] = 'jobs/categories/$1';
$route['jobs/(:any)/(:num)'] = 'jobs/categories/$1/$2';
$route['job/apply'] = 'jobs/apply';
$route['job/apply/success'] = 'statics/applicationsuccess';
$route['job/(:any)'] = 'jobs/details/$1';
$route['forgot'] = 'login/forgot';
$route['profile'] = 'user/profile'; /* @// TODO: Configure SendGrid */
$route['notifications'] = 'user/notifications'; /* @// TODO: Configure SendGrid */
$route['login'] = 'login';
$route['password'] = 'user/password'; /* @// TODO: Configure SendGrid */
$route['logout'] = 'login/dologout';
$route['a/(:any)'] = 'user/accessasadmin/$1';
$route['u/(:any)'] = 'user/loginasuser/$1';

$route['404_override'] = 'page/show404';
$route['translate_uri_dashes'] = FALSE;
