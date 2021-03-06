<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class Service_Controller extends Authenticated_Controller
{
    public function index()
    {
        $em = $this->doctrine->em;
        $serviceRepository = $em->getRepository('GptHospitalService');
        $services = $serviceRepository->findAll();
        $injectedScripts[] = $this->getScriptTag('/assets/js/service.js');
        $this->load->library('form_validation');
        $this->render('service/list', [
          'services' => $services,
          'injected_scripts' => implode('', $injectedScripts)
        ]);
    }

    private function callback_service_add(){

      $em = $this->doctrine->em;

      $service = new GptHospitalService();
      $service->setServiceName($this->input->post('service_name'));
      $service->setCategory($this->input->post('service_category'));
      $service->setSubCategory($this->input->post('service_sub_category'));
      $service->preCreate();
      $em->persist($service);
      $em->flush();
      
      $view = $this->load->view('service/partials/display-service', ['service' => $service], true);

      $this->output_response_success($view);
    }

    private function callback_service_update(){

        $service = null;
        $em = $this->doctrine->em;
        $service = $em->find('GptHospitalService', $this->input->post('service_id'));

        if($service){
            $service->setServiceName($this->input->post('service_name'));
            $service->setCategory($this->input->post('service_category'));
            $service->setSubCategory($this->input->post('service_sub_category'));
            $em->persist($service);
            $em->flush();
            $view = $this->load->view('service/partials/display-service', ['service' => $service], true);
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

      $object = $em->find('GptHospitalService', $id);

      if(!$object) $error = true;
      
      if(!$error){
          $this->output_response_success($object->toJson());
      } else {
          $this->output_response_failure('Invalid argument provided');
      }
  }

  private function callback_service_delete(){
    $em = $this->doctrine->em;
    $service_id = $this->input->post('service_id');

    $service = $em->find('GptHospitalService', $service_id);

    if($service){
        $serviceReferences = $em->getRepository('GptHospitalServiceXref')->findAll();
        $serviceReferencesCount = 0;
        foreach ($serviceReferences as $service) {
            if ($service->getService()->getId() == $service_id){
                        ++$serviceReferencesCount;
                    }
        }
        if($serviceReferencesCount == 0){
            $em->remove($service);
            $em->flush();
            $this->output_response_success('');
        }else{
            $this->output_response_failure('Service has other associations.');
        }
    }else{
        $this->output_response_failure('Invalid service ID');
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
