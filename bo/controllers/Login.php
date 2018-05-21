<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends BO_Controller
{
    public function index()
    {
        $this->render('index');
    }

    public function dologin()
    {
        $this->load->view('login');
    }
}
