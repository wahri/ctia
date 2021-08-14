<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $data['judul'] = "Seminar Nasional CTia";
        $this->load->view('templates/main_header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/main_footer');
    }
}
