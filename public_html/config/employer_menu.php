<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['employer_menu'] = array(
	'Dashboard' => 'employer/dashboard',
	'Companies' => array(
		'Add Company' => 'employer/companies/add',
		'All Companies' => 'employer/companies',
	),
	'Jobs' => array(
		'Post a Job' => 'employer/jobs/add',
		'All Jobs' => 'employer/jobs'
	)
);