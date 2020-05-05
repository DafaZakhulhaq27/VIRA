<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_live extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('M_data_live');
    }
    function index()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_live'] = $this->M_data_live->get_live();
            $data['main_view'] 		= 'Data_live';
            $this->load->view('Index', $data);
        } else {
                redirect('Login');
        }
//                   echo  print_r($this->M_Dashboard->get_date_ps());
    }

}
