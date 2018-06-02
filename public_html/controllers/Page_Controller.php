<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page_Controller extends Public_Controller
{
    public function index()
    {
        $this->render('home');
    }

    public function aboutUs()
    {
        $this->render('about-us');
    }

    public function services()
    {
        $this->render('services');
    }

    public function patients()
    {
        $this->render('patients');
    }

    public function hospitals()
    {
        $this->render('hospitals');
    }

    public function contactUs()
    {
        $this->render('contact-us');
    }
}
