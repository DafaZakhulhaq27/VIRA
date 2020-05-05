<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_penutupanodp extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function get_penutupan_odp()
    {
        return $this->db->get('tb_penutupan_odp')
            ->result();
    }
    public function hapus_penutupanODP($id)
    {
        return $this->db->where('id_penutupan_odp', $id)
            ->delete('tb_penutupan_odp');
    }


}
