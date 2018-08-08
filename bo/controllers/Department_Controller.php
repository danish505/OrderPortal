<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class Department_Controller extends Authenticated_Controller
{
    public function index()
    {
        $em = $this->doctrine->em;
        $departmentRepository = $em->getRepository('GptHospitalDept');
        $departments = $departmentRepository->findAll();
        $injectedScripts[] = $this->getScriptTag('/assets/js/department.js');
        $this->load->library('form_validation');
        $this->render('department/list', [
          'departments' => $departments,
          'injected_scripts' => implode('', $injectedScripts)
        ]);
    }

    private function callback_department_add(){

      $em = $this->doctrine->em;

      $department = new GptHospitalDept();
      $department->setdepartmentName($this->input->post('department_name'));
      $department->preCreate();
      $em->persist($department);
      $em->flush();
      
      $view = $this->load->view('department/partials/display-department', ['department' => $department], true);

      $this->output_response_success($view);
    }

    private function callback_department_update(){

        $department = null;
        $em = $this->doctrine->em;
        $department = $em->find('GptHospitalDept', $this->input->post('department_id'));

        if($department){
            $department->setDepartmentName($this->input->post('department_name'));
            $em->persist($department);
            $em->flush();
            $view = $this->load->view('department/partials/display-department', ['department' => $department], true);
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

      $object = $em->find('GptHospitalDept', $id);

      if(!$object) $error = true;
      
      if(!$error){
          $this->output_response_success($object->toJson());
      } else {
          $this->output_response_failure('Invalid argument provided');
      }
  }

  private function callback_department_delete(){
    $em = $this->doctrine->em;
    $department = $em->find('GptHospitalDept', $this->input->post('department_id'));
    if($department){
        $references = $department->getHospitals();
        if(count($references) == 0){
            $em->remove($department);
            $em->flush();
            $this->output_response_success('');
        }else{
            $this->output_response_failure('Deparment has '.count($references).' association(s) with hospitals.');
        }
    }else{
        $this->output_response_failure('Invalid department ID');
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
