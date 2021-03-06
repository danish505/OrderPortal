<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Controller extends BO_Controller
{
    private $repository;
    private $admin;

    public function check_login($value)
    {
        if (trim($value) === '') {
            $this->form_validation->set_message('check_login', 'The Username field is required');
            return false;
        }

        $this->load->library('Password');
        $admin =  $this->repository->findOneBy([
                    'username' => $this->input->post('username')
                  ]);

        if (!$admin) {
            $this->form_validation->set_message('check_login', 'Username does not exist');
            return false;
        } elseif ($admin->isBanned()) {
            $this->form_validation->set_message('check_login', 'Username has been blocked. Please contact administrator');
            return false;
        } elseif (!$this->password->validate($this->input->post('password'), $admin->getPassword())) {
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
        $this->repository = $this->doctrine->em->getRepository('GptAdmin');
        $this->load->library('form_validation');

        if ($this->form_validation->run('login') == false) {
            $this->load->view('login');
        } else {
            $this->initializeLogin($this->admin);
        }
    }

    private function initializeLogin($user)
    {
        $this->setUserInSession($user);
        redirect('');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
