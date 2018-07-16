<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

use Doctrine\Common\Collections\Criteria;

class ServiceProvider_Controller extends Authenticated_Controller
{
    public function index()
    {

        $em = $this->doctrine->em;
        $serviceProviderRepository = $em->getRepository('GptCompany');
        $serviceProviders = $serviceProviderRepository->findAll();
        $injectedScripts[] = $this->getScriptTag('/assets/js/service-provider.js');
        $this->load->library('form_validation');
        $this->render('service-provider/list', [
          'serviceProviders' => $serviceProviders,
          'injected_scripts' => implode('', $injectedScripts)
        ]);
    }

    public function view($id)
    {
        $em = $this->doctrine->em;
        $serviceProviderRepository = $em->getRepository('GptCompany');
        $serviceProvider = $this->getServiceProvider($id);
        $injectedScripts[] = $this->getScriptTag('/assets/js/service-provider.js');
        $this->load->library('form_validation');
        $this->render('service-provider/view', [
        'serviceProvider' => $serviceProvider,
        'injected_scripts' => implode('', $injectedScripts),
        'salutations' => $this->config->config['gpt_variable']['salutation'],
      ]);
    }

    private function callback_service_provider_add(){

      $em = $this->doctrine->em;

      $company = new GptCompany();
      $company->setCompanyName($this->input->post('company_name'));
      $company->setCompanyType($this->input->post('company_type'));
      $company->setCompanyUrl($this->input->post('company_url'));
      $company->preCreate();
      $em->persist($company);
      $em->flush();
      
      $view = $this->load->view('service-provider/partials/display-service-provider', ['serviceProvider' => $company], true);

      $this->output_response_success($view);
    }

    private function callback_service_provider_delete() {
        $em = $this->doctrine->em;
        $company = $this->getServiceProvider($this->input->post('id'));
        if($company){
            $em->remove($company);
            $em->flush();
        }
        $this->output_response_success('');
    }

    private function callback_service_provider_contact_delete() {
        $em = $this->doctrine->em;
        $contact = $this->getContact($this->input->post('id'));
        if($contact){
            $em->remove($contact);
            $em->flush();
        }
        $this->output_response_success('');
    }

