<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class Hospital_Controller extends Authenticated_Controller
{
    public function index()
    {
        $em = $this->doctrine->em;
        $hospitalRepository = $em->getRepository('GptHospital');
        $hospitals = $hospitalRepository->findAll();
        $injectedScripts[] = $this->getScriptTag('/assets/js/hospital.js');
        $this->load->library('form_validation');
        $this->render('hospital/list', [
          'hospitals' => $hospitals,
          'injected_scripts' => implode('', $injectedScripts)
        ]);
    }

    private function callback_hospital_add(){

        $em = $this->doctrine->em;
  
        $hospital = new GptHospital();
        $hospital->setHospitalName($this->input->post('hospital_name'));
        $hospital->setHospitalType($this->input->post('hospital_type'));
        $hospital->setHospitalUrl($this->input->post('hospital_url'));
        $hospital->preCreate();
        $em->persist($hospital);
        $em->flush();
        
        $view = $this->load->view('hospital/partials/display-hospital', ['hospital' => $hospital], true);
  
        $this->output_response_success($view);
      }

      private function callback_hospital_delete() {
        $em = $this->doctrine->em;
        $hospital = $em->find('GptHospital', $this->input->post('hospital_id'));
        
        if($hospital){
            $em->remove($hospital);
            $em->flush();
        }
        $this->output_response_success('');
    }

    private function callback_hospital_update(){

        $hospital = null;
        $em = $this->doctrine->em;
        $hospital = $em->find('GptHospital', $this->input->post('hospital_id'));

        if($hospital){
            $hospital->setHospitalName($this->input->post('hospital_name'));
            $hospital->setHospitalType($this->input->post('hospital_type'));
            $hospital->setHospitalUrl($this->input->post('hospital_url'));
            $em->persist($hospital);
            $em->flush();
            $view = $this->load->view('hospital/partials/display-hospital', ['hospital' => $hospital], true);
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
            case 'hospital':
                $object = $em->find('GptHospital', $id);
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
}
