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

        // use key 'http' even if you send the request to https://...
        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
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
            $this->createUser($patientId);
            $data = array('user_creation_successful' => true);
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

    private function createUser($associationId, $role = GptUser::USER_ROLE_PATIENT, $status = GptUser::USER_STATUS_ACTIVE)
    {
        $em = $this->doctrine->em;
        $user = new GptUser();
        $user->setAssociationId($associationId);
        $user->setUserName($this->input->post('username'));
        $user->setStatus($status);
        $user->setRole($role);
        $user->setPassword("dummypassword"); // just to fill the column
        $user->preCreate();
        $em->persist($user);
        $em->flush();
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
