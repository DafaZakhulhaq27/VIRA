<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_kendala extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function get_kendala()
    {
        return $this->db->get('tb_kendala')
            ->result();
    }



}
