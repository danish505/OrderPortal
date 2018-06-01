<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH. '../common/core/GPT_Controller.php';

class Public_Controller extends GPT_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->vars(array(
          'header' => 'common/header',
          'footer' => 'common/footer',
          'all_services' => 'common/main-services-all',
          'selected_services' => 'common/main-services',
          'map' => 'common/map',
          'process' => 'common/process',
          'GOOGLE_CAPTCHA_SITE_KEY' => $this->config->config['GOOGLE_CAPTCHA_SITE_KEY']
      ));
    }

    public function render($template, $data = [])
    {
        $data['isUserLoggedIn'] = $this->isLoggedIn();
        if ($data['isUserLoggedIn']) {
            $data['userData'] = $this->getUserData();
        }
        $this->load->vars(array(
      'currentPage' => $template,
      'currentPageData' => $data
    ));
        $this->load->view('common/base');
    }
}
