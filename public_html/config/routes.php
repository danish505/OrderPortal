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
$route['default_controller'] = 'Page_Controller';
$route['about-us'] = 'Page_Controller/aboutUs';
$route['services'] = 'Page_Controller/services';
$route['hospitals'] = 'Page_Controller/hospitals';
$route['contact-us'] = 'Page_Controller/contactUs';
$route['patients'] = 'Page_Controller/patients';
$route['login'] = 'Login_Controller';
$route['logout'] = 'Login_Controller/logout';
$route['search'] = 'Search_Controller';

$route['register-patient'] = 'Registration_Controller/registerPatient';
$route['register-hospital'] = 'Registration_Controller/registerHospital';
$route['register-service-provider'] = 'Registration_Controller/registerServiceProvider';
$route['v/p/(:any)'] = 'Verification_Controller/verifyPatient/$1';

$route['my-account'] = 'MyAccount_Controller';
$route['my-account/ajax'] = 'MyAccount_Controller/ajax';
$route['my-account/json/(:any)/(:num)'] = 'MyAccount_Controller/json/$1/$2';

$route['translate_uri_dashes'] = false;
