<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GPT_Controller extends CI_Controller
{
    private $isLoggedIn;
    private $user;

    public function __construct()
    {
        // Get Settings from DB
        parent::__construct();
        $this->load->vars(array(
          'base_url' => base_url(),
          'site_title' => $this->config->config['site_title'],
        ));

        $this->isLoggedIn = ($this->session->user && $this->session->user->id > 0);
        if ($this->isLoggedIn()) {
            $this->user = $this->session->user;
        }
    }

    public function isLoggedIn()
    {
        return $this->isLoggedIn;
    }

    public function getUser($return_entity = true) {
        if($return_entity){
            $userRepository = $this->doctrine->em->getRepository('GptUser');
            $user = $userRepository->findOneBy([
                'userId'  =>  $this->user->id
            ]);
            return $user;
            
        }
        // return session object instead of entity
        return $this->user;
    }

    public function getScriptTag($script_uri){
        return '<script type="text/javascript" async="" src="'.$this->config->config['base_url'].$script_uri.'"></script>';
    }
}
