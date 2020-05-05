<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kendala extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('M_data_kendala');
    }
    function index()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_tim'] = $this->M_data_kendala->get_kendala();
            $data['main_view'] 		= 'Data_kendala';
            $this->load->view('Index', $data);
        } else {
                redirect('Login');
        }
//                   echo  print_r($this->M_Dashboard->get_date_ps());
    }

}
