<div class="col-md-12 mt">
    <div class="content-panel" style="padding: 25px ; max-width: 1200px">
      <?php
      if($this->session->userdata('loker') == 'admin'){
        echo '<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_add" >Add Crew</button>' ;
      }
      ?>
      <div class="table-responsive">
        <table class="table table-striped table-hover dt-responsive display nowrap laporanpsb" cellspacing="0"  >
            <h4 style="margin-bottom: 40px ;"><i class="fa fa-table"></i> Data Teknisi</h4>
            <thead>

            <tr style="background-color: #5876f0 ; color: white">
              <tr style="background-color: #5876f0 ; color: white">
                <?php
                // if($this->session->userdata('loker') == 'admin'){
                //   echo '<th >AKSI</th>' ;
                // }
                ?>
                <th>NO</th>
                <th>MITRA</th>
                <th>TANGGAL</th>
                <th>VOIP</th>
                <th>INET</th>
                <th>KENDALA</th>
                <th>TAG ODP</th>
                <th>TAG PELANGGAN</th>
                <th>USER</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1 ;

            foreach ($get_tim as $D) {
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
                                    <td>'.$D->mitra .'</td>
                                    <td>'.$D->tanggal .'</td>
                                    <td>'.$D->inet.'</td>
                                    <td>'.$D->telpon .'</td>
                                    <td>'.$D->kendala .'</td>
                                    <td>'.$D->tag_odp .'</td>
                                    <td>'.$D->tag_pelanggan .'</td>
                                    <td>'.$D->user .'</td>
                                </tr>
                            ';
            }
            ?>
            </tbody>
        </table>

      </div>
    </div>
</div>
