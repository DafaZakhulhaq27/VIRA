<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>VIRA</title>

  <!-- Favicons -->
  <link href="<?php echo base_url() ; ?>assets/img/VIRA.png" rel="icon">
  <link href="<?php echo base_url() ; ?>assets/img/VIRA.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url() ; ?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
    <link href="<?php echo base_url() ; ?>assets/lib/fancybox/jquery.fancybox.css" rel="stylesheet" />
  <link href="<?php echo base_url() ; ?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url() ; ?>assets/css/style.css" rel="stylesheet">
  <link href="<?php echo base_url() ; ?>assets/css/style-responsive.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
     <link href="https://cdn.datatables.net/responsive/2.2.3/css/dataTables.responsive.css" rel="stylesheet" />

    <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="<?php echo base_url() ; ?>assets/lib/chart-master/Chart.js"></script>
    <script src="<?php echo base_url() ; ?>assets/lib/jquery/jquery.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/amstock.js"></script>
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

</head>

<body>
<?php
$notif = $this->session->flashdata('notif');
$type = $this->session->flashdata('type');
?>

  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="<?php echo base_url() ?>Dashboard" class="logo">VIRA</a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
<!--        <ul class="nav top-menu">-->
<!--          <li id="header_notification_bar" class="dropdown">-->
<!--            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">-->
<!--              <i class="fa fa-bell-o"></i>-->
<!--              <span class="badge bg-warning">7</span>-->
<!--              </a>-->
<!--            <ul class="dropdown-menu extended notification">-->
<!--              <div class="notify-arrow notify-arrow-yellow"></div>-->
<!--              <li>-->
<!--                <p class="yellow">You have 7 new notifications</p>-->
<!--              </li>-->
<!--              <li>-->
<!--                <a href="index.html#">-->
<!--                  <span class="label label-success"><i class="fa fa-plus"></i></span>-->
<!--                  New User Registered.-->
<!--                  <span class="small italic">3 hrs.</span>-->
<!--                  </a>-->
<!--              </li>-->
<!--              <li>-->
<!--                <a href="index.html#">See all notifications</a>-->
<!--              </li>-->
<!--            </ul>-->
<!--          </li>-->
<!--        </ul>-->
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu" style="margin-top: 15px ; margin-right: 15px ;">
            <div class="btn-group">
                <button type="button" class="btn btn-theme dropdown-toggle" data-toggle="dropdown">
                    <?php echo $this->session->userdata('nama') ?> <i class="fa fa-user"></i> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu " role="menu">
                    <li><a href="#">Pengaturan</a></li>
                    <li><a href="<?php echo base_url() ?>Login/logout">Logout</a></li>
                </ul>
            </div>

        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <li class="sub-menu">
                <a href="javascript:;">
                    <i class="fa fa-desktop"></i>
                    <span>DASHBOARD</span>
                </a>
                <ul class="sub">
                    <li><a href="<?php echo base_url() ?>Dashboard">Dashboard PSB</a></li>
                    <li><a href="<?php echo base_url() ?>Data_tele/not_found">Dashboard MIGRASI</a></li>
                    <li><a href="<?php echo base_url() ?>Data_tele/not_found">Dashboard ASSURANCE</a></li>
                </ul>
            </li>

          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-inbox"></i>
              <span>DATA REKAP GRUP</span>
              </a>
            <ul class="sub">
                <li><a href="<?php echo base_url() ?>Data_tele/data_psb">DATA PSB</a></li>
                <li><a href="<?php echo base_url() ?>Data_Penutupan_ODP">DATA PENUTUPAN ODP</a></li>
                <li><a href="<?php echo base_url() ?>Data_kendala_psb">DATA KENDALA PSB</a></li>
                <li><a href="<?php echo base_url() ?>Data_kendala">DATA KENDALA</a></li>
                <li><a href="<?php echo base_url() ?>Data_live">DATA LIVE</a></li>
                <li><a href="<?php echo base_url() ?>Data_ggn">DATA GGN</a></li>                

            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-inbox"></i>
              <span>DATA TEKNISI</span>
              </a>
            <ul class="sub">
                <li><a href="<?php echo base_url() ?>Data_teknisi/absen_kediri/KDI">KEDIRI</a></li>
                <li><a href="<?php echo base_url() ?>Data_teknisi/absen_kediri/TUL">TULUNGAGUNG</a></li>
                <li><a href="<?php echo base_url() ?>Data_teknisi/absen_kediri/BLR">BLITAR</a></li>
                <li><a href="<?php echo base_url() ?>Data_teknisi/absen_kediri/NJK">NGANGJUK</a></li>

            </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper site-min-height">
