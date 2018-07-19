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

    private function callback_hospital_department_attach(){
        $em = $this->doctrine->em;
        $hospital = $em->find('GptHospital', $this->input->post('hospital_id'));
        $department = $em->find('GptHospitalDept', $this->input->post('department_id'));
        $hospital->addDepartment($department);
        $em->persist($hospital);
        $em->flush();
        $view = $this->load->view('hospital/partials/display-department', ['department' => $department, 'hospital' => $hospital], true);
        $this->output_response_success($view);
    }

    private function callback_hospital_department_detach(){
        $em = $this->doctrine->em;
        $hospital = $em->find('GptHospital', $this->input->post('hospital_id'));
        $department = $em->find('GptHospitalDept', $this->input->post('hospital_dept_id'));
        $hospital->getDepartments()->removeElement($department);
        $em->persist($hospital);
        $em->flush();
        $this->output_response_success('');
    }

    private function callback_hospital_contact_attach(){
        $em = $this->doctrine->em;
        $hospital = $em->find('GptHospital', $this->input->post('hospital_id'));
        $department = $em->find('GptHospitalDept', $this->input->post('department_id'));
        $contact = $em->find('GptHospitalContact', $this->input->post('contact_id'));

        $xref = new GptHospitalContXref();
        $xref->setDepartment($department);
        $xref->setHospital($hospital);
        $xref->setContact($contact);
        $xref->preCreate();
        $em->persist($xref);
        $em->flush();
        $view = $this->load->view('hospital/partials/display-contact', ['contact' => $xref], true);
        $this->output_response_success($view);
    }

    private function callback_hospital_contact_detach(){
        $em = $this->doctrine->em;
        $contact = $em->find('GptHospitalContXref', $this->input->post('contact_id'));
        
        if($contact){
            $em->remove($contact);
            $em->flush();
        }
        $this->output_response_success('');
    }

    private function callback_hospital_service_attach(){
        $em = $this->doctrine->em;
        $hospital = $em->find('GptHospital', $this->input->post('hospital_id'));
        $department = $em->find('GptHospitalDept', $this->input->post('department_id'));
        $service = $em->find('GptHospitalService', $this->input->post('service_id'));

        $xref = new GptHospitalServiceXref();
        $xref->setDepartment($department);
        $xref->setHospital($hospital);
        $xref->setService($service);
        $xref->preCreate();
        $em->persist($xref);
        $em->flush();
        $view = $this->load->view('hospital/partials/display-service', ['service' => $xref], true);
        $this->output_response_success($view);
    }

    private function callback_hospital_service_detach(){
        $em = $this->doctrine->em;
        $service = $em->find('GptHospitalServiceXref', $this->input->post('service_id'));
        
        if($service){
            $em->remove($service);
            $em->flush();
        }
        $this->output_response_success('');
    }

    private function callback_hospital_affiliate_attach(){
        $em = $this->doctrine->em;
        $hospital = $em->find('GptHospital', $this->input->post('hospital_id'));
        $affiliate = $em->find('GptHospital', $this->input->post('affiliate_id'));
        $hospital->addAffiliate($affiliate);
        $em->persist($hospital);
        $em->flush();
        $view = $this->load->view('hospital/partials/display-affiliate', ['affiliate' => $affiliate], true);
        $this->output_response_success($view);
    }

    private function callback_hospital_affiliate_detach(){
        $em = $this->doctrine->em;
        $hospital = $em->find('GptHospital', $this->input->post('hospital_id'));
        $affiliate = $em->find('GptHospital', $this->input->post('affiliate_hospital_id'));
        $hospital->getAffiliates()->removeElement($affiliate);
        $em->persist($hospital);
        $em->flush();
        $this->output_response_success('');
    }

      public function ajax(){
        $this->{'callback_'.$this->input->post('action')}();
      }
  
      private function hospitalJson($id){
        $object = null;
        $em = $this->doctrine->em;
        $error = false;
        $object = $em->find('GptHospital', $id);

        if(!$object) $error = true;
        
        if(!$error){
            $this->output_response_success($object->toJson());
        } else {
            $this->output_response_failure('Invalid argument provided');
        }
      }

      private function serviceListJson(){
        $em = $this->doctrine->em;
        $serviceRepository = $em->getRepository('GptHospitalService');
        $services = $serviceRepository->findAll();
        $collection = [];

        foreach($services as $service){
            $collection[] = ['id'=>$service->getId(), 'label'=>$service->getServiceName()];
        }
        
        $this->output_response_success($collection);
      }

      private function departmentListJson(){
        $em = $this->doctrine->em;
        $departmentRepository = $em->getRepository('GptHospitalDept');
        $departments = $departmentRepository->findAll();
        $collection = [];

        foreach($departments as $department){
            $collection[] = ['id'=>$department->getId(), 'label'=>$department->getDepartmentName()];
        }
        
        $this->output_response_success($collection);
      }

      private function hospitalListJson($id){
        $em = $this->doctrine->em;
        $hospitalRepository = $em->getRepository('GptHospital');
        $hospitals = $hospitalRepository->findAll();
        $collection = [];

        foreach($hospitals as $hospital){
            $hospital_id = $hospital->getId();
            if($hospital_id == $id) continue;
            $collection[] = ['id'=>$hospital_id, 'label'=>$hospital->getHospitalName()];
        }
        
        $this->output_response_success($collection);
      }

      private function contactListJson(){
        $em = $this->doctrine->em;
        $contactRepository = $em->getRepository('GptHospitalContact');
        $contacts = $contactRepository->findAll();
        $collection = [];

        foreach($contacts as $contact){
            $contact_id = $contact->getId();
            $collection[] = ['id'=>$contact_id, 'label'=>$contact->getDisplayName()];
        }
        
        $this->output_response_success($collection);
      }

      public function json($type, $id){

        switch($type){
            case 'hospital':
                $this->hospitalJson($id);
            break;
            case 'services':
                $this->serviceListJson();
            break;
            case 'affiliates':
                $this->hospitalListJson($id);
            break;
            case 'departments':
                $this->departmentListJson();
            break;
            case 'contacts':
                $this->contactListJson();
            break;
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
