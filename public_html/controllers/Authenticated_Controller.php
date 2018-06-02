<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Authenticated_Controller extends Public_Controller
{
    private $user;
    public function __construct()
    {
        parent::__construct();

        if (!$this->isLoggedIn()) {
            redirect('login');
        }

        $this->user = $this->session->user;
    }

    protected function getUser()
    {
        return $this->user;
    }
}
