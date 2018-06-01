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
  'patient_registration' => array()
);
