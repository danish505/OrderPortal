<?php  

use Doctrine\Common\Collections\Criteria;

class Forgetpwd_Controller extends Public_Controller
{   
  private $repository;

    // public function __construct()
    // {
    //     // $this->load->library('database');
    // }

	public function index()
	{
		$this->load->helper('form');
		$this->render('forget');
	}	

	public function verify_user()
	{
      $repository = $this->doctrine->em->getRepository('GptUser');
      $user =  $this->repository->findOneBy([
                  'email' => $this->input->post('email'),
                  'role'     => GptUser::USER_ROLE_PATIENT
                ]);


      if($user)
      {
        echo "true";
      }
      else{
        echo "false";
      }

  }
}

?>