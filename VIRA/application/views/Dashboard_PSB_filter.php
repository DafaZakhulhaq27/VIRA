    <div class="col-md-7 col-sm-12">
        <div class="content-panel" style="padding: 10px ;">
            <div id="chartdivday" style="width: 100%; height: 300px;"></div>
        </div>
    </div>

    <div class="col-md-5 col-sm-12">
        <div class="content-panel" style="padding: 10px ; height: 320px;">
            <div class="col-md-12 col-sm-12 mb" >
                <div class="green-panel pn" style="background-color: #d82200 ; height: 300px;">
                    <div class="green-header" style="background-color: #d80000">
                        <h5>PEROLEHAN TARIKAN HARI INI</h5>
                    </div>
                    <canvas id="serverstatus03" height="120" width="120"></canvas>
                    <script>
                        var doughnutData = [{
                            value: 125 ,
                            color: "#2b2b2b"
                        },
                            {
                                value: <?php echo $get_all_hi ?> ,
                                color: "#fffffd"
                            }
                        ];
                        var myDoughnut = new Chart(document.getElementById("serverstatus03").getContext("2d")).Doughnut(doughnutData);
                    </script>
                    <h3><?php echo $get_all_hi ?> TARIKAN</h3>
                    <p>Putih = jumlah tarikan
                    </br>Hitam = target tarikan (125)
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- /col-lg-12 -->
    </div>

<div class="col-md-12 mt">
    <div class="content-panel" style="padding: 25px ;">
          <div class="row">
            <div class="col-md-4">
              <form action="<?php echo base_url('Dashboard/filter_tanggal/'.$this->input->post('tanggal').''); ?>" method="post">
              <div class="form-group">
                  <label> FILTER TANGGAL</label>
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
        <table class="table table-hover laporan" style="border-color: white">

            <h4 style="margin-bottom: 40px ;"><i class="fa fa-table"></i> Data Perolehan tarikan per TIM</h4>
            <thead>
            <tr>
                <th colspan="7" style="background-color: #d80000"><h3 style="text-align: center ; color: white">LAPORAN TANGGAL <?php if($this->uri->segment('3') == NULL){echo date('Y-m-d') ;}else{echo $this->uri->segment('3') ; } ?></h3></th>
            </tr>
            <tr style="background-color: #5876f0 ; color: white">
                <th>NO</th>
                <th>DATEL</th>
                <th>TIM</th>
                <th>TARGET HARIAN</th>
                <th>ORDER GRUP</th>
                <th>DEVIASI</th>
                <th>%</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $no = 1 ;

            foreach ($tim as $D) {
              // '.$this->M_Dashboard->get_total($D->kode_teknisi).'
              ?>
              <tr data-href="<?php echo base_url() ; ?>Data_tele/filter_tanggal_detail/<?php echo $this->uri->segment(3) ; ?>/<?php echo $D['no_crew'] ; ?>/">
                                    <td><?php echo $no++ ; ?></td>
                                    <td><?php echo $D['datel'] ; ?></td>
                                    <td><?php echo $D['kode_teknisi'] ; ?></td>
                                    <td style="text-align: center">3</td>
                                    <td style="text-align: center"><?php echo $this->M_Dashboard->get_total_filter_tanggal($D['kode_teknisi']) ; ?></td>
                                    <td><?php echo $this->M_Dashboard->get_total($D['kode_teknisi'])-3 ; ?></td>
                                    <td><?php echo number_format((33.3333333333*$this->M_Dashboard->get_total_filter_tanggal($D['kode_teknisi'])), 0, '.', '') ; ?>%</td>
                                </tr>
            <?php
            }
            ?>

            </tbody>
            <tfoot>
            <tr style="">
                <th colspan="3" style="text-align: center"><b>TOTAL : </b></th>
                <th  style="text-align: center ; background-color: #0a8c28 ; color: white ;">
                  120
                </th>
                <th  style="text-align: center ; background-color: #0a8c40 ; color: white ;">
                    <?php
                    // $no = 0 ;
                    // foreach ($perolehan_tim as $D) {
                    //     $no = $no+$D->total ;
                    // }
                    echo $get_all_hi ;
                    ?>
                </th>
                <th colspan="3" ></th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
<!-- /col-md-12 -->
</div>
    <script type="text/javascript">
        $(document).ready( function () {
            var dayconfig = <?php echo json_encode($get_date_ps); ?> ;
            AmCharts.makeChart("chartdivday",
                {
                    "hideCredits":true,
                    "type": "serial",
                    "dataDateFormat": "YYYY-MM-DD",
                    "categoryField": "tanggal",
                    "startDuration": 1,
                    "colors": [
                        "#F44336"
                    ],
                    "export": {
                        "enabled": true
                    },
                    "categoryAxis": {
                        "parseDates": true,
                        "dashLength": 1,
                        "minorGridEnabled": true,
                    },
                    "mouseWheelZoomEnabled": true,
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "[[value]]",
                            "bulletColor": "#FFFFFF",
                            "id": "AmGraph-1",
                            "hideBulletsCount": 50,
                            "title": "Total Tarikan",
                            "valueField": "total",
                            "useLineColorForBulletBorder": true,
                            "balloon":{
                                "drop":true,
                                "maxWidth" : 30
                            }
                        }
                    ],
                    "chartScrollbar": {
                        "autoGridCount": true,
                        "graph": "g1",
                        "backgroundColor" : "#F44336" ,
                        "scrollbarHeight": 40
                    },
                    "chartCursor": {
                        "limitToGraph":"g1"
                    },
                    "guides": [],
                    "valueAxes": [
                        {
                            "id": "ValueAxis-1",
                            "title": "Perolehan Tarikan"
                        }
                    ],

                    "allLabels": [],
                    "legend": {
                        "enabled": true,
                        "useGraphSettings": true
                    },
                    "titles": [
                        {
                            "id": "Title-1",
                            "size": 15,
                            "text": "Graphic Perolehan Tarikan per hari tahun <?php echo date('Y') ?>"
                        }
                    ],
                    "dataProvider": dayconfig
                }
            );
        } );
        $('*[data-href]').on("click",function(){
          window.location = $(this).data('href');
          return false;
        });
    </script>
