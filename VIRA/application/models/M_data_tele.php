<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_tele extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }

    public function get_tele_psb()
    {
        return $this->db->join('tb_laporan_psb', 'tb_crew.kode_teknisi = tb_laporan_psb.nama_tim')
            ->where('tanggal', date('Y-m-d') )
            ->order_by("tanggal", "DESC")
            ->get('tb_crew')
            ->result();
    }
    public function get_tele_psb_all()
    {
        return $this->db->join('tb_laporan_psb', 'tb_crew.kode_teknisi = tb_laporan_psb.nama_tim')
            ->order_by("tanggal", "DESC")
            ->get('tb_crew')
            ->result();
    }
    public function get_tele_psb_detail()
    {
        return $this->db->join('tb_laporan_psb', 'tb_crew.kode_teknisi = tb_laporan_psb.nama_tim')
            ->where('tanggal', date('Y-m-d') )
            ->where('no_crew', $this->uri->segment(3) )
            ->order_by("tanggal", "DESC")
            ->get('tb_crew')
            ->result();
    }
    public function get_filter_tanggal()
    {
        return $this->db->join('tb_laporan_psb', 'tb_crew.kode_teknisi = tb_laporan_psb.nama_tim')
            ->like('tanggal', $this->input->post('tanggal') )
            ->order_by("tanggal", "DESC")
            ->get('tb_crew')
            ->result();
    }
    // public function get_filter_tanggal_baru()
    // {
    //     return $this->db->join('tb_laporan_psb', 'tb_crew.kode_teknisi = tb_laporan_psb.nama_tim')
    //             ->where("DATE_FORMAT(tanggal,'%d')", $this->input->post('tanggal') )
    //         ->where("DATE_FORMAT(tanggal,'%m')", $this->input->post('bulan') )
    //         ->where("DATE_FORMAT(tanggal,'%Y')", $this->input->post('tahun') )
    //         ->order_by("tanggal", "DESC")
    //         ->get('tb_crew')
    //         ->result();
    // }
    public function get_filter_tanggal_detail()
    {
        return $this->db->join('tb_laporan_psb', 'tb_crew.kode_teknisi = tb_laporan_psb.nama_tim')
            ->where('tanggal', $this->uri->segment(3) )
            ->where('no_crew', $this->uri->segment(4) )
            ->order_by("tanggal", "DESC")
            ->get('tb_crew')
            ->result();
    }
    public function get_rekap_by_id($id)
    {
        return $this->db->where('id_laporan_psb', $id)
            ->get('tb_laporan_psb')
            ->row();
    }
    public function get_teknisi()
    {
        return $this->db->get('tb_crew')
            ->result();
    }
    public function ubah_rekap()
    {
        $data = array(
            'nama_pelanggan' => $this->input->post('nama_pelanggan'),
            'alamat_pelanggan' => $this->input->post('alamat_pelanggan'),
            'inet' => $this->input->post('inet'),
            'voip' => $this->input->post('telp'),
            'sn' => $this->input->post('sn'),
            'sc' => $this->input->post('sc'),
            'mac_stb' => $this->input->post('mac'),
            'odp' => $this->input->post('odp'),
            'port' => $this->input->post('port'),
            'redaman' => $this->input->post('red'),
            'dc' => $this->input->post('dc'),
            'tr_code' => $this->input->post('tr_code'),
            'tag_odp' => $this->input->post('tag_odp'),
            'tag_pelanggan' => $this->input->post('tag_pelanggan'),
            'layanan' => $this->input->post('layanan'),
        );

        $this->db->where('id_laporan_psb', $this->input->post('id_laporan_psb') )
            ->update('tb_laporan_psb', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function hapus_rekap($id)
    {
        return $this->db->where('id_laporan_psb', $id)
            ->delete('tb_laporan_psb');
    }

}
