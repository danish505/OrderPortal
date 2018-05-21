<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config['options_data'] = array(
	'user_status' => array('pending_email_verification','pending_verification','approved','unapproved'),
	'employer_status' => array('pending_email_verification','pending_verification','approved','unapproved'),
	'gender' => array('Male','Female'),
	'employment_status' => array('Fresh','Employed - Full Time','Employed - Part Time','Unemployed','Retired - Employed', 'Retired - Unemployed','Intern','Freelancer'),
	'functional_title' => array('Intern/Student','Assistant','Officer','Manager','Teacher/Faculty/Trainer','Department Head','GM/CEO/Country Head/President','Domestic Worker/Helper/Maid','Office Helper/Boy/Peon','Outdoor Officer/Rider','Labor','Technician','Driver','Care Taker'),
	'degree_level' => array('No Formal Education','Primary Education','Matriculation','O-Level','Intermediate','A-Level','Bachelors','Masters','Doctorate','Other'),
	'job_nature' => array('Full Time','Part Time','Internship','Freelance'),
	'job_shift' => array('Morning','Evening','Rotating'),
	'job_status' => array('pending','approved','unapproved','completed','expired'),
	'job_type' => array('EPB Jobs','Third Party Portal','Third Party Email'),
	'company_type' => array('Individual','Sole Proprietorship','Public','Private','NGO'),
	'company_status' => array('pending','approved','unapproved'),
	'account_status' => array('active','inactive'),
	'application_status' => array('pending_verification','new','reviewed','shortlisted','rejected','selected'),
	'employer_status' => array('pending_email_verification','pending_verification','approved','unapproved'),
	'salary_range' => array(5000,6000,7000,8000,9000,10000,11000,12000,13000,14000,15000,16000,17000,18000,19000,20000,25000,30000,35000,40000,45000,50000,60000,70000,80000,90000,100000,125000,150000,175000,200000,250000,300000,350000,400000,450000,500000,500001)
);