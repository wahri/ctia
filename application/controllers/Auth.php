<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        if ($this->session->userdata('username')) {
            redirect('admin');
        }
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Login";
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin', ['username' => $username])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                //fix
                $data = [
                    'username' => $user['username'],
                    'role' => $user['role'],
                    'status' => "login"
                ];
                $this->session->set_userdata($data);
                if ($user['role'] == 1) {
                    redirect('admin');
                } else {
                    echo "Fitur ini belum tersedia";
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password salah</div>');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email tidak ditemukan</div>');
            redirect('home');
        }
    }

    // public function registration()
    // {
    //     $this->form_validation->set_rules('username', 'Username', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
    //         'is_unique' => 'This email has already registered!'
    //     ]);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[4]|matches[password2]', [
    //         'matches' => 'Password dont match!',
    //         'min_length' => 'Password too short!'
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
    //     if ($this->form_validation->run() == FALSE) {
    //         $data['title'] = "Registration";
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/registration');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $data = [
    //             'username' => $this->input->post('username', true),
    //             'email' => $this->input->post('email', true),
    //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'role' => 2
    //         ];
    //         $this->db->insert('admin', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil mendaftar!</div>');
    //         redirect('auth');
    //     }
    // }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('status');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah logout</div>');
        redirect('home');
    }
}
