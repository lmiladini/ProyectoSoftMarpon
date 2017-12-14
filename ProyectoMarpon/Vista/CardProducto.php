<?php

session_start();
if(empty($_SESSION['idUsuarios'])){
    header("Location: login/index.php");
}else if($_SESSION["Perfil"] == "Empleado"){
    header("Location: ../Controller/UsuarioController.php?action=CerrarSession");
}else?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>3D Fold out reveal</title>
    <link href="bucketadmin.themebucket.net/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/css/bootstrap-reset.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="bucketadmin.themebucket.net/js/bootstrap-datepicker/css/datepicker.css" />
    <link rel="stylesheet" type="text/css" href="bucketadmin.themebucket.net/js/bootstrap-timepicker/css/timepicker.css" />
    <link rel="stylesheet" type="text/css" href="bucketadmin.themebucket.net/js/bootstrap-colorpicker/css/colorpicker.css" />
    <link rel="stylesheet" type="text/css" href="bucketadmin.themebucket.net/js/bootstrap-daterangepicker/daterangepicker-bs3.css" />
    <link rel="stylesheet" type="text/css" href="bucketadmin.themebucket.net/js/bootstrap-datetimepicker/css/datetimepicker.css" />

    <link rel="stylesheet" type="text/css" href="bucketadmin.themebucket.net/js/jquery-multi-select/css/multi-select.css" />
    <link rel="stylesheet" type="text/css" href="bucketadmin.themebucket.net/js/jquery-tags-input/jquery.tagsinput.css" />
    <link href="bucketadmin.themebucket.net/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/css/bootstrap-reset.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="bucketadmin.themebucket.net/css/style.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/css/style-responsive.css" rel="stylesheet" />

    <script src="bucketadmin.themebucket.net/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">


    <link rel="stylesheet" href="Card/css/style.css">


</head>

<body>
<section id="container" >

    <?php require("snippers/menuizquierdo.php");?>


    <?php require("snippers/menusuperior.php");?>

    <section id="main-content">
        <section class="wrapper">

            <div class="row">

                <div class="panel-body">
                    <div class="col-lg-14">

                        <?php
                        $conexion = mysqli_connect("localhost", "root", "");
                        mysqli_select_db($conexion , "marpo");
                        $query_offers = "SELECT * FROM Producto";

                        $offers = mysqli_query($conexion,$query_offers);
                        $var = 0;

                        while ($row = $offers->fetch_array()) {?>
                            <div class="card">
                                <img src="<?php echo $row['Foto'];
                                ?>">
                                <div class="card-title">
                                    <h2>
                                        <?php echo $row['Nombre'];
                                        ?>
                                        <small><?php echo $row['Precio']; ?></small>
                                    </h2>
                                </div>

                            </div>
                        <?php }
                        ?>


                    </div>
                </div>
            </div>
        </section>
    </section>
</section>
</div>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js'></script>

<script src="Card/js/index.js"></script>

<script src="bucketadmin.themebucket.net/js/jquery.js"></script>
<script src="bucketadmin.themebucket.net/js/jquery-1.10.2.min.js"></script>
<script src="bucketadmin.themebucket.net/bs3/js/bootstrap.min.js"></script>
<script src="bucketadmin.themebucket.net/js/jquery-ui-1.9.2.custom.min.js"></script>
<script class="include" type="text/javascript" src="bucketadmin.themebucket.net/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="bucketadmin.themebucket.net/js/jquery.scrollTo.min.js"></script>
<script src="bucketadmin.themebucket.net/js/easypiechart/jquery.easypiechart.js"></script>
<script src="bucketadmin.themebucket.net/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="bucketadmin.themebucket.net/js/jquery.nicescroll.js"></script>
<script src="bucketadmin.themebucket.net/js/jquery.nicescroll.js"></script>

<script src="bucketadmin.themebucket.net/js/bootstrap-switch.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>

<script type="text/javascript" src="bucketadmin.themebucket.net/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>

<script type="text/javascript" src="bucketadmin.themebucket.net/js/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/jquery-multi-select/js/jquery.quicksearch.js"></script>
<script src="bucketadmin.themebucket.net/js/jquery.js"></script>
<script src="bucketadmin.themebucket.net/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="bucketadmin.themebucket.net/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="bucketadmin.themebucket.net/js/jquery.scrollTo.min.js"></script>
<script src="bucketadmin.themebucket.net/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="bucketadmin.themebucket.net/js/jquery.nicescroll.js"></script>
<!--Easy Pie Chart-->
<script src="bucketadmin.themebucket.net/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="bucketadmin.themebucket.net/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="bucketadmin.themebucket.net/js/flot-chart/jquery.flot.js"></script>
<script src="bucketadmin.themebucket.net/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="bucketadmin.themebucket.net/js/flot-chart/jquery.flot.resize.js"></script>
<script src="bucketadmin.themebucket.net/js/flot-chart/jquery.flot.pie.resize.js"></script>


<script type="text/javascript" src="bucketadmin.themebucket.net/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>

<script src="bucketadmin.themebucket.net/js/jquery-tags-input/jquery.tagsinput.js"></script>

<!--common script init for all pages-->
<script src="bucketadmin.themebucket.net/js/scripts.js"></script>
<!--this page script-->
<script src="bucketadmin.themebucket.net/js/validation-init.js"></script>
<script src="bucketadmin.themebucket.net/js/scripts.js"></script>

<script src="bucketadmin.themebucket.net/js/toggle-init.js"></script>

<script src="bucketadmin.themebucket.net/js/advanced-form.js"></script>
<!--Easy Pie Chart-->
<script src="bucketadmin.themebucket.net/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="bucketadmin.themebucket.net/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="bucketadmin.themebucket.net/js/flot-chart/jquery.flot.js"></script>
<script src="bucketadmin.themebucket.net/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="bucketadmin.themebucket.net/js/flot-chart/jquery.flot.resize.js"></script>


</body>
</html>