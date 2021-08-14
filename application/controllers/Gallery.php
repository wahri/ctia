<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'download'));
    }
    public function index()
    {
        $data['judul'] = "Gallery";
        $this->load->view('templates/main_header', $data);
        $this->load->view('page/gallery');
        $this->load->view('templates/main_footer');
    }

    public function template()
    {
        force_download('assets/files/ctia.doc', NULL);
        redirect('unduh');
    }
}
