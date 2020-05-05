<div class="col-md-12 ">
  <div class="content-panel" style="padding: 25px ; max-width: 1200px ; margin-bottom : 20px ;">
    <h4 style="text-align : center"><i class="fa fa-table"></i> DAFTAR ABSENSI MITRA PROVISIONING DATEL <?php echo $this->uri->segment(3) ; ?></h4>
  </div>
      <div class="content-panel" style="padding: 25px ; max-width: 600px ; margin-bottom : 20px ;">    <div class="table-responsive">
      <table class="table table-striped table-hover display  absen" cellspacing="0"  style="border : 1px solid white">
          <thead>
            <tr>
              <th style="background-color: #d80000"><h5 style="text-align: center ; color: white">NO</h5></th>
                <th style="background-color: #d80000"><h5 style="text-align: center ; color: white">CREW</h5></th>
                <th style="background-color: #d80000"><h5 style="text-align: center ; color: white">NAMA</h5></th>
                <th style="background-color: #d80000"><h5 style="text-align: center ; color: white">AKSI</h5></th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1 ;
              foreach ($get_teknisi as $D) {
                echo '
                            <tr>
                                  <td>'. $no .'</td>
                                    <td>'. $D->kode_teknisi .'</td>
                                    <td>'. $D->nama_teknisi .'</td>
                                    <td >
                                      <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_ubah" onclick="ubah_teknisi('.$D->no_crew.')"   ><i class="fa fa-pencil"></i></a>
                                      </td>
                            </tr>
                            ';
                $no++ ;
            }
            ?>
          </tbody>
      </table>

    </div>
  </div>

    <div class="content-panel" style="padding: 25px ; max-width: 1300px ; margin-top: 30px ;">
      <div class="table-responsive">
        <table class="table table-striped table-hover dt-responsive display nowrap " cellspacing="0" style="border : 1px solid white" >
            <thead>
              <tr>
                <th rowspan="2" style="background-color: #d80000"><h5 style="text-align: center ; color: white">No</h5></th>
                <th rowspan="2" style="background-color: #d80000 ; padding-left : 30px ;padding-right: 30px ; "><h5 style="text-align: center ; color: white">CREW</h5></th>
                <th rowspan="2" style="background-color: #d80000"><h5 style="text-align: center ; color: white">Datel</h5></th>
                  <td colspan="31" style="background-color: #d80000"><h5 style="text-align: center ; color: white">TANGGAL ( <?php echo date('F') ; ?> )</h5></td>
              </tr>
              <tr>
                <?php
                for($i = 1 ; $i < 32 ; $i++)
                {
                  echo '<td style="margin : 10px ; padding : 10px ;" >'.$i.'</td>' ;

                }
                ?>
              </tr>

            </thead>
            <tbody>
              <?php
              $no = 1 ;
                foreach ($get_tim as $D) {
                  echo '
                              <tr>
                                      <td>'. $no .'</td>
                                      <td>'. $D->kode_teknisi .'</td>
                                      <td>'. $D->datel .'</td>
                                      <td>' ; if($D->tgl1 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl1/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl1/'.$D->no_crew.'"><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl2 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl2/'.$D->no_crew.'"><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl2/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl3 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl3/'.$D->no_crew.'"><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl3/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl4 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl4/'.$D->no_crew.'"><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl4/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl5 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl5/'.$D->no_crew.'"><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl5/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl6 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl6/'.$D->no_crew.'"><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl6/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl7 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl7/'.$D->no_crew.'"><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl7/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl8 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl8/'.$D->no_crew.'"><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl8/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl9 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl9/'.$D->no_crew.'"><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl9/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl10 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl10/'.$D->no_crew.'"><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl10/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl11 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl11/'.$D->no_crew.'"><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl11/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl12 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl12/'.$D->no_crew.'"><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl12/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl13 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl13/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl13/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl14 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl14/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl14/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl15 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl15/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl15/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl16 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl16/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl16/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl17 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl17/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl17/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl18 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl18/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl18/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl19 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl19/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl19/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl20 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl20/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl20/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl21 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl21/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl21/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl22 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl22/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl22/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl23 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl23/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl23/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl24 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl24/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl24/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl25 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl25/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl25/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl26 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl26/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl26/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl27 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl27/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl27/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl28 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl28/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl28/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl29 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl29/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl29/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl30 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl30/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl30/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>
                                      <td>' ; if($D->tgl31 == 0){echo'<a href="'.base_url().'Data_teknisi/ubah_absen_masuk/'.$this->uri->segment(3).'/tgl31/'.$D->no_crew.'" ><i class="fa fa-times"></i></a>' ;}else{ echo'<a href="'.base_url().'Data_teknisi/ubah_absen_libur/'.$this->uri->segment(3).'/tgl31/'.$D->no_crew.'" ><i class="fa fa-check"></i></a>' ;} echo '</td>

                              </tr>
                              ';
                              $no++ ;

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
            <form action="<?php echo base_url('Data_teknisi/ubah_teknisi/'.$this->uri->segment(3).''); ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_addLabel">UBAH REKAP</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">NAMA TEKNISI</label>
                                        <input class="form-control" type="text" name="nama_teknisi" id="nama_teknisi">
                                        <input class="form-control" type="hidden" name="id_teknisi" id="id_teknisi">
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
