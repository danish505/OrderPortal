<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class MyAccount_Controller extends Authenticated_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('form_validation');
        $this->load->library('captcha');

        $session_user = $this->getUser();
        $key = strtolower($session_user->role);

        $userRepository = $this->doctrine->em->getRepository('GptUser');
        $user = $userRepository->findOneBy([
          'userId'  =>  $session_user->id
        ]);
        $user_detail = $user->getDetail($this->doctrine->em);
        $data = [
          'user' => $user,
          'user_detail' => $user_detail,
          'salutations' => $this->config->config['gpt_variable']['salutation'],
          'profile_update_successful' => false,
          'GOOGLE_CAPTCHA_SITE_KEY' => $this->captcha->getSiteKey(),
          'injected_scripts' => $this->captcha->getScript()
      ];
        if ($this->form_validation->run($key.'_profile')) {
            if ($user->getEmail() !== $this->input->post('email_address')) {
                $user->setEmail($this->input->post('email_address'));
                $this->doctrine->em->persist($user);
                $this->doctrine->em->flush();
            }

            switch ($session_user->role) {
              case GptUser::USER_ROLE_PATIENT:
                $this->updatePatient($user_detail);
              break;
            }
            $data['profile_update_successful'] = true;
        }
        $this->render('myaccount/'.$key, $data);
    }

    private function updatePatient(&$patient)
    {
        $patient->setSalutation($this->input->post('salutation'));
        $patient->setFirstName($this->input->post('first_name'));
        $patient->setLastName($this->input->post('last_name'));
        $patient->setMiddleName($this->input->post('middle_name'));
        $patient->setAge($this->input->post('age'));
        $patient->setGender($this->input->post('gender'));

        $this->doctrine->em->persist($patient);
        $this->doctrine->em->flush();
    }

    public function verify_captcha($value)
    {
        return $this->captcha->verify($value, $this->input->server('REMOTE_ADDR'));
    }
}
