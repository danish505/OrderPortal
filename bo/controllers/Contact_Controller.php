<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class Service_Controller extends Authenticated_Controller
{
    public function index()
    {
        $em = $this->doctrine->em;
        $contactRepository = $em->getRepository('GptHospitalContact');
        $contacts = $contactRepository->findAll();
        $injectedScripts[] = $this->getScriptTag('/assets/js/contact.js');
        $this->load->library('form_validation');
        $this->render('contact/list', [
          'contacts' => $contacts,
          'injected_scripts' => implode('', $injectedScripts)
        ]);
    }

    private function callback_contact_add(){

        $em = $this->doctrine->em;

        $contact = new GptHospitalContact();
        $contact->setSalutation($this->input->post('salutation'));
        $contact->setFirstName($this->input->post('first_name'));
        $contact->setLastName($this->input->post('last_name'));
        $contact->setMiddleName($this->input->post('middle_name'));
        $contact->setJobTitle($this->input->post('job_title'));
        $contact->setJobFunction($this->input->post('job_function'));
        $contact->setJobRole($this->input->post('job_role'));
        $contact->preCreate();
        $em->persist($contact);
        $em->flush();
        
        $view = $this->load->view('contact/partials/display-contact', ['contact' => $contact], true);

        $this->output_response_success($view);
    }

    private function callback_contact_update(){
        $em = $this->doctrine->em;

        $contact = $this->findContact($this->input->post('contact_id'));

        if($contact){
            $contact->setSalutation($this->input->post('salutation'));
            $contact->setFirstName($this->input->post('first_name'));
            $contact->setLastName($this->input->post('last_name'));
            $contact->setMiddleName($this->input->post('middle_name'));
            $contact->setJobTitle($this->input->post('job_title'));
            $contact->setJobFunction($this->input->post('job_function'));
            $contact->setJobRole($this->input->post('job_role'));
            $em->persist($contact);
            $em->flush();
            $view = $this->load->view('contact/partials/display-contact', ['contact' => $contact], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    public function ajax(){
      $this->{'callback_'.$this->input->post('action')}();
    }

    public function json($type, $id){
        $object = null;
        $em = $this->doctrine->em;
        $error = false;

        switch($type){
            case 'email':
                $object = $em->find('GptHospitalContactEmail', $id);
            break;

            case 'address':
                $object = $em->find('GptHospitalContactAddress', $id);
            break;

            case 'contact':
                $object = $em->find('GptHospitalContact', $id);
            break;

            case 'phone':
                $object = $em->find('GptHospitalContactPhone', $id);
            break;
        }

        if(!$object) $error = true;
        
        if(!$error){
            $this->output_response_success($object->toJson());
        } else {
            $this->output_response_failure('Invalid argument provided');
        }
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

  private function callback_contact_address_add(){
    $em = $this->doctrine->em;

    $address = new GptHospitalContactAddress();
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
        $view = $this->load->view('contact/partials/display-address', ['address' => $address], true);
        $this->output_response_success($view);
    }else{
        $this->output_response_failure('Invalid arguments provided');
    }
}

private function callback_contact_address_update(){

    $em = $this->doctrine->em;
    $contact = $this->findContact($this->input->post('contact_id'));

    if($contact){
        $criteria = Criteria::create()
                ->where(Criteria::expr()->eq("addressId", $this->input->post('address_id')));
        $addresses = $contact->getAddresses();
        $address = $addresses->matching($criteria)->get(0);
        if($address){
            $address->setAddress([
                'streetAddr1' => $this->input->post('street_add_1'),
                'streetAddr2' => $this->input->post('street_add_2'),
                'streetAddr3' => $this->input->post('street_add_3'),
                'zipcode' => $this->input->post('zipcode'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country')
            ]);
            $em->persist($address);
            $em->flush();
            $view = $this->load->view('contact/partials/display-address', ['address' => $address], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }
}

private function callback_contact_phone_number_add(){

    $em = $this->doctrine->em;
    $phone_number = new GptHospitalContactPhone();
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
        $view = $this->load->view('contact/partials/display-phone', ['phone_number' => $phone_number], true);
        $this->output_response_success($view);
    }else{
        $this->output_response_failure('Invalid arguments provided');
    }
}

private function callback_contact_phone_number_update(){
    $em = $this->doctrine->em;
    $contact = $this->findContact($this->input->post('contact_id'));

    if($contact){
        $criteria = Criteria::create()
                ->where(Criteria::expr()->eq("phoneId", $this->input->post('phone_id')));
        $phone_numbers = $contact->getPhoneNumbers();
        $phone_number = $phone_numbers->matching($criteria)->get(0);
        if($phone_number){
            $phone_number->setPhone([
                'ctryCd' => $this->input->post('ctry_cd'),
                'areaCd' => $this->input->post('area_cd'),
                'phoneNo' => $this->input->post('phone_no'),
                'extension' => $this->input->post('ext')
            ]);
            $em->persist($phone_number);
            $em->flush();
            $view = $this->load->view('contact/partials/display-phone', ['phone_number' => $phone_number], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }
}

private function findContact($contact_id) {
    return $this->doctrine->em->find('GptHospitalContact', $contact_id);
}

private function callback_contact_email_address_add(){

    $em = $this->doctrine->em;
    $email = new GptHospitalContactEmail();
    $email->setEmail($this->input->post('email_address'));
    $contact = $this->findContact($this->input->post('contact_id'));

    if($contact){
        $email->setContact($contact);
        $email->preCreate();
        $em->persist($email);
        $em->flush();
        $view = $this->load->view('contact/partials/display-email', ['email' => $email], true);
        $this->output_response_success($view);
    }else{
        $this->output_response_failure('Invalid arguments provided');
    }
}

private function callback_contact_email_address_update(){

    $em = $this->doctrine->em;
    $contact = $this->findContact($this->input->post('contact_id'));

    if($contact){
        $criteria = Criteria::create()
                ->where(Criteria::expr()->eq("emailId", $this->input->post('email_id')));
        $emails = $contact->getEmails();
        $email = $emails->matching($criteria)->get(0);
        if($email){
            $email->setEmail($this->input->post('email_address'));
            $em->persist($email);
            $em->flush();
            $view = $this->load->view('contact/partials/display-email', ['email' => $email], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }else{
        $this->output_response_failure('Invalid arguments provided');
    }
}

private function callback_contact_address_delete(){
    $em = $this->doctrine->em;
    $address = $em->find('GptHospitalContactAddress', $this->input->post('address_id'));
    if($address){
        $em->remove($address);
        $em->flush();
    }
    $this->output_response_success('');
}

private function callback_contact_email_delete(){
    $em = $this->doctrine->em;
    $email = $em->find('GptHospitalContactEmail', $this->input->post('email_id'));
    if($email){
        $em->remove($email);
        $em->flush();
    }
    $this->output_response_success('');
}

private function callback_contact_delete(){
    $em = $this->doctrine->em;
    $contact = $em->find('GptHospitalContact', $this->input->post('contact_id'));
    if($contact){
        $em->remove($contact);
        $em->flush();
    }
    $this->output_response_success('');
}

private function callback_contact_phone_delete(){
    $em = $this->doctrine->em;
    $phone = $em->find('GptHospitalContactPhone', $this->input->post('phone_id'));
    if($phone){
        $em->remove($phone);
        $em->flush();
    }
    $this->output_response_success('');
}

}
