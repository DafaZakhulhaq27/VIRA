<div class="col-md-12 mt">
    <div class="content-panel" style="padding: 25px ; max-width: 1200px">

      <div class="table-responsive">
        <table class="table  display nowrap laporanpsb" cellspacing="0"  >
            <h4 style="margin-bottom: 40px ;"><i class="fa fa-table"></i> Data Kendala PSB</h4>
            <thead>

            <tr style="background-color: #5876f0 ; color: white">
              <th rowspan="2">NO</th>
              <th rowspan="2">STO</th>
                <th rowspan="2">Nama</th>
                <th rowspan="2">NO HP</th>
                <th rowspan="2">KCONTACT</th>
                <th rowspan="2">TAGGING</th>
                <th rowspan="2">ALAMAT</th>
                <th rowspan="2">ODP</th>
                <th rowspan="2">TANGGAL</th>
                <th rowspan="2">USERNAME TELE</th>
                <th rowspan="2">NAMA TELE</th>
                <th colspan="4" style="text-align:center">Kendala</th>

            </tr>
            <tr style="background-color: #5876f0 ; color: white">
              <th ></th>

                <th >ODP Penuh</th>
                <th >Tambah Tiang</th>
                <th >Tidak Ada Jaringan</th>
                <th >ODP Unspec</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1 ;

            foreach ($get_kendala as $D) {
              echo '
                              <tr>
                                  ' ;
                                  // if($this->session->userdata('loker') == 'admin'){
                                  //   echo '
                                  //   <td>
                                  //     <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_ubah" onclick="ubah_teknisi('.$D->no_crew.')" ><i class="fa fa-pencil"></i></a>
                                  //     <a class="btn btn-danger btn-xs" onclick="hapus_teknisi('.$D->no_crew.')"><i class="fa fa-trash-o "></i></a>
                                  //     </td>
                                  //     ' ;
                                  // }
                                    echo '
                                    <td>'.$no++.'</td>
                                    <td>'.$D->sto .'</td>
                                    <td>'.$D->nama_psb_kendala .'</td>
                                    <td>'.$D->hp_psb_kendala .'</td>
                                    <td>'.$D->kcontact .'</td>
                                    <td>'.$D->tagging .'</td>
                                    <td>'.$D->alamat .'</td>
                                    <td>'.$D->odp .'</td>
                                    <td>'.$D->date .'</td>
                                    <td>'.$D->username_tele .'</td>
                                    <td>'.$D->nama_tele .'</td>
                                    <td></td>

                                    <td>'.$D->odp_penuh.'</td>
                                    <td>'.$D->tambah_tiang .'</td>
                                    <td>'.$D->tidak_ada_jaringan .'</td>
                                    <td>'.$D->odp_unspect .'</td>

                                </tr>
                            ';
            }
            ?>
            </tbody>
        </table>

      </div>
    </div>
</div>
