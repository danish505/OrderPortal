<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Controller extends BO_Controller
{
    private $repository;
    private $admin;

    public function __construct()
    {
        parent::__construct();
    }

    public function check_login($value)
    {
        if (trim($value) === '') {
            $this->form_validation->set_message('check_login', 'The Username field is required');
            return false;
        }
        $admin =  $this->adminRepository->findOneBy([
                    'username' => $this->input->post('username')
                  ]);

        if (!$admin) {
            $this->form_validation->set_message('check_login', 'Username does not exist');
            return false;
        } elseif ($admin->isBanned()) {
            $this->form_validation->set_message('check_login', 'Username has been blocked. Please contact administrator');
            return false;
        } elseif (!$this->auth->validatePwd($this->input->post('password'), $admin->getPassword())) {
            $this->form_validation->set_message('check_login', 'You have entered an invalid password');
            return false;
        } else {
            $this->admin = $admin;
            return true;
        }
    }
    public function index()
    {
        if ($this->isLoggedIn()) {
            redirect('');
        }
        $this->adminRepository = $this->doctrine->em->getRepository('GptAdmin');
        $this->load->library('form_validation');

        if ($this->form_validation->run('login') == false) {
            $this->load->view('login');
        } else {
            $this->initializeLogin();
        }
    }

    private function initializeLogin()
    {
        $this->session->set_userdata('user', (object)[
          'id'    =>$this->admin->getId(),
          'name'  =>$this->admin->getName()
        ]);
        redirect('');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
