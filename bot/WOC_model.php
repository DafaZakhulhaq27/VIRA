<?php
require_once 'medoo.php';


    $database = new medoo([
        'database_type' => 'mysql',
        'database_name' => 'db_manage',
        'server' => 'localhost',
        'username' => 'root',
        'password' => '',
        'charset' => 'utf8'
    ]);
    function tambah_psb($namamu,$iduser,$username,$nama_tim,$nama_pelanggan,$alamat,$sc,$inet,$voip,$sn,$mac,$odp,$port,$red,$dc,$tr_code,$tag_odp,$tag_pelanggan,$layanan,$file_id,$hp)
    {
        global $database;
        $odp1 = explode("-",$odp) ;
        $last_id = $database->insert('tb_laporan_psb',   [
            'nama_tim'    => $nama_tim,
            'sto' => $odp1[1],
            'tanggal' => date('Y-m-d'),
            'nama_teknisi'    => $namamu,
            'username_teknisi'    => $username,
            'nama_pelanggan'    => $nama_pelanggan,
            'alamat_pelanggan'    => $alamat,
            'sc'    => $sc,
            'inet'    => $inet,
            'voip'    => $voip,
            'sn'    => $sn,
            'mac_stb'    => $mac,
            'odp'    => $odp,
            'port'    => $port,
            'redaman'    => $red,
            'dc'    => $dc,
            'tr_code'    => $tr_code,
            'tag_odp'    => $tag_odp,
            'tag_pelanggan'    => $tag_pelanggan,
            'layanan'    => $layanan,
            'file_id'    => $file_id,
            'no_hp '    => $hp,

        ]);

        if($last_id)
        {
            return TRUE ;
        }else{
            return FALSE ;
        }

    }
    function tambah_kendala($inet3,$telp3,$kendala3,$tag_odp3,$tag_pelanggan3,$namamu,$mitra3)
    {
        global $database;
        $last_id = $database->insert('tb_kendala',   [
            'tanggal' => date('Y-m-d'),
            'inet'    => $inet3,
            'telpon'    => $telp3,
            'kendala'    => $kendala3,
            'tag_odp'    => $tag_odp3,
            'tag_pelanggan'    => $tag_pelanggan3,
            'user'    => $namamu,
            'mitra'    => $mitra3,

        ]);

        if($last_id)
        {
            return TRUE ;
        }else{
            return FALSE ;
        }

    }
    function tambah_kendala_psb($nama,$nohp,$kcontact,$tag,$alamat,$odp,$odp_penuh,$tambah_tiang,$tidak_ada_jaringan,$odp_unspec,$username,$namamu)
    {
      global $database;
      $odp1 = explode("-",$odp) ;
      $last_id = $database->insert('tb_kendala_psb',   [
          'nama_psb_kendala'    => $nama,
          'sto' => $odp1[1],
          'date' => date('Y-m-d'),
          'hp_psb_kendala'    => $nohp,
          'kcontact'    => $kcontact,
          'tagging'    => $tag,
          'alamat'    => $alamat,
          'odp'    => $odp,
          'odp_penuh'    => $odp_penuh,
          'tambah_tiang'    => $tambah_tiang,
          'tidak_ada_jaringan'    => $tidak_ada_jaringan,
          'username_tele'    => $username,
          'nama_tele'    => $namamu,
          'odp_unspect'    => $odp_unspec,

      ]);

      if($last_id)
      {
          return TRUE ;
      }else{
          return FALSE ;
      }


    }
    function tambah_live($file,$sc,$inet,$mac,$live,$kendala)
    {
        global $database;
        $last_id = $database->insert('tb_live',   [
            'tanggal' => date('Y-m-d'),
            'sc'    => $sc,
            'inet'    => $inet,
            'live'    => $live,
            'mac'    => $mac,
            'kendala'    => $kendala,
            'gambar'    => $file,

        ]);

        if($last_id)
        {
            return TRUE ;
        }else{
            return FALSE ;
        }
    }
    function tambah_ggn($crew,$in,$inettelp,$solusi,$ont,$dc,$soc,$ps,$file)
    {
        global $database;
        $last_id = $database->insert('tb_ggn', [
            'crew'    => $crew,
            'inettelp'    => $inettelp,
            'solusi'    => $solusi,
            'ont'    => $ont,
            'dc'    => $dc,
            'soc'    => $soc,
            'ps'    => $ps,
            'date' => date('Y-m-d'),
            'gambar' => $file,
            'tiket'    => $in,

        ]);

        if($last_id)
        {
            return TRUE ;
        }else{
            return FALSE ;
        }
    }

    function tambah_odp_tertutup($odp_tertutup,$odp)
    {
        $pisah = explode("-",$odp) ;
        global $database;
        $last_id = $database->update('tb_penutupan_odp', [
            'odp_sesudah'    => $odp_tertutup,
        ],[
            'odp'    => $odp,
        ]);

        if($last_id)
        {
            return TRUE ;
        }else{
            return FALSE ;
        }
    }

    function data_crew()
    {
        global $database;
        $datas = $database->select('tb_crew', [
            'kode_teknisi'
        ]);
        $jml = count($datas);
        if ($jml > 0) {
            $hasil = "📡 Berikut data kode teknisi yang terdaftar : \n";
            $hasil .= "\n";
            $n = 0;
            foreach ($datas as $data) {
                $n++;
                $hasil .= "$data[kode_teknisi]\n";
            }
        }


        return $hasil;
    }
    function data_crew_ass()
    {
        global $database;
        $datas = $database->select('tb_crew_ass', [
            'crew'
        ]);
        $jml = count($datas);
        if ($jml > 0) {
            $hasil = "📡 Berikut data kode  ggn  yang terdaftar : \n";
            $hasil .= "\n";
            $n = 0;
            foreach ($datas as $data) {
                $n++;
                $hasil .= "$data[crew]\n";
            }
        }


        return $hasil;
    }
    function data_nodeb()
    {
        global $database;
        $datas = $database->select('tb_nodeb', [
            'odp'
        ]);
        $jml = count($datas);
        if ($jml > 0) {
            $hasil = "📡 Berikut data ODP yang terhubung dengan nodeb : \n";
            $hasil .= "\n";
            $n = 0;
            foreach ($datas as $data) {
                $n++;
                $hasil .= "$data[odp]\n";
            }
        }


        return $hasil;
    }
    function cek_inet($sc)
    {
        global $database;
        $datas = $database->select('tb_laporan_psb', 'sc', [
            'sc' => $sc ,
        ]);
        $jml = count($datas);
        if ($jml > 0) {
            return FALSE ;
        }else{
            return TRUE ;
        }

    }
    function cek_odp($odp)
    {
        global $database;
        $datas = $database->select('tb_penutupan_odp', 'odp', [
            'odp' => $odp ,
        ]);
        $jml = count($datas);
        if ($jml > 0) {
            return FALSE ;
        }else{
            return TRUE ;
        }

    }

    function cek_nodeb($odp)
    {
        global $database;
        $datas = $database->select('tb_nodeb', 'odp', [
          "odp[~]" => ''.$odp.'%'
        ]);
        $jml = count($datas);
        if ($jml > 0) {
            return FALSE ;
        }else{
            return TRUE ;
        }

    }
    function cek_tim($tim)
    {
        global $database;
        $datas = $database->select('tb_crew', 'kode_teknisi', [
            'kode_teknisi' => $tim ,
        ]);
        $jml = count($datas);
        if ($jml > 0) {
            return TRUE ;
        }else{
            return FALSE ;
        }

    }
    function cek_tim_ass($tim)
    {
        global $database;
        $datas = $database->select('tb_crew_ass', 'crew', [
            'crew' => $tim ,
        ]);
        $jml = count($datas);
        if ($jml > 0) {
            return TRUE ;
        }else{
            return FALSE ;
        }

    }

    function cek_sn($sn)
    {
        global $database;
        $datas = $database->select('tb_laporan_psb', 'sn', [
            'sn' => $sn ,
        ]);
        $jml = count($datas);
        if ($jml > 0) {
            return FALSE ;
        }else{
            return TRUE ;
        }

    }
