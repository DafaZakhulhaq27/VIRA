<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Dashboard extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    // public function perolehan_tim()
    // {
    //     return $this->db->join('tb_laporan_psb', 'tb_crew.kode_teknisi = tb_laporan_psb.nama_tim')
    //         ->select('datel,kode_teknisi, COUNT(nama_tim) as total')
    //         ->where('tanggal', date('Y-m-d'))
    //         ->group_by('tb_crew.kode_teknisi')
    //         ->get('tb_crew')
    //         ->result();
    // }
    public function get_total($teknisi)
    {
        return $this->db->join('tb_laporan_psb', 'tb_crew.kode_teknisi = tb_laporan_psb.nama_tim')
            ->select('datel,kode_teknisi, COUNT(nama_tim) as total')
            ->where('tanggal', date('Y-m-d'))
            ->where('kode_teknisi', $teknisi)
            ->group_by('tb_crew.kode_teknisi')
            ->get('tb_crew')
            ->row()->total ;
    }
    public function get_tim()
    {
        return $this->db->get('tb_crew')
            ->result_array();
    }

    public function get_date_ps()
    {
        return $this->db->select('tanggal, COUNT(tanggal) as total')
            ->group_by('tanggal')
            ->get('tb_laporan_psb')
            ->result();
    }
    public function get_mitra_kendala()
    {
        return $this->db->select('mitra, COUNT(mitra) as total')
        ->group_by('mitra ')
            ->get('tb_kendala')
            ->result();
    }
    public function get_all_hi()
    {
        return $this->db->join('tb_laporan_psb', 'tb_crew.kode_teknisi = tb_laporan_psb.nama_tim')
            ->where('tanggal', date('Y-m-d'))
            ->from('tb_crew')
            ->count_all_results();
    }

    public function get_total_filter_tanggal($teknisi)
    {
        return $this->db->join('tb_laporan_psb', 'tb_crew.kode_teknisi = tb_laporan_psb.nama_tim')
            ->select('datel,kode_teknisi, COUNT(nama_tim) as total')
            ->where('tanggal', $this->input->post('tanggal'))
            ->where('kode_teknisi', $teknisi)
            ->group_by('tb_crew.kode_teknisi')
            ->get('tb_crew')
            ->row()->total ;
    }
    public function get_all_hi_filter_tanggal()
    {
        return $this->db->join('tb_laporan_psb', 'tb_crew.kode_teknisi = tb_laporan_psb.nama_tim')
            ->where('tanggal', $this->input->post('tanggal'))
            ->from('tb_crew')
            ->count_all_results();
    }

}
