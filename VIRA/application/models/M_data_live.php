<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_live extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function get_live()
    {
        return $this->db->where('tanggal', date('Y-m-d') )
            ->get('tb_live')
            ->result();
    }
    public function get_filter_tanggal()
    {
        return $this->db->like('tanggal', $this->input->post('tanggal') )
            ->order_by("tanggal", "DESC")
            ->get('tb_live')
            ->result();
    }



}
