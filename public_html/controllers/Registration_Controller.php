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

    private function verify_captcha($value)
    {
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $this->config->config['GOOGLE_CAPTCHA_SECRET_KEY'], 'response' => $value, 'remoteip' => $this->input->server('REMOTE_ADDR'));

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        curl_close($ch);

        if ($result === false) { /* Handle error */
            return false;
        }

        $result = json_decode($result);
        return $result->success;
    }

    public function verify_patient_captcha($value)
    {
        return $this->verify_captcha($value);
    }

    public function check_patient_username($value)
    {
        if (trim($value) === '') {
            $this->form_validation->set_message('check_patient_username', 'The Username is required');
            return false;
        }
        $this->repository = $this->doctrine->em->getRepository('GptUser');
        $user =  $this->repository->findOneBy([
                  'username' => $this->input->post('username'),
                  'role'     => GptUser::USER_ROLE_PATIENT
                ]);

        if ($user) {
            $this->form_validation->set_message('check_patient_username', 'Username already exists');
            return false;
        }
        return true;
    }

    public function registerPatient()
    {
        $this->load->library('form_validation');
        $data = array('user_creation_successful' => false);

        if ($this->form_validation->run('patient_registration')) {
            $patientId = $this->createPatient();
            $code = $this->createUser($patientId);
            $data = array('user_creation_successful' => true, 'code' => $code);
        }
        $this->render('register/patient', $data);
    }

    private function createPatient()
    {
        $em = $this->doctrine->em;
        $patient = new GptPatient();
        $patient->setSalutation($this->input->post('salutation'));
        $patient->setFirstName($this->input->post('first_name'));
        $patient->setLastName($this->input->post('last_name'));
        $patient->setMiddleName($this->input->post('middle_name'));
        $patient->setAge((int)$this->input->post('age'));
        $patient->setGender($this->input->post('gender'));
        $patient->preCreate();
        $em->persist($patient);
        $em->flush();
        return $patient->getId();
    }

    private function createUser($associationId, $role = GptUser::USER_ROLE_PATIENT, $status = GptUser::USER_STATUS_AWAITING_VERIFICATION)
    {
        $em = $this->doctrine->em;
        $user = new GptUser();
        $user->setAssociationId($associationId);
        $user->setUserName($this->input->post('username'));
        $user->setEmail($this->input->post('email_address'));
        $user->setStatus($status);
        $user->setRole($role);
        $user->setPassword("dummypassword"); // just to fill the column
        $user->preCreate();
        $verification_code = $user->generateVerificationCode();
        $user->setVerificationCode($verification_code);
        $em->persist($user);
        $em->flush();

        $this->sendVerificationEmail($user, $verification_code);
        return $verification_code;
    }

    private function sendVerificationEmail($user, $code)
    {
        $this->load->library('email');
        $this->load->library('parser');

        $html = $this->parser->parse('email/verification', [
          'username' => $user->getUserName(),
          'verification_link' => $user->getVerificationLink()
        ]);

        $this->email->from($this->config->config['gpt_email_config']['from_email'], $this->config->config['gpt_email_config']['from_name']);
        $this->email->to($user->getEmail());
        $this->email->subject($this->config->config['site_title'].' :: Verification required');
        $this->email->message($html);
        $this->email->send();
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
