<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_kendala_psb extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function get_kendala_psb()
    {
        return $this->db->get('tb_kendala_psb')
            ->result();
    }



}
