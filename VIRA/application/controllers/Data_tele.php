<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_tele extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('M_data_tele');
    }
    function index()
    {

    }
    function  data_psb()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_data_psb'] = $this->M_data_tele->get_tele_psb();
            $data['main_view'] 		= 'Data_PSB';
            $this->load->view('Index', $data);
        } else {
            redirect('Login');
        }
    }
    function  data_psb_filter()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_data_psb'] = $this->M_data_tele->get_filter_tanggal_baru();
            $data['main_view'] 		= 'Data_PSB';
            $this->load->view('Index', $data);
        } else {
            redirect('Login');
        }
    }
    function  data_psb_all()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_data_psb'] = $this->M_data_tele->get_tele_psb_all();
            $data['main_view'] 		= 'data_psb_all';
            $this->load->view('Index', $data);
        } else {
            redirect('Login');
        }
    }
    function  data_psb_detail()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_data_psb'] = $this->M_data_tele->get_tele_psb_detail();
            $data['main_view'] 		= 'Data_PSB';
            $this->load->view('Index', $data);
        } else {
            redirect('Login');
        }
    }
    function  filter_tanggal()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_data_psb'] = $this->M_data_tele->get_filter_tanggal();
            $data['get_teknisi'] = $this->M_data_tele->get_teknisi();
            $data['main_view'] 		= 'Data_PSB';
            $this->load->view('Index', $data);
        } else {
            redirect('Login');
        }
    }
    function  filter_tanggal_detail()
    {
        if($this->session->userdata('logged_in') == TRUE){
            $data['get_data_psb'] = $this->M_data_tele->get_filter_tanggal_detail();
            $data['main_view'] 		= 'Data_PSB';
            $this->load->view('Index', $data);
        } else {
            redirect('Login');
        }
    }
    public function get_rekap_by_id($id)
    {
      if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('loker') == "admin"){
        $data_rekap_by_id = $this->M_data_tele->get_rekap_by_id($id);
        echo json_encode($data_rekap_by_id);
      } else {
          redirect('Login');
      }
    }
    function ubah_rekap()
    {
      if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('loker') == "admin"){
            if($this->M_data_tele->ubah_rekap() == TRUE)
            {
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('notif', 'BERHASIL MENGUBAH REKAP');
                redirect('Data_tele/data_psb');
            }else{
                $this->session->set_flashdata('type', 'error');
                $this->session->set_flashdata('notif', 'GAGAL MENGUBAH REKAP');
                redirect('Data_tele/data_psb');
            }
        } else {
            redirect('Login');
        }
    }
    function hapus_rekap($id)
    {
      if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('loker') == "admin"){
            if($this->M_data_tele->hapus_rekap($id) == TRUE)
            {
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('notif', 'BERHASIL HAPUS REKAP');
                redirect('Data_tele/data_psb');
            }else{
                $this->session->set_flashdata('type', 'error');
                $this->session->set_flashdata('notif', 'GAGAL HAPUS REKAP');
                redirect('Data_tele/data_psb');
            }
        } else {
            redirect('Login');
        }
    }
    function  not_found()
    {
        $this->load->view('404');
    }
}
