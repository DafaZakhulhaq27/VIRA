<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    function index()
    {
            $this->load->view('Login');
    }
    public function do_login()
    {
        if($this->session->userdata('logged_in') == TRUE){
            redirect('Dashboard');
        } else {
            if($this->M_login->user_check() == TRUE){
                $this->session->set_flashdata('notif', 'Selamat Datang');
                $this->session->set_flashdata('type', 'success');
                redirect('Dashboard');
            } else {
                $this->session->set_flashdata('notif', 'Usernamae atau password salah!');
                $this->session->set_flashdata('type', 'error');
                redirect('Login');
            }
        }
    }
    public function logout(){
        if($this->session->userdata('logged_in') == TRUE){
            $this->session->sess_destroy();
            redirect('Login');
        }
    }

}
