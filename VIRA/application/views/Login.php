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
    <link href="<?php echo base_url() ; ?>assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ; ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ; ?>assets/css/style-responsive.css" rel="stylesheet">

    <!-- =======================================================
      Template Name: Dashio
      Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
      Author: TemplateMag.com
      License: https://templatemag.com/license/
    ======================================================= -->
</head>
<?php
$notif = $this->session->flashdata('notif');
$type = $this->session->flashdata('type');
?>

<body>
<!-- **********************************************************************************************************************************************************
    MAIN CONTENT
    *********************************************************************************************************************************************************** -->
<div id="login-page">
    <div class="container">
        <form class="form-login" action="<?php echo base_url('index.php/Login/do_login'); ?>"method="post">
            <h2 class="form-login-heading"><i class="fa fa-user"></i> VIRA</h2>
            <div class="login-wrap">
                <input type="text" name="username" class="form-control" placeholder="NIK" autofocus>
                <br>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </span>
                </label>
                <input class="btn btn-theme btn-block" type="submit" value="LOGIN" style="margin-top: 15px">
            </div>
        </form>
    </div>
</div>


<!-- js placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url() ; ?>assets/lib/jquery/jquery.min.js"></script>
<script src="<?php echo base_url() ; ?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
<!--BACKSTRETCH-->
<!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
<script type="<?php echo base_url() ; ?>assets/text/javascript" src="lib/jquery.backstretch.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(document).ready( function () {
        if("<?php echo $type ; ?>" == "success"){
            swal("SUCCESS", "<?php echo $notif ; ?>", "success");
        }else if("<?php echo $type ; ?>" == "error"){
            swal("FAILED", "<?php echo $notif ; ?>", "error");
        }
    } );

    $.backstretch("img/login-bg.jpg", {
        speed: 500
    });
</script>
</body>

</html>
