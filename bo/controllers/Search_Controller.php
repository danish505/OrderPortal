<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH.'controllers/Authenticated_Controller.php';

class Search_Controller extends Authenticated_Controller
{
    public function index()
    {
        $em = $this->doctrine->em;

        $query = $em->createQuery('SELECT k.keyword, count(1) as total FROM GptSearchKeyword k GROUP BY k.keyword');
        $result = $query->getResult();

        $this->render('search/list', [
          'searches' => $result,
        ]);
    }
}
