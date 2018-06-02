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
  'patient_registration' => array(
    array(
      'field' => 'username',
      'label' => 'Username',
      'rules' => 'callback_check_patient_username',
      'error_prefix' => '<small id="error_username" class="form-text text-muted">',
      'error_suffix' => '</small>'
    ),
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
      'rules' => 'callback_verify_patient_captcha',
      'error_prefix' => '<small id="error_age_name" class="form-text text-muted">',
      'error_suffix' => '</small>'
    )
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
