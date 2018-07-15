<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

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
        $serviceProvider = $serviceProviderRepository->findOneBy([
          'svcCompId'  =>  $id
        ]);
        //$patient->details = $patient->getDetail($em);

        $this->render('service-provider/view', [
        'serviceProvider' => $serviceProvider,
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
        $compnay = $em->find('GptCompany', $this->input->post('id'));
        if($compnay){
            $em->remove($compnay);
            $em->flush();
        }
        $this->output_response_success('');
    }

    private function callback_service_provider_update(){

        $company = null;
        $em = $this->doctrine->em;
        $company = $em->find('GptCompany', $this->input->post('service_provider_id'));

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
