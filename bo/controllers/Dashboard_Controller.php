<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class Dashboard_Controller extends Authenticated_Controller
{
    public function index()
    {
        $this->render('index');
    }
}
