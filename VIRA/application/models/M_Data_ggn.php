<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_ggn extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function get_ggn()
    {
        return $this->db->where('date', date('Y-m-d') )
                        ->get('tb_ggn')
                        ->result();
    }
    public function get_filter_tanggal()
    {
        return $this->db->like('date', $this->input->post('tanggal') )
            ->order_by("date", "DESC")
            ->get('tb_ggn')
            ->result();
    }


}
