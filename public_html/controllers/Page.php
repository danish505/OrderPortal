<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends Public_Controller
{
    public function index()
    {
        $this->load->view('home');
    }

    public function aboutUs()
    {
        $this->load->view('about-us');
    }

    public function services()
    {
        $this->load->view('services');
    }

    public function patients()
    {
        $this->load->view('patients');
    }

    public function hospitals()
    {
        $this->load->view('hospitals');
    }

    public function contactUs()
    {
        $this->load->view('contact-us');
    }
}
