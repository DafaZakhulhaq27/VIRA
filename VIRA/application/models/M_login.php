<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function user_check(){
        $query = $this->db->where('nik', $this->input->post('username'))
            ->where('password', md5($this->input->post('password')))
            ->get('login');

        if($query->num_rows() == 1){
            $data_login = $query->row();
            $session = array(
                'logged_in'		=>	TRUE,
                'nik'			=>	$data_login->nik,
                'nama'			=>	$data_login->nama,
                'email'			=>	$data_login->email,
                'password'	=>	$data_login->password,
                'loker'	=>	$data_login->loker,
            );
            $this->session->set_userdata($session);
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
