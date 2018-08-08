<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class Patient_Controller extends Authenticated_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
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
          ],
          'salutations' => $this->config->config['gpt_variable']['salutation'],
          'profile_update_successful' => false,
        ]);
    }
    public function index()
    {
        $em = $this->doctrine->em;
        $userRepository = $em->getRepository('GptUser');
        $patients = $userRepository->findBy([
          'role' => GptUser::USER_ROLE_PATIENT
        ]);
        foreach ($patients as &$patient) {
            $patient->details = $patient->getDetail($em);
        }
        $this->render('patient/list', [
          'patients' => $patients,
        ]);
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

    public function view($id)
    {
        $em = $this->doctrine->em;
        $userRepository = $em->getRepository('GptUser');
        $patient = $userRepository->findOneBy([
          'role'    =>  GptUser::USER_ROLE_PATIENT,
          'userId'  =>  $id
        ]);
        
        $data = [
          'patient' => $patient,
        ];
        
        $patient->details = $patient->getDetail($em);
        if ($this->form_validation->run('patient_profile')) {
          if ($patient->getEmail() !== $this->input->post('email_address')) {
              $patient->setEmail($this->input->post('email_address'));
              $this->doctrine->em->persist($patient);
              $this->doctrine->em->flush();
          }

          $this->updatePatient($patient->details);
          $data['profile_update_successful'] = true;
        }

        $this->render('patient/view', $data);
    }
}
