<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['admin_menu'] = array(
	'Dashboard' => 'dashboard',
	'Users' => array(
		'Pending Users' => 'users/pending',
		'Add User' => 'users/add', // url users/add in public site will be opened with admin credentials
		'Search Users' => 'users/search',
	),
	'Employers' => array(
		'Add Employer' => 'employers/add',
		'Search Employers' => 'employers/search',
	),
	'Companies' => array(
		'Add Company' => 'companies/add',
		'Pending Companies' => 'companies/pending',
		'Search Companies' => 'companies/search',
	),
	'Jobs' => array(
		'Add Job' => 'jobs/add',
		'Pending Jobs' => 'jobs/pending',
		'Search Jobs' => 'jobs/search',
		'Export Active Jobs' => 'jobs/weeklyjobs',
		'Applications' => array(
			'Pending Job Applications' => 'applications/pending_verification',
			'Search Job Applications' => 'applications',
		)
	),
	'Reports' => array(
		'Master Users Data' => 'reports/mastersheet',
		'Users Report' => 'reports/users',
		'Companies Report' => 'reports/companies',
		'Jobs/Applications Report' => 'reports/applications',
		'Placement Report' => 'reports/placement',
		'Hiring Report' => 'reports/hiring',
		'Donation Report' => 'reports/donation',
		'Receivable Report' => 'reports/receivable',
	),
	'System' => array(
		'Settings' => 'settings/general',
		'Admin' => array(
			'Add Account' => 'accounts/add',
			'All Accounts' => 'accounts'
		),
		'Email Templates' => 'settings/emails',
		'Industry' => 'settings/industries',
		'Functional Area' => 'settings/funcarea',
	)
);
