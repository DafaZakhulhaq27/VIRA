<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('M_Dashboard');
    }
    function index()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['tim'] = $this->M_Dashboard->get_tim();
            $data['get_date_ps'] = $this->M_Dashboard->get_date_ps();
            $data['get_all_hi'] = $this->M_Dashboard->get_all_hi();
            $data['get_mitra_kendala'] = $this->M_Dashboard->get_mitra_kendala();

            $data['main_view'] 		= 'Dashboard_PSB';
            $this->load->view('Index', $data);
        } else {
                redirect('Login');
        }
//                   echo  print_r($this->M_Dashboard->get_date_ps());

    }
    function  filter_tanggal()
    {
        if($this->session->userdata('logged_in') == TRUE){
          $data['tim'] = $this->M_Dashboard->get_tim();
          $data['get_date_ps'] = $this->M_Dashboard->get_date_ps();
          $data['get_all_hi'] = $this->M_Dashboard->get_all_hi_filter_tanggal();
            $data['main_view'] 		= 'Dashboard_PSB_filter';
            $this->load->view('Index', $data);
        } else {
            redirect('Login');
        }
    }
    public function get_profile_by_id()
    {
        $data_profil_by_id = $this->M_Dashboard->get_total();
        echo $data_profil_by_id ;
    }

}
