<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pemakalah_model');
        $this->load->helper('download');
        if ($this->session->userdata('status') != "login") {
            if ($this->session->userdata('role') != 1) {
                redirect('home');
            }
        }
    }
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
    }
    public function detail($id)
    {
        $data['title'] = "Detail Pemakalah";
        $data['pemakalah'] = $this->Pemakalah_model->detailPemakalah($id);
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_pemakalah', $data);
    }
    public function detailNonPemakalah($id)
    {
        $data['title'] = "Detail Non Pemakalah";
        $data['pemakalah'] = $this->Pemakalah_model->detailNonPemakalah($id);
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail_nonpemakalah', $data);
    }
    public function pemakalah()
    {
        $data['pemakalah'] = $this->Pemakalah_model->getAllPemakalah();
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pemakalah', $data);
    }
    public function nonPemakalah()
    {
        $data['pemakalah'] = $this->Pemakalah_model->getAllNonPemakalah();
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/nonpemakalah', $data);
    }
    // public function downloadPemakalah($file)
    // {
    //     force_download(base_url('uploads/bukti/') . $file, NULL);
    // }
}
