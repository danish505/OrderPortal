<?php

$config = array(
  'login' => array(
    array(
        'field' => 'username',
        'label' => 'Username',
        'rules' => 'callback_check_login'
      ),
      array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required'
      ),
  ),
  'user_activation' => array(
    array(
        'field' => 'password',
        'label' => 'Password',
        'rules' => 'required'
      ),
      array(
        'field' => 'confirm_password',
        'label' => 'Confirm Password',
        'rules' => 'required|matches[password]'
      ),
  ),
);

$patient_profile = array(
  array(
    'field' => 'first_name',
    'label' => 'First name',
    'rules' => 'required',
    'error_prefix' => '<small id="error_first_name" class="form-text text-muted">',
    'error_suffix' => '</small>'
  ),
  array(
    'field' => 'last_name',
    'label' => 'Last name',
    'rules' => 'required',
    'error_prefix' => '<small id="error_last_name" class="form-text text-muted">',
    'error_suffix' => '</small>'
  ),
  array(
    'field' => 'email_address',
    'label' => 'Email Address',
    'rules' => 'trim|required|valid_email',
    'error_prefix' => '<small id="error_email_address" class="form-text text-muted">',
    'error_suffix' => '</small>'
  ),
  array(
    'field' => 'age',
    'label' => 'Age',
    'rules' => 'required',
    'error_prefix' => '<small id="error_age_name" class="form-text text-muted">',
    'error_suffix' => '</small>'
  ),
  array(
    'field' => 'g-recaptcha-response',
    'label' => 'Captcha',
    'rules' => 'callback_verify_captcha',
    'error_prefix' => '<small id="error_age_name" class="form-text text-muted">',
    'error_suffix' => '</small>'
  )
);

$patient_registration = array_merge($patient_profile, array(array(
  'field' => 'username',
  'label' => 'Username',
  'rules' => 'callback_check_patient_username',
  'error_prefix' => '<small id="error_username" class="form-text text-muted">',
  'error_suffix' => '</small>'
)));

$config = array_merge($config, array('patient_registration' => $patient_registration, 'patient_profile' => $patient_profile));
