<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

use Doctrine\Common\Collections\Criteria;

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
        
        $view = $this->load->view('myaccount/partials/display-contact', ['contact' => $contact], true);

        $this->output_response_success($view);
    }

    private function callback_patient_contact_update(){
        $view = $this->load->view('myaccount/partials/display-contact', [], true);
        $this->output_response_success($view);
    }

    private function callback_patient_contact_address_add(){
        $em = $this->doctrine->em;

        $address = new GptPatientContactAddress();
        $address->setAddress([
            'streetAddr1' => $this->input->post('street_add_1'),
            'streetAddr2' => $this->input->post('street_add_2'),
            'streetAddr3' => $this->input->post('street_add_3'),
            'zipcode' => $this->input->post('zipcode'),
            'city' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country')
        ]);
        $contact = $this->findContact($this->input->post('contact_id'));
        if($contact){
            $address->setContact($contact);
            $address->preCreate();
            $em->persist($address);
            $em->flush();
            $view = $this->load->view('myaccount/partials/display-address', ['address' => $address], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_patient_contact_address_update(){
        $view = $this->load->view('myaccount/partials/display-address', [], true);
        $this->output_response_success($view);
    }

    private function callback_patient_contact_phone_number_add(){

        $em = $this->doctrine->em;
        $phone_number = new GptPatientContactPhone();
        $phone_number->setPhone([
            'ctryCd' => $this->input->post('ctry_cd'),
            'areaCd' => $this->input->post('area_cd'),
            'phoneNo' => $this->input->post('phone_no'),
            'extension' => $this->input->post('ext')
        ]);
        $contact = $this->findContact($this->input->post('contact_id'));
        
        if($contact){
            $phone_number->setContact($contact);
            $phone_number->preCreate();
            $em->persist($phone_number);
            $em->flush();
            $view = $this->load->view('myaccount/partials/display-phone', ['phone_number' => $phone_number], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_patient_contact_phone_number_update(){
        $view = $this->load->view('myaccount/partials/display-phone', [], true);
        $this->output_response_success($view);
    }

    private function findContact($contact_id) {
        $criteria = Criteria::create()
                    ->where(Criteria::expr()->eq("patientContId", $contact_id));
        $contacts = $this->getUser()->getDetail($this->doctrine->em)->getContacts();
        $contact = $contacts->matching($criteria)->get(0);
        return $contact;
    }

    private function callback_patient_contact_email_address_add(){

        $em = $this->doctrine->em;
        $email = new GptPatientContactEmail();
        $email->setEmail($this->input->post('email_address'));
        $contact = $this->findContact($this->input->post('contact_id'));

        if($contact){
            $email->setContact($contact);
            $email->preCreate();
            $em->persist($email);
            $em->flush();
            $view = $this->load->view('myaccount/partials/display-email', ['email' => $email], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_patient_contact_email_address_update(){

        
        
    }
    
}
