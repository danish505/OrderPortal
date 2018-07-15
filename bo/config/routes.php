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
//$route['default_controller'] = 'Dashboard_Controller';
$route['default_controller'] = 'Patient_Controller';
$route['patients'] = 'Patient_Controller';
$route['patient/(:num)'] = 'Patient_Controller/view/$1';
$route['hospitals'] = 'Hospital_Controller';
$route['services'] = 'Service_Controller';
$route['services/ajax'] = 'Service_Controller/ajax';
$route['services/json/(:num)'] = 'Service_Controller/json/$1';
$route['departments'] = 'Department_Controller';
$route['departments/ajax'] = 'Department_Controller/ajax';
$route['departments/json/(:num)'] = 'Department_Controller/json/$1';
$route['service-providers'] = 'ServiceProvider_Controller';
$route['service-providers/ajax'] = 'ServiceProvider_Controller/ajax';
$route['service-providers/json/(:num)'] = 'ServiceProvider_Controller/json/$1';
$route['service-providers/json/(:num)/service'] = 'ServiceProvider_Controller/json_service/$1';
$route['service-providers/json/(:num)/contact'] = 'ServiceProvider_Controller/json_contact/$1';
$route['service-providers/json/(:num)/contact-address'] = 'ServiceProvider_Controller/json_contact_address/$1';
$route['service-providers/json/(:num)/contact-email'] = 'ServiceProvider_Controller/json_contact_email/$1';
$route['service-providers/json/(:num)/contact-phone'] = 'ServiceProvider_Controller/json_contact_phone/$1';
$route['service-providers/(:num)'] = 'ServiceProvider_Controller/view/$1';
$route['contacts'] = 'Contact_Controller';
$route['contacts/ajax'] = 'Contact_Controller/ajax';
$route['contacts/json/(:any)/(:num)'] = 'Contact_Controller/json/$1/$2';


$route['login'] = 'Login_Controller';
$route['logout'] = 'Login_Controller/logout';

$route['404_override'] = 'page/show404';
$route['translate_uri_dashes'] = false;
