<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
Define URLs here which will be accessible in all sub-applications
*/
$config['public_url'] = 'http://global-patienttransfer.com';
$config['admin_url'] = 'http://bo.global-patienttransfer.com';
$config['site_title'] = 'Global Patient Transfer';

$config['gpt_variable']['salutation'] = [
  'Mr.' => 'Mr.',
  'Ms.' => 'Ms.',
  'Mrs.' => 'Mrs.',
  'Dr.' => 'Dr.'
];

$config['gpt_email_config']['from_email'] = 'no-reply@global-patienttransfer.com';
$config['gpt_email_config']['from_name']  = $config['site_title'];