<!--        <h3><i class="fa fa-angle-right"></i> Blank Page</h3>-->
        <div class="row mt">
          <div class="col-lg-12">
              <?php
              $this->load->view($main_view);
              ?>
          </div>
        </div>
      </section>
      <!-- /wrapper -->
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer" style="background-color: transparent">
      <div class="text-center">
        <p>
        </p>
        <div class="credits">
          <!--
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          -->
        </div>
        <a href="blank.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url() ; ?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url() ; ?>assets/lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="<?php echo base_url() ; ?>assets/lib/jquery.ui.touch-punch.min.js"></script>
  <script class="include" type="text/javascript" src="<?php echo base_url() ; ?>assets/lib/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url() ; ?>assets/lib/fancybox/jquery.fancybox.js"></script>
  <script src="<?php echo base_url() ; ?>assets/lib/jquery.scrollTo.min.js"></script>
  <script src="<?php echo base_url() ; ?>assets/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="<?php echo base_url() ; ?>assets/lib/common-scripts.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    $(document).ready( function () {
        $('.laporanpsb').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: 'th:not(:first-child)'
                        }
                        },
                ],
                } );

        $('.absen').DataTable() ;
        jQuery(".fancybox").fancybox();
        if("<?php echo $type ; ?>" == "success"){
            swal("SUCCESS", "<?php echo $notif ; ?>", "success");
        }else if("<?php echo $type ; ?>" == "error"){
            swal("FAILED", "<?php echo $notif ; ?>", "error");
        }
     } );
    function ubah_rekap(id)
    {
        $('#kode_teknisi1').empty();
        $('#nama_pelanggan').empty();
        $('#id_laporan_psb').empty();
        $('#alamat_pelanggan').empty();
        $('#inet').empty();
        $('#telp').empty();
        $('#sc').empty();
        $('#sn').empty();
        $('#mac').empty();
        $('#odp').empty();
        $('#port').empty();
        $('#red').empty();
        $('#dc').empty();
        $('#tr_code').empty();
        $('#tag_odp').empty();
        $('#tag_pelanggan').empty();
        $('#layanan').empty();
        $.getJSON('<?php echo base_url(); ?>Data_tele/get_rekap_by_id/' + id, function(data){
            $('#kode_teknisi1').val(data.nama_tim);
            $('#nama_pelanggan').val(data.nama_pelanggan);
            $('#id_laporan_psb').val(data.id_laporan_psb);
            $('#alamat_pelanggan').val(data.alamat_pelanggan);
            $('#inet').val(data.inet);
            $('#telp').val(data.voip);
            $('#sn').val(data.sn);
            $('#mac').val(data.mac_stb);
            $('#sc').val(data.sc);
            $('#odp').val(data.odp);
            $('#port').val(data.port);
            $('#red').val(data.redaman);
            $('#dc').val(data.dc);
            $('#tr_code').val(data.tr_code);
            $('#tag_odp').val(data.tag_odp);
            $('#tag_pelanggan').val(data.tag_pelanggan);
            $('#layanan').val(data.layanan);
            kode_teknisi = $('#kode_teknisi1').val();
            $('#kode_teknisi option').filter(function () { return $(this).html() == kode_teknisi }).attr('selected', true);
        });
    }
    function ubah_teknisi(id)
    {
        $('#nama_teknisi').empty();
        $('#id_teknisi').empty();
        $.getJSON('<?php echo base_url(); ?>Data_teknisi/get_teknisi_by_id/' + id, function(data){
            $('#nama_teknisi').val(data.nama_teknisi);
            $('#id_teknisi').val(data.id_teknisi);
        });
    }
    function hapus_rekap(id)
    {
        swal({
            title: "Yakin mau meenghapus rekap ? ",
            text: "nanti kalo kehapus gak bisa balik lagi lhoo",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?php echo base_url() ?>Data_tele/hapus_rekap/" + id;

                }
            });
    }
    function hapus_teknisi(id)
    {
        swal({
            title: "Yakin mau meenghapus data crew teknisi ? ",
            text: "nanti kalo kehapus gak bisa balik lagi lhoo",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?php echo base_url() ?>Data_teknisi/hapus_teknisi/" + id;

                }
            });
    }
    function hapus_penutupanODP(id)
    {
        swal({
            title: "Yakin mau meenghapus data penutupan odp ? ",
            text: "nanti kalo kehapus gak bisa balik lagi lhoo",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href = "<?php echo base_url() ?>Data_Penutupan_ODP/hapus_penutupanODP/" + id;

                }
            });
    }
</script>
</body>

</html>
