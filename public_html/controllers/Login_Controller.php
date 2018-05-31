<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Controller extends Public_Controller
{
    private $repository;
    private $user;

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
        $user =  $this->repository->findOneBy([
                    'username' => $this->input->post('username'),
                    'role'     => $this->input->post('login_as')
                  ]);

        if (!$user) {
            $this->form_validation->set_message('check_login', 'Username does not exist');
            return false;
        } elseif ($user->isBanned()) {
            $this->form_validation->set_message('check_login', 'Username has been blocked. Please contact administrator');
            return false;
        } elseif (!$this->auth->validatePwd($this->input->post('password'), $user->getPassword())) {
            $this->form_validation->set_message('check_login', 'You have entered an invalid password');
            return false;
        } else {
            $this->user = $user;
            return true;
        }
    }
    public function index()
    {
        if ($this->isLoggedIn()) {
            redirect('');
        }
        $this->repository = $this->doctrine->em->getRepository('GptUser');

        $this->load->library('form_validation');

        if ($this->form_validation->run('login') == false) {
            $this->render('login');
        } else {
            $this->initializeLogin();
        }
    }

    private function initializeLogin()
    {
        $this->session->set_userdata('user', (object)[
          'id'    =>$this->user->getId(),
          'name'  =>$this->user->getName(),
          'email'  =>$this->user->getEmail(),
          'role'  =>$this->user->getRole(),
          'association_id'  =>$this->user->getAssociationId(),
        ]);
        redirect('');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
