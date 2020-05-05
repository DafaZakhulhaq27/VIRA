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
                if($this->session->userdata('loker') == 'admin'){
                  echo '<th >AKSI</th>' ;
                }
                ?>
                <th>NO</th>
                <th>NAMA TIM</th>
                <th>MITRA</th>
                <th>STO</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1 ;

            foreach ($get_tim as $D) {
              echo '
                              <tr>
                                  ' ;
                                  if($this->session->userdata('loker') == 'admin'){
                                    echo '
                                    <td>
                                      <a class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_ubah" onclick="ubah_teknisi('.$D->no_crew.')" ><i class="fa fa-pencil"></i></a>
                                      <a class="btn btn-danger btn-xs" onclick="hapus_teknisi('.$D->no_crew.')"><i class="fa fa-trash-o "></i></a>
                                      </td>
                                      ' ;
                                  }
                                    echo '
                                    <td>'.$no++.'</td>
                                    <td>'.$D->kode_teknisi.'</td>
                                    <td>'.$D->mitra.'</td>
                                    <td>'.$D->datel.'</td>
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
            <form action="<?php echo base_url('Data_teknisi/ubah_te'); ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_addLabel">UBAH CREW TEKNISI</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">NAMA TIM</label>
                                        <input class="form-control" type="text" name="nama_tim" id="nama_tim" readonly>
                                        <input class="form-control" type="hidden" name="no_crew" id="no_crew" >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">MITRA</label>
                                        <input class="form-control" type="text" name="mitra" id="mitra">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">STO</label>
                                        <input class="form-control" type="text" name="sto" id="sto">
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
<div class="modal fade" id="modal_add" role="dialog" ari-labelleadby="modal_addLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="<?php echo base_url('Data_teknisi/tambah_rekap'); ?>" method="post">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_addLabel">TAMBAH CREW TEKNISI</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">NAMA TIM</label>
                                        <input class="form-control" type="text" name="nama_tim" id="nama_tim">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">MITRA</label>
                                        <input class="form-control" type="text" name="mitra" id="mitra">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-row">
                                    <div class="col-md-12">
                                        <label for="exampleInputName">STO</label>
                                        <input class="form-control" type="text" name="sto" id="sto">
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
