<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class ServiceProvider_Controller extends Authenticated_Controller
{
    public function index()
    {

        $em = $this->doctrine->em;
        $serviceProviderRepository = $em->getRepository('GptCompany');
        $serviceProviders = $serviceRepository->findAll();
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
        $userRepository = $em->getRepository('GptUser');
        $patient = $userRepository->findOneBy([
          'role'    =>  GptUser::USER_ROLE_PATIENT,
          'userId'  =>  $id
        ]);
        $patient->details = $patient->getDetail($em);

        $this->render('patient/view', [
        'patient' => $patient,
      ]);
    }
}