    private function callback_service_provider_update(){

        $company = null;
        $em = $this->doctrine->em;
        $company = $this->getServiceProvider($this->input->post('service_provider_id'));

        if($company){
            $company->setCompanyName($this->input->post('company_name'));
            $company->setCompanyType($this->input->post('company_type'));
            $company->setCompanyUrl($this->input->post('company_url'));
            $em->persist($company);
            $em->flush();
            $view = $this->load->view('service-provider/partials/display-service-provider', ['serviceProvider' => $company], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_service_provider_contact_add() {
        $company = null;
        $em = $this->doctrine->em;
        $company = $this->getServiceProvider($this->input->post('service_provider_id'));

        if($company){
            $contact = new GptCompanyContact();
            $contact->setSalutation($this->input->post('salutation'));
            $contact->setFirstName($this->input->post('first_name'));
            $contact->setLastName($this->input->post('last_name'));
            $contact->setMiddleName($this->input->post('middle_name'));
            $contact->setJobTitle($this->input->post('job_title'));
            $contact->setJobFunction($this->input->post('job_function'));
            $contact->setJobRole($this->input->post('job_role'));
            $contact->setCompany($company);
            $contact->preCreate();
            $em->persist($contact);
            $em->flush();
            $view = $this->load->view('service-provider/contact/partials/display-contact', ['contact' => $contact], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_service_provider_contact_email_address_add() {
        $contact = null;
        $em = $this->doctrine->em;

        $contact = $this->getContact($this->input->post('contact_id'));

        if($contact){
            $email = new GptCompanyContactEmail();
            $email->setEmail($this->input->post('email_address'));
            $email->setContact($contact);
            $email->preCreate();
            $em->persist($email);
            $em->flush();
            $view = $this->load->view('service-provider/contact/partials/display-email', ['email' => $email], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_service_provider_contact_email_address_update() {
        $em = $this->doctrine->em;
        $email = $em->find('GptCompanyContactEmail', $this->input->post('email_id'));
        
        if($email){
            $email->setEmail($this->input->post('email_address'));
            $em->persist($email);
            $em->flush();
            $view = $this->load->view('service-provider/contact/partials/display-email', ['email' => $email], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_service_provider_contact_address_add() {
        $contact = null;
        $em = $this->doctrine->em;

        $contact = $this->getContact($this->input->post('contact_id'));

        if($contact){
            $address = new GptCompanyContactAddress();
            $address->setAddress([
                'streetAddr1' => $this->input->post('street_add_1'),
                'streetAddr2' => $this->input->post('street_add_2'),
                'streetAddr3' => $this->input->post('street_add_3'),
                'zipcode' => $this->input->post('zipcode'),
                'city' => $this->input->post('city'),
                'state' => $this->input->post('state'),
                'country' => $this->input->post('country')
            ]);
            $address->setContact($contact);
            $address->preCreate();
            $em->persist($address);
            $em->flush();
            $view = $this->load->view('service-provider/contact/partials/display-address', ['address' => $address], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_service_provider_contact_address_update() {
        $em = $this->doctrine->em;
        $address = $em->find('GptCompanyContactAddress', $this->input->post('address_id'));
        
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
            $view = $this->load->view('service-provider/contact/partials/display-address', ['address' => $address], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_service_provider_contact_phone_number_add() {
        $contact = null;
        $em = $this->doctrine->em;

        $contact = $this->getContact($this->input->post('contact_id'));

        if($contact){
            $phone_number = new GptCompanyContactPhone();
            $phone_number->setPhone([
                'ctryCd' => $this->input->post('ctry_cd'),
                'areaCd' => $this->input->post('area_cd'),
                'phoneNo' => $this->input->post('phone_no'),
                'extension' => $this->input->post('ext')
            ]);
            $phone_number->setContact($contact);
            $phone_number->preCreate();
            $em->persist($phone_number);
            $em->flush();
            $view = $this->load->view('service-provider/contact/partials/display-phone', ['phone_number' => $phone_number], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_service_provider_contact_phone_number_update() {
        $em = $this->doctrine->em;
        $phone_number = $em->find('GptCompanyContactPhone', $this->input->post('phone_id'));
        
        if($phone_number){
            $phone_number->setPhone([
                'ctryCd' => $this->input->post('ctry_cd'),
                'areaCd' => $this->input->post('area_cd'),
                'phoneNo' => $this->input->post('phone_no'),
                'extension' => $this->input->post('ext')
            ]);
            $em->persist($phone_number);
            $em->flush();
            $view = $this->load->view('service-provider/contact/partials/display-phone', ['phone_number' => $phone_number], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function getServiceProvider($id) {
        $company = null;
        $em = $this->doctrine->em;
        return $em->find('GptCompany', $id);
    }

    private function getService($company_id, $id) {
        $company = $this->getServiceProvider($company_id);
        if(!$company) return null;

        $criteria = Criteria::create()
                    ->where(Criteria::expr()->eq("serviceId", $id));
        $services = $company->getServices();
        return $services->matching($criteria)->get(0);
    }

    private function getContactByServiceProvider($company_id, $id) {
        $company = $this->getServiceProvider($company_id);
        if(!$company) return null;

        $criteria = Criteria::create()
                    ->where(Criteria::expr()->eq("contId", $id));
        $contacts = $company->getContacts();
        return $contacts->matching($criteria)->get(0);
    }

    private function getContact($id) {
        return $this->doctrine->em->find('GptCompanyContact', $id);
    }

    private function callback_service_provider_service_add(){

        $company = null;
        $em = $this->doctrine->em;
        $company = $this->getServiceProvider($this->input->post('service_provider_id'));

        if($company){
            $service = new GptCompanyService();
            $service->setServiceName($this->input->post('service_name'));
            $service->setCategory($this->input->post('service_category'));
            $service->setSubCategory($this->input->post('service_sub_category'));
            $service->setCompany($company);
            $service->preCreate();
            $em->persist($service);
            $em->flush();
            $view = $this->load->view('service-provider/service/partials/display-service', ['service' => $service], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_service_provider_service_update(){

        $company = null;
        $em = $this->doctrine->em;

        $service = $this->getService($this->input->post('service_provider_id'), $this->input->post('service_id'));
        if($service){
            $service->setServiceName($this->input->post('service_name'));
            $service->setCategory($this->input->post('service_category'));
            $service->setSubCategory($this->input->post('service_sub_category'));
            $em->persist($service);
            $em->flush();
            $view = $this->load->view('service-provider/service/partials/display-service', ['service' => $service], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    private function callback_service_provider_contact_update(){

        $company = null;
        $em = $this->doctrine->em;

        $contact = $this->getContactByServiceProvider($this->input->post('service_provider_id'), $this->input->post('contact_id'));
        if($contact){
            $contact->setSalutation($this->input->post('salutation'));
            $contact->setFirstName($this->input->post('first_name'));
            $contact->setMiddleName($this->input->post('middle_name'));
            $contact->setLastName($this->input->post('last_name'));
            $contact->setJobTitle($this->input->post('job_title'));
            $contact->setJobFunction($this->input->post('job_function'));
            $contact->setJobRole($this->input->post('job_role'));
            $em->persist($contact);
            $em->flush();
            $view = $this->load->view('service-provider/contact/partials/display-contact', ['contact' => $contact], true);
            $this->output_response_success($view);
        }else{
            $this->output_response_failure('Invalid arguments provided');
        }
    }

    public function ajax(){
      $this->{'callback_'.$this->input->post('action')}();
    }

    public function json($id){
      $object = null;
      $em = $this->doctrine->em;
      $error = false;

      $object = $em->find('GptCompany', $id);

      if(!$object) $error = true;
      
      if(!$error){
          $this->output_response_success($object->toJson());
      } else {
          $this->output_response_failure('Invalid argument provided');
      }
  }

  public function json_service($id){
    $object = null;
    $em = $this->doctrine->em;
    $error = false;

    $object = $em->find('GptCompanyService', $id);

    if(!$object) $error = true;
    
    if(!$error){
        $this->output_response_success($object->toJson());
    } else {
        $this->output_response_failure('Invalid argument provided');
    }
  }

  public function json_contact($id){
    $object = null;
    $em = $this->doctrine->em;
    $error = false;

    $object = $this->getContact($id);

    if(!$object) $error = true;
    
    if(!$error){
        $this->output_response_success($object->toJson());
    } else {
        $this->output_response_failure('Invalid argument provided');
    }
  }

  public function json_contact_address($id){
    $object = null;
    $em = $this->doctrine->em;
    $error = false;

    $object = $em->find('GptCompanyContactAddress', $id);

    if(!$object) $error = true;
    
    if(!$error){
        $this->output_response_success($object->toJson());
    } else {
        $this->output_response_failure('Invalid argument provided');
    }
  }
  
  public function json_contact_email($id){
    $object = null;
    $em = $this->doctrine->em;
    $error = false;

    $object = $em->find('GptCompanyContactEmail', $id);

    if(!$object) $error = true;
    
    if(!$error){
        $this->output_response_success($object->toJson());
    } else {
        $this->output_response_failure('Invalid argument provided');
    }
  }

  public function json_contact_phone($id){
    $object = null;
    $em = $this->doctrine->em;
    $error = false;

    $object = $em->find('GptCompanyContactPhone', $id);

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
}
