<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class MyAccount_Controller extends Authenticated_Controller
{
    public function index()
    {
        $this->load->library('form_validation');
        $this->load->library('captcha');

        $user = $this->getUser();
        $key = strtolower($user->getRole());

        $user_detail = $user->getDetail($this->doctrine->em);
        $injectedScripts[] = $this->captcha->getScript();
        $injectedScripts[] = '<script type="text/javascript" async="" src="'.$this->config->config['base_url'].'/assets/js/patient.js"></script>';

        $data = [
          'user' => $user,
          'user_detail' => $user_detail,
          'salutations' => $this->config->config['gpt_variable']['salutation'],
          'profile_update_successful' => false,
          'GOOGLE_CAPTCHA_SITE_KEY' => $this->captcha->getSiteKey(),
          'injected_scripts' => implode('',$injectedScripts)
      ];
        if ($this->form_validation->run($key.'_profile')) {
            if ($user->getEmail() !== $this->input->post('email_address')) {
                $user->setEmail($this->input->post('email_address'));
                $this->doctrine->em->persist($user);
                $this->doctrine->em->flush();
            }

            switch ($user->getRole()) {
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

    public function ajax(){
        $this->{'callback_'.$this->input->post('action')}();
    }

    private function output_response_success($html){
        $response = array('success' => TRUE, 'html' => $html);
        $this->output
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    private function output_response_failure($message){
        $response = array('success' => FALSE, 'message' => $message);
        $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($response));
    }

    private function callback_patient_contact_add(){

        $em = $this->doctrine->em;

        $contact = new GptPatientContact();
        $contact->setSalutation($this->input->post('salutation'));
        $contact->setFirstName($this->input->post('first_name'));
        $contact->setLastName($this->input->post('last_name'));
        $contact->setMiddleName($this->input->post('middle_name'));
        $patient = $this->getUser()->getDetail($em);
        $contact->setPatient($patient);
        $contact->preCreate();
        $em->persist($contact);
        $em->flush();
        echo $contact->getId().' == ';
        echo $contact->getPatient()->getId();
        //$patient->setAge($this->input->post('age'));
        //$patient->setGender($this->input->post('gender'));
        //$patient->preCreate();
        //$em->persist($patient);
        //$em->flush();
        //return $patient->getId();
        
        $view = $this->load->view('myaccount/partials/display-contact', [], true);

        $this->output_response_success($view);
    }

    private function callback_patient_contact_update(){
        $view = $this->load->view('myaccount/partials/display-contact', [], true);
        $this->output_response_success($view);
    }

    private function callback_patient_contact_address_add(){
        $view = $this->load->view('myaccount/partials/display-address', [], true);
        $this->output_response_success($view);
    }

    private function callback_patient_contact_address_update(){
        $view = $this->load->view('myaccount/partials/display-address', [], true);
        $this->output_response_success($view);
    }

    private function callback_patient_contact_phone_number_add(){
        $view = $this->load->view('myaccount/partials/display-phone', [], true);
        $this->output_response_success($view);
    }

    private function callback_patient_contact_phone_number_update(){
        $view = $this->load->view('myaccount/partials/display-phone', [], true);
        $this->output_response_success($view);
    }

    private function callback_patient_contact_email_address_add(){
        $view = $this->load->view('myaccount/partials/display-email', [], true);
        $this->output_response_success($view);
    }

    private function callback_patient_contact_email_address_update(){
        $view = $this->load->view('myaccount/partials/display-email', [], true);
        $this->output_response_success($view);
    }
    
}
