<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Unduh extends CI_Controller
{
function __construct(){
parent::__construct();
$this->load->helper(array('url','download'));				
}
    public function index()
    {
        $data['judul'] = "File Unduh";
        $this->load->view('templates/main_header', $data);
        $this->load->view('unduh/index');
        $this->load->view('templates/main_footer');
    }
    
    public function template(){				
		force_download('assets/files/ctia.doc',NULL);
		redirect('unduh');
	}
}
