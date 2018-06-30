<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class Hospital_Controller extends Authenticated_Controller
{
  /*
    public function __construct()
    {
        parent::__construct();
        $this->load->vars([
          'statusClassMap' => [
            GptUser::USER_STATUS_ACTIVE                 =>  'success',
            GptUser::USER_STATUS_INACTIVE               =>  'danger',
            GptUser::USER_STATUS_AWAITING_VERIFICATION  =>  'warning',
          ],
          'statusMap' => [
            GptUser::USER_STATUS_ACTIVE                 =>  'Active',
            GptUser::USER_STATUS_INACTIVE               =>  'Inactive',
            GptUser::USER_STATUS_AWAITING_VERIFICATION  =>  'Unverified',
          ],
          'genderMap' =>  [
            'M' =>  'Male',
            'F' =>  'Female'
          ]
        ]);
    }
    */
    public function index()
    {
        /*$em = $this->doctrine->em;
        $userRepository = $em->getRepository('GptUser');
        $patients = $userRepository->findBy([
          'role' => GptUser::USER_ROLE_PATIENT
        ]);
        foreach ($patients as &$patient) {
            $patient->details = $patient->getDetail($em);
        }*/
        $this->render('hospital/list', [
          'hospitals' => [],
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
