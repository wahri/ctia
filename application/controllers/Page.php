<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Page extends CI_Controller
{
    public function index()
    {
        redirect('home');
    }

    public function about()
    {
        $this->load->view('templates/main_header');
        $this->load->view('page/about');
        $this->load->view('templates/main_footer');
    }

    public function panitia()
    {
        $data['judul'] = "Panitia Pelaksana Seminar CTia";
        $this->load->view('templates/main_header', $data);
        $this->load->view('panitia/index');
        $this->load->view('templates/main_footer');
    }

    public function susunanAcara()
    {
        $data['judul'] = "Susunan Acara Seminar CTia";
        $this->load->view('templates/main_header', $data);
        $this->load->view('page/susunan-acara');
        $this->load->view('templates/main_footer');
    }

    public function lokasi()
    {
        $data['judul'] = "Lokasi Seminar CTia";
        $this->load->view('templates/main_header', $data);
        $this->load->view('page/lokasi');
        $this->load->view('templates/main_footer');
    }
}
