<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verification_Controller extends Public_Controller
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
        redirect('');
    }

    public function verifyPatient($code)
    {
        $this->verify(GptUser::USER_ROLE_PATIENT, $code);
    }

    private function verify($role, $code)
    {
        $userRepository = $this->doctrine->em->getRepository('GptUser');
        $user = $userRepository->findOneBy([
          'role'              =>  $role,
          'verificationCode' =>  $code,
          'status'            =>  GptUser::USER_STATUS_AWAITING_VERIFICATION
        ]);
        if ($user) {
            $this->load->library('form_validation');
            if ($this->form_validation->run('user_activation')) {
                $user->setStatus(GptUser::USER_STATUS_ACTIVE);
                $user->setPassword($this->auth->makePwd($this->input->post('password')));
                $this->doctrine->em->persist($user);
                $this->doctrine->em->flush();
                redirect('login?activation=1');
            }
            $this->load->vars([
              'injected_scripts' => '<script src="'.base_url().'/assets/js/pwstrength-bootstrap.min.js"></script>'
            ]);
            $this->render('register/activation', ['user' => $user]);
        } else {
            $this->render('register/invalid-code');
        }
    }
}
