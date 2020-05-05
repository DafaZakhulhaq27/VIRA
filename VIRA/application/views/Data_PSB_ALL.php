
<div class="col-md-12 mt">
    <div class="content-panel" style="padding: 25px ; max-width: 1200px ; margin-bottom : 20px ;">
      <h4 style="text-align : center"><i class="fa fa-table"></i> Data Perolehan tarikan PSB per TIM </h4>
    </div>
    <div class="content-panel" style="padding: 25px ; max-width: 1200px">
    <div class="row">
      <div class="col-md-4">
        <form action="<?php echo base_url('Data_tele/filter_tanggal/'.$this->input->post('tanggal').''); ?>" method="post">
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

    <div class="row">
    <a class="btn btn-primary btn-xs" style="margin-bottom: 30px ; " href="<?php echo base_url() ; ?>Data_tele/data_psb_all">TAMPILKAN SEMUA</a>
    </div>
      <div class="table-responsive">
        <table class="table table-striped table-hover dt-responsive display nowrap laporanpsb" cellspacing="0"  >
            <thead>

            <tr style="background-color: #5876f0 ; color: white">
              <?php
              if($this->session->userdata('loker') == 'admin'){
                echo '<th >AKSI</th>' ;
              }
              ?>
                <th>NO</th>
                <th>EVIDENT</th>
                <th>NAMA TIM</th>
                <th>TANGGAL</th>
                <th>SC</th>
                <th>ODP</th>
                <th>TR CODE</th>
                <th>USERNAME TELE / NAMA TEKNISI</th>
                <th>NAMA PELANGGAN</th>
                <th>ALAMAT PELANGGAN</th>
                <th>VOIP</th>
                <th>INET</th>
                <th>DC</th>
                <th>SN</th>
                <th>MAC STB</th>
                <th>PORT</th>
                <th>REDAMAN</th>
                <th>TAG ODP</th>
                <th>TAG PELANGGAN</th>
                <th>LAYANAN</th>
                <th>NO HP</th>

            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1 ;

            foreach ($get_data_psb as $D) {
                echo '
                                <tr>
                                    ' ;
                                    if($this->session->userdata('loker') == 'admin'){
                                      echo '
                                      <td>
                                        <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_ubah" onclick="ubah_rekap('.$D->id_laporan_psb.')" ><i class="fa fa-pencil"></i></a>
                                        <a class="btn btn-danger btn-xs" onclick="hapus_rekap('.$D->id_laporan_psb.')"><i class="fa fa-trash-o "></i></a>
                                        </td>
                                        ' ;
                                    }
                                      echo '
                                    <td>'.$no++.'</td>
                                    <td><a class="fancybox" href="http://10.116.18.32/bot_woc/gambar/'.$D->file_id.'"><img src="http://10.116.18.32/bot_woc/gambar/'.$D->file_id.'" alt="Evident belum terecord" height="42" width="42"></a></td>
                                    <td>'.$D->nama_tim.'</td>
                                    <td>'.$D->tanggal.'</td>
                                    <td>'. $D->sc .'</td>
                                    <td>'. $D->odp .'</td>
                                    <td>'. $D->tr_code .'</td>
                                    <td>@'.$D->username_teknisi.'/'.$D->nama_teknisi.'</td>
                                    <td>'. $D->nama_pelanggan .'</td>
                                    <td>'. $D->alamat_pelanggan .'</td>
                                    <td>'. $D->voip .'</td>
                                    <td>'. $D->inet .'</td>
                                    <td>'. $D->dc .'</td>
                                    <td>'. $D->sn .'</td>
                                    <td>'. $D->mac_stb .'</td>
                                    <td>'. $D->port .'</td>
                                    <td>'. $D->redaman .'</td>
                                    <td>'. $D->tag_odp .'</td>
                                    <td>'. $D->tag_pelanggan .'</td>
                                    <td>'. $D->layanan .'</td>
                                    <td>0'. $D->no_hp .'</td>

                                </tr>
                            ';
            }
            ?>
            </tbody>
        </table>

      </div>
    </div>
</div>
<div class="modal fade" id="modal_ubah" role="dialog" ari-labelleadby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url('Data_tele/ubah_rekap'); ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_addLabel">UBAH REKAP</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>KODE TEKNISI</label>
                                <div class="form-line">
                                    <input class="form-control" type="hidden" name="kode_teknisi1" id="kode_teknisi1">
                                    <select class="form-control" name="kode_teknisi" id="kode_teknisi">
                                        <?php
                                        foreach ($get_teknisi as $D) {
                                            echo '<option value="'.$D->kode_teknisi.'">'.$D->kode_teknisi.'</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">NAMA PELANGGAN</label>
                                        <input class="form-control" type="text" name="nama_pelanggan" id="nama_pelanggan">
                                        <input class="form-control" type="hidden" name="id_laporan_psb" id="id_laporan_psb">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">ALAMAT PELANGGAN</label>
                                        <input class="form-control" type="text" name="alamat_pelanggan" id="alamat_pelanggan">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">SC</label>
                                        <input class="form-control" type="text" name="sc" placeholder="SCxxxxxx" id="sc">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">USER INET</label>
                                        <input class="form-control" type="text" name="inet" placeholder="152xxxxxxxxx" id="inet">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">NO TELP</label>
                                        <input class="form-control" type="text" name="telp" placeholder="0354xxxxx" id="tel">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">SN ONT</label>
                                        <input class="form-control" type="text" name="sn" id="sn">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">MAC STB</label>
                                        <input class="form-control" type="text" name="mac" id="mac">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">ODP</label>
                                        <input class="form-control" type="text" name="odp" id="odp">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">PORT</label>
                                        <input class="form-control" type="number" name="port" id="port">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">RED</label>
                                        <input class="form-control" type="text" name="red" id="red">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">DC</label>
                                        <input class="form-control" type="text" name="dc" id="dc">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">TR CODE</label>
                                        <input class="form-control" type="text" name="tr_code" id="tr_code">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">TAG ODP</label>
                                        <input class="form-control" type="text" name="tag_odp" id="tag_odp">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">TAG PELANGGAN</label>
                                        <input class="form-control" type="text" name="tag_pelanggan" id="tag_pelanggan">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">LAYANAN</label>
                                        <input class="form-control" type="text" name="layanan" id="layanan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    <input type="submit" name="submit" class="btn btn-danger" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
