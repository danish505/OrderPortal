<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH. '../common/core/GPT_Controller.php';

class Public_Controller extends GPT_Controller
{
    public function __construct()
    {
        parent::__construct();

        // $maintenance_mode = $this->setting_model->get('maintenance_mode');
        // if(!$maintenance_mode) {
        // 	if($this->session->userdata('user_logged_in')) {
        //
        // 		$this->user = $user;
        // 	} else {
        // 		$this->isloggedin = FALSE;
        // 	}
        // } else {
        // 	redirect('maintenance');
        // }
    }
}
