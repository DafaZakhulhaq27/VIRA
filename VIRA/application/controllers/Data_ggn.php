<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_ggn extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('M_Data_ggn');
    }
    function index()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_ggn'] = $this->M_Data_ggn->get_ggn();
            $data['main_view'] 		= 'Data_ggn';
            $this->load->view('Index', $data);
        } else {
            redirect('Login');
        }
    }
    function  filter_tanggal()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_ggn'] = $this->M_Data_ggn->get_filter_tanggal();
            $data['main_view'] 		= 'Data_GGN';
            $this->load->view('Index', $data);
        } else {
            redirect('Login');
        }
    }

}
