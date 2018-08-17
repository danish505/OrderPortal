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
    'patient_profile' => array(
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
        'field' => 'date_of_birth',
        'label' => 'Date of Birth',
        'rules' => 'required',
        'error_prefix' => '<small id="error_date_of_birth" class="form-text text-muted">',
        'error_suffix' => '</small>'
      )
    )
);
