<?php
defined('BASEPATH') or exit('No direct script access allowed');

/*
Define URLs here which will be accessible in all sub-applications
*/
$config['public_url'] = 'http://global-patienttransfer.com';
$config['admin_url'] = 'http://bo.global-patienttransfer.com';
$config['site_title'] = 'Global Patient Transfer';

$config['GOOGLE_CAPTCHA_SITE_KEY'] = '6LekK1wUAAAAAP_GmvRYBWiHxmOi8rDvgc6atO5S';
$config['GOOGLE_CAPTCHA_SECRET_KEY'] = '6LekK1wUAAAAADlydbweXtXuJqWU-9kG58PtnPvX';

$config['gpt_variable']['salutation'] = [
  'Mr.' => 'Mr.',
  'Ms.' => 'Ms.',
  'Mrs.' => 'Mrs.',
  'Dr.' => 'Dr.'
];

$config['gpt_email_config']['from_email'] = 'no-reply@lobal-patienttransfer.local';
$config['gpt_email_config']['from_name']  = $config['site_title'];
