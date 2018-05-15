<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
Array Key will be the Role ID
Array Must Contain Permissions Array
To Give Access to all Sections add '*' as an entry in permissions array
 */

$config['admin_roles'] = array(
	'1' => array(
		'role_name' => 'Super User',
		'permissions' => array(
			'*'
		)
	),
	'2' => array( 
		'role_name' => 'Administrator',
		'permissions' => array(
			'list',
			'add',
			'edit',
			'password_reset',
			'applications/list',
			'applications/export',
			'companies/pending',
			'companies/search',
			'companies/details',
			'companies/add',
			'companies/edit',
			'companies/assign',
			'companies/delete',
			'employers/search',
			'employers/details',
			'employers/add',
			'employers/edit',
			'employers/delete',
			'jobs/pending',
			'jobs/search',
			'jobs/details',
			'jobs/add',
			'jobs/edit',
			'jobs/delete',
			'jobs/export',
			'reports/mastersheet',
			'reports/users',
			'reports/companies',
			'reports/applications',
			'reports/placement',
			'reports/donation',
			'settings/emails',
			'settings/industries',
			'settings/funcarea',
			'users/pending',
			'users/search',
			'users/details',
			'users/login_behalf',
			'users/add',
			'users/edit',
			'users/delete',
		)
	),
	'3' => array(
		'role_name' => 'Placement Officer',
		'permissions' => array(
			'applications/list',
			'applications/export',
			'companies/search',
			'companies/details',
			'companies/add',
			'companies/edit',
			'jobs/pending',
			'jobs/search',
			'jobs/details',
			'jobs/add',
			'jobs/edit',
			'jobs/export',
			'users/pending',
			'users/search',
			'users/details',
			'users/add',
			'users/edit',
		)
	),
	'4' => array(
		'role_name' => 'Area Representative',
		'permissions' => array(
			'users/add',
			'users/details',
			'jobs/export'
		)
	),
);