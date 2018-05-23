<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'../common/core/GPT_Controller.php';

class BO_Controller extends GPT_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->vars(array(
            'header' => 'common/header',
            'footer' => 'common/footer',
            'head' => 'common/head',
            'nav' => 'common/nav',
            'copyright' => 'common/copyright',
            'scripts' => 'common/scripts',
        ));
    }

    public function render($template, $data = [])
    {
        $this->load->vars(array(
        'currentPage' => $template,
        'currentPageData' => $data
      ));
        $this->load->view('common/base');
    }
}
