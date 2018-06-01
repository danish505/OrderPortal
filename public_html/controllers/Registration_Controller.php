<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registration_Controller extends Public_Controller
{
    public function __construct()
    {
        parent::__construct();

        if ($this->isLoggedIn()) {
            redirect('');
        }
    }

    public function index()
    {
        redirect('register-patient');
    }

    public function registerPatient()
    {
        $this->load->library('form_validation');

        if ($this->form_validation->run('patient_registration') == false) {
            $this->render('register/patient');
        } else {
            //$this->initializeLogin();
        }
    }

    public function registerHospital()
    {
        $this->render('register/hospital');
    }

    public function registerServiceProvider()
    {
        $this->render('register/service-provider');
    }
}
