<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_data_teknisi extends CI_Model{

    public function __construct()
    {
        parent::__construct();
        //Codeigniter : Write Less Do More
    }
    public function get_tim($datel)
    {
        return $this->db->where('area', $datel)
            ->get('tb_crew')
            ->result();
    }
    public function get_teknisi_kediri($datel)
    {
        return $this->db->join('tb_crew', 'tb_crew.kode_teknisi = tb_teknisi.kode_teknisi')
              ->where('area', $datel)
              ->get('tb_teknisi')
              ->result();
    }
    public function get_teknisi_by_id($id)
    {
        return $this->db->join('tb_crew', 'tb_crew.kode_teknisi = tb_teknisi.kode_teknisi')
            ->where('no_crew', $id)
            ->get('tb_teknisi')
            ->row();
    }
    public function hapus_teknisi($id)
    {
        return $this->db->where('no_crew', $id)
            ->delete('tb_crew');
    }
    public function tambah_rekap()
    {
        $data = array(
            'kode_teknisi' => $this->input->post('nama_tim'),
            'mitra' => $this->input->post('mitra'),
            'datel' => $this->input->post('sto'),
        );

        $this->db->insert('tb_crew', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function ubah_teknisi()
    {
        $data = array(
          'nama_teknisi' => $this->input->post('nama_teknisi')
        );

        $this->db->where('id_teknisi', $this->input->post('id_teknisi') )
            ->update('tb_teknisi', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function ubah_absen_masuk()
    {
        $data = array(
          $this->uri->segment(4) => 1
        );

        $this->db->where('no_crew', $this->uri->segment(5))
            ->update('tb_crew', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function ubah_absen_libur()
    {
        $data = array(
          $this->uri->segment(4) => 0
        );

        $this->db->where('no_crew', $this->uri->segment(5))
            ->update('tb_crew', $data);

        if($this->db->affected_rows() > 0){
            return TRUE;
        } else {
            return FALSE;
        }
    }

}
