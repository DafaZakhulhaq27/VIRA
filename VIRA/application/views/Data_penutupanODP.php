<div class="col-md-12 mt">
    <div class="content-panel" style="padding: 25px ; max-width: 1200px">
      <div class="table-responsive">
        <table class="table table-striped table-hover dt-responsive display nowrap absen" cellspacing="0"  >
            <h4 style="margin-bottom: 40px ;"><i class="fa fa-table"></i> Data Teknisi</h4>
            <thead>

            <tr style="background-color: #5876f0 ; color: white">
              <tr style="background-color: #5876f0 ; color: white">
                <?php
                if($this->session->userdata('loker') == 'admin'){
                  echo '<th >AKSI</th>' ;
                }
                ?>
                <th>NO</th>
                <th>ODP TERBUKA (SEBELUM)</th>
                <th>ODP TERTUTUP (SESUDAH)</th>
                <th>TANGGAL</th>
                <th>ODP</th>
                <th>AREA</th>
                <th>NAMA</th>
                <th>USERNAME</th>
                <th>MITRA</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1 ;
            foreach ($get_penutupan_odp as $D) {
              echo '
                              <tr>
                                  ' ;
                                  if($this->session->userdata('loker') == 'admin'){
                                    echo '
                                    <td>
                                      <a class="btn btn-danger btn-xs" onclick="hapus_penutupanODP('.$D->id_penutupan_odp.')"><i class="fa fa-trash-o "></i></a>
                                      </td>
                                      ' ;
                                    }
                                    echo '
                                    <td>'.$no++.'</td>
                                    <td><a class="fancybox" href="http://10.116.17.79/bot_woc/gambar/'.$D->odp_sebelum.'"><img src="http://10.116.17.79/bot_woc/gambar/'.$D->odp_sebelum.'" alt="Evident belum terecord" height="42" width="42"></a></td>
                                    <td><a class="fancybox" href="http://10.116.17.79/bot_woc/gambar/'.$D->odp_sesudah.'"><img src="http://10.116.17.79/bot_woc/gambar/'.$D->odp_sesudah.'" alt="Evident belum terecord" height="42" width="42"></a></td>
                                    <td>'.$D->tanggal.'</td>
                                    <td>'.$D->odp.'</td>
                                    <td>'.$D->area.'</td>
                                    <td>'.$D->nama.'</td>
                                    <td>'.$D->user.'</td>
                                    <td>'.$D->mitra.'</td>
                                </tr>
                            ';
            }
            ?>
            </tbody>
        </table>
      </div>
    </div>
</div>
