<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_Penutupan_ODP extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('M_data_penutupanodp');
    }
    function index()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_penutupan_odp'] = $this->M_data_penutupanodp->get_penutupan_odp();
            $data['main_view'] 		= 'Data_penutupanODP';
            $this->load->view('Index', $data);
        } else {
                redirect('Login');
        }
//                   echo  print_r($this->M_Dashboard->get_date_ps());
    }
    function hapus_penutupanODP($id)
    {
      if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('loker') == "admin"){
            if($this->M_data_penutupanodp->hapus_penutupanODP($id) == TRUE)
            {
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('notif', 'BERHASIL HAPUS REKAP');
                redirect('Data_Penutupan_ODP');
            }else{
                $this->session->set_flashdata('type', 'error');
                $this->session->set_flashdata('notif', 'GAGAL HAPUS REKAP');
                redirect('Data_Penutupan_ODP');
            }
        } else {
            redirect('Login');
        }
    }

}
