<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Soon extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/main_header');
        $this->load->view('soon');
        $this->load->view('templates/main_footer');
    }
}
