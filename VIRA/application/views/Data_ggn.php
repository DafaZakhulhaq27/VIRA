<div class="col-md-12 mt">
  <div class="content-panel" style="padding: 25px ; max-width: 1200px ; margin-bottom : 20px ;">
    <h4 style="text-align : center"><i class="fa fa-table"></i> Data GGN</h4>
  </div>
    <div class="content-panel" style="padding: 25px ; max-width: 1200px">
      <div class="row">
        <div class="col-md-4">
          <form action="<?php echo base_url('Data_ggn/filter_tanggal/'.$this->input->post('tanggal').''); ?>" method="post">
          <div class="form-group">
              <label>FILTER TANGGAL</label>
              <div class="form-line">
                  <input class="form-control" type="text" name="tanggal" placeholder="20xx-xx-xx">
                  <!-- <select class="form-control" name="kode_teknisi" id="kode_teknisi">
                      <option value="'.$D->kode_teknisi.'">'.$D->kode_teknisi.'</option>
                  </select> -->
              </div>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
              <div class="form-line">
                <input type="submit" name="submit" class="btn btn-success" value="Cari" style="margin-top : 23px ;">
              </div>
          </div>
        </form>
        </div>
    </div>
    <div class="row">
      <div class="form-group">
          <div class="form-line" style="margin-left : 20px ">
            <p><b>KET : </b>
              <br> cari berdasarkan bulan : 20xx-xx
              <br> cari berdasarkan hari/tanggal : 20xx-xx-xx
            </p>
          </div>
      </div>
    </div>
      <div class="table-responsive">
        <table class="table table-striped table-hover dt-responsive display nowrap laporanpsb" cellspacing="0"  >
            <thead>

            <tr style="background-color: #5876f0 ; color: white">
              <tr style="background-color: #5876f0 ; color: white">
                <?php
                // if($this->session->userdata('loker') == 'admin'){
                //   echo '<th >AKSI</th>' ;
                // }
                ?>
                <th>NO</th>
                <th>GAMBAR</th>
                <th>TIKET</th>
                <th>CREW</th>
                <th>INET / TELP</th>
                <th>SOLUSI</th>
                <th>ONT</th>
                <th>DC</th>
                <th>SOC</th>
                <th>PS</th>
                <th>TANGGAL</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1 ;

            foreach ($get_ggn as $D) {
              echo '
                              <tr>
                                  ' ;

                                    echo '
                                    <td>'.$no++.'</td>
                                    <td><a class="fancybox" href="http://10.116.18.32/bot_woc/gambar/'.$D->gambar.'"><img src="http://10.116.18.32/bot_woc/gambar/'.$D->gambar.'" alt="Evident belum terecord" height="42" width="42"></a></td>
                                    <td>'.$D->tiket .'</td>
                                    <td>'.$D->crew .'</td>
                                    <td>'.$D->inettelp .'</td>
                                    <td>'.$D->solusi.'</td>
                                    <td>'.$D->ont .'</td>
                                    <td>'.$D->dc .'</td>
                                    <td>'.$D->soc .'</td>
                                    <td>'.$D->ps .'</td>
                                    <td>'.$D->date .'</td>
                                </tr>
                            ';
            }
            ?>
            </tbody>
        </table>

      </div>
    </div>
</div>
