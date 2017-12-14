<?php
error_reporting(0);
require"../Controller/IngresosController.php";
require  "../Controller/ProveedorCtrl.php";
require  "../Controller/TipoMateriaController.php";

?>
<?php

session_start();
if(empty($_SESSION['idUsuarios'])){
    header("Location: login/index.php");
}else?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bucketadmin.themebucket.net/form_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2017 19:18:18 GMT -->
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="bucketadmin.themebucket.net/images/favicon.html">

    <title>Bienvenido</title>

    <!--Core CSS -->
    <link href="bucketadmin.themebucket.net/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/css/bootstrap-reset.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="bucketadmin.themebucket.net/css/style.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="bucketadmin.themebucket.net/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="container" >
    <!--header start-->
    <?php require("snippers/menuizquierdo.php");?>


    <?php require("snippers/menusuperior.php");?>

    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <!-- Main content -->
            <section class="content">

                <div class="row">
                    <div class="col-lg-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Editar Ingresos
                                <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                            </header>
                            <div class="panel-body">

                                <?php if(!empty($_GET['respuesta'])){ ?>
                                    <?php if ($_GET['respuesta'] == "correcto"){ ?>
                                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <strong>El ingreso!</strong> se ha actualizado correctamente.
                                        </div>
                                    <?php }else {?>
                                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                            </button>
                                            <strong>Error!</strong> No se pudo ingresar el ingreos intentalo nuevamente!!
                                        </div>
                                    <?php } ?>
                                <?php } ?>

                                <?php if(!empty($_GET["id"]) && isset($_GET["id"])){ ?>
                                <?php
                                $DataIngresos = IngresosController::buscarID($_GET["id"]);

                                ?>

                                <div class="panel-body">
                                    <form  class="form-horizontal "   method="post" action="../Controller/IngresosController.php?action=editar" novalidate >

                                        <div class="form-group ">
                                            <label for="Cantidad" class="control-label col-lg-4">Cantidad</label>
                                            <div class="col-lg-4">
                                                <input id="idIngresos" value="<?php echo $DataIngresos->getIdIngresos(); ?>" name="idIngresos" hidden required="required" type="text">

                                                <input class=" form-control" id="Cantidad" name="Cantidad" value="<?php echo $DataIngresos->getCantidad(); ?>" type="number"  min="1" required/>
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <label class="col-sm-3 control-label col-md-4" for="Tipo_Materia">Tipo de Materia</label>
                                            <div class="col-lg-6">
                                                <?php echo TipoMateriaController::selectTipoMateria(true,"Tipo_Materia","Tipo_Materia","materia" ); ?>
                                            </div>
                                        </div>
                                        <div class=" form-group">
                                            <label class="col-sm-3 control-label col-md-4" for="Proveedor">Proveedor</label>
                                            <div class="col-lg-6">
                                                <?php echo ProveedorCtrl::selectProveedor (true,"Proveedor","Proveedor","Nuevos" ); ?>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-4">Fecha</label>
                                            <div class="col-md-4 col-xs-11">
                                                <input id="Fecha" name="Fecha" class="form-control form-control-inline input-medium default-date-picker"  value="<?php echo date("Y-n-j");?>" readonly />

                                            </div>
                                        </div>


                                        <div class="form-group ">
                                            <label for="Valor_Unitario" class="control-label col-lg-4">Valor</label>
                                            <div class="col-lg-4">
                                                <input class=" form-control" id="Valor_Unitario" name="Valor_Unitario" value="<?php echo $DataIngresos->getValorUnitario(); ?>" type="number" min="1.000" max="1.000.000" required/>
                                            </div>
                                        </div>





                                        <div class="form-group">
                                            <div class="col-lg-offset-3 col-lg-6">
                                                <button class="btn btn-primary" type="submit">Guardar</button>
                                            </div>
                                        </div>
                                    </form>

                                    <?php } ?>



                                </div>

                            </div>
                        </section>
                    </div>
                </div>
                <!-- page end-->
            </section>
        </section>
        <!--main content end-->
        <!--right sidebar start-->

        <!--right sidebar end-->

    </section>

    <!-- Placed js at the end of the document so the pages load faster -->

    <!--Core js-->
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

    <!--common script init for all pages-->
    <script src="bucketadmin.themebucket.net/js/scripts.js"></script>
    <!--this page script-->
    <script src="bucketadmin.themebucket.net/js/validation-init.js"></script>

</body>

<!-- Mirrored from bucketadmin.themebucket.net/form_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2017 19:18:19 GMT -->
</html>

