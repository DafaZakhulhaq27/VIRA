<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_kendala_psb extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('M_data_kendala_psb');
    }
    function index()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_kendala'] = $this->M_data_kendala_psb->get_kendala_psb();
            $data['main_view'] 		= 'Data_kendala_psb';
            $this->load->view('Index', $data);
        } else {
                redirect('Login');
        }
//                   echo  print_r($this->M_Dashboard->get_date_ps());
    }

}
