<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends BO_Controller
{
    private $repository;

    public function __construct()
    {
        parent::__construct();
        $this->repository = $this->doctrine->em->getRepository('Company');
    }

    public function index()
    {
        foreach ($this->repository->findAll() as $data) {
            echo $data->getId()."<br />";
            echo $data->getName()."<br />";
            echo $data->getOwnerName()."<br /><br />";
        }
        die();
        $this->render('index');
    }

    public function dologin()
    {
        $this->load->view('login');
    }
}
