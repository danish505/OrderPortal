<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authenticated_Controller extends BO_Controller
{
    public function __construct()
    {
        parent::__construct();

        if (!$this->session->user || !($this->session->user->id > 0)) {
            redirect('login');
        }
    }
}
