<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_teknisi extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('M_data_teknisi');
    }
    function index()
    {
        if($this->session->userdata('logged_in') == TRUE){

            $data['get_tim'] = $this->M_data_teknisi->get_tim();
            $data['main_view'] 		= 'Data_teknisi';
            $this->load->view('Index', $data);
        } else {
                redirect('Login');
        }
//                   echo  print_r($this->M_Dashboard->get_date_ps());
    }
    function absen_kediri()
    {
        if($this->session->userdata('logged_in') == TRUE){

            $data['get_tim'] = $this->M_data_teknisi->get_tim($this->uri->segment(3));
            $data['get_teknisi'] = $this->M_data_teknisi->get_teknisi_kediri($this->uri->segment(3));
            $data['main_view'] 		= 'Absen_kediri';
            $this->load->view('Index', $data);
        } else {
                redirect('Login');
        }
//                   echo  print_r($this->M_Dashboard->get_date_ps());
    }

    public function get_teknisi_by_id($id)
    {
      if($this->session->userdata('logged_in') == TRUE){
        $data_teknisi_by_id = $this->M_data_teknisi->get_teknisi_by_id($id);
        echo json_encode($data_teknisi_by_id);
      } else {
              redirect('Login');
      }
    }
    function tambah_rekap()
    {
      if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('loker') == "admin"){
            if($this->M_data_teknisi->tambah_rekap() == TRUE)
            {
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('notif', 'BERHASIL TAMBAH TEKNISI');
                redirect('Data_teknisi');
            }else{
                $this->session->set_flashdata('type', 'error');
                $this->session->set_flashdata('notif', 'GAGAL TAMBAH TEKNISI');
                redirect('Data_teknisi');
            }
        } else {
            redirect('Login');
        }
    }
    function hapus_teknisi($id)
    {
      if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('loker') == "admin"){
            if($this->M_data_teknisi->hapus_teknisi($id) == TRUE)
            {
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('notif', 'BERHASIL HAPUS TEKNISI');
                redirect('Data_teknisi');
            }else{
                $this->session->set_flashdata('type', 'error');
                $this->session->set_flashdata('notif', 'GAGAL HAPUS REKAP');
                redirect('Data_teknisi');
            }
        } else {
            redirect('Login');
        }
    }
    function ubah_teknisi()
    {
      if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('loker') == "admin"){
            if($this->M_data_teknisi->ubah_teknisi() == TRUE)
            {
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('notif', 'BERHASIL MENGUBAH TEKNISI');
                redirect('Data_teknisi/absen_kediri/'.$this->uri->segment(3).'');
            }else{
                $this->session->set_flashdata('type', 'error');
                $this->session->set_flashdata('notif', 'GAGAL MENGUBAH TEKNISI');
                redirect('Data_teknisi/absen_kediri/'.$this->uri->segment(3).'');
            }
        } else {
            redirect('Login');
        }
    }
    function ubah_absen_masuk()
    {
      if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('loker') == "admin"){
            if($this->M_data_teknisi->ubah_absen_masuk() == TRUE)
            {
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('notif', 'BERHASIL MENGUBAH ABSEN');
                redirect('Data_teknisi/absen_kediri/'.$this->uri->segment(3).'');
            }else{
                $this->session->set_flashdata('type', 'error');
                $this->session->set_flashdata('notif', 'GAGAL MENGUBAH ABSEN');
                redirect('Data_teknisi/absen_kediri/'.$this->uri->segment(3).'');
            }
        } else {
            redirect('Login');
        }
    }
    function ubah_absen_libur()
    {
      if($this->session->userdata('logged_in') == TRUE && $this->session->userdata('loker') == "admin"){
            if($this->M_data_teknisi->ubah_absen_libur() == TRUE)
            {
                $this->session->set_flashdata('type', 'success');
                $this->session->set_flashdata('notif', 'BERHASIL MENGUBAH ABSEN');
                redirect('Data_teknisi/absen_kediri/'.$this->uri->segment(3).'');
            }else{
                $this->session->set_flashdata('type', 'error');
                $this->session->set_flashdata('notif', 'GAGAL MENGUBAH ABSEN');
                redirect('Data_teknisi/absen_kediri/'.$this->uri->segment(3).'');
            }
        } else {
            redirect('Login');
        }
    }
}
