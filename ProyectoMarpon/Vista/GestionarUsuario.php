<?php

error_reporting(0);
require "../Modelo/Usuario.php";
?>
<?php

session_start();
if(empty($_SESSION['idUsuarios'])){
    header("Location: login/index.php");
}else if($_SESSION["Perfil"] == "Empleado"){
    header("Location: ../Controller/UsuarioController.php?action=CerrarSession");
}else?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bucketadmin.themebucket.net/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2017 19:18:03 GMT -->
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="bucketadmin.themebucket.net/images/favicon.html">

    <title>Gestionar</title>

    <!--Core CSS -->
    <link href="bucketadmin.themebucket.net/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/css/bootstrap-reset.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="bucketadmin.themebucket.net/js/data-tables/DT_bootstrap.css" />

    <!-- Custom styles for this template -->
    <link href="bucketadmin.themebucket.net/css/style.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="js/ie8-responsive-file-warning.js"></script><![endif]-->

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

    <!--header end-->

    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->

            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Gestionar usuarios
                            <span class="tools pull-right">
                            <a href="javascript:;" class="fa fa-chevron-down"></a>
                            <a href="javascript:;" class="fa fa-cog"></a>
                            <a href="javascript:;" class="fa fa-times"></a>
                         </span>
                        </header>
                        <div class="panel-body">
                            <div class="adv-table editable-table ">
                                <div class="clearfix">

                                </div>

                            </div>
                            <div class="space15"></div>
                            <table class="table table-striped table-hover table-bordered" id="editable-sample">
                                <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Documento</th>

                                    <th>Perfil</th>

                                    <th>Estado</th>
                                    <th>Acciones</th>



                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $arrUsuario = Usuario::getAll();
                                foreach ( $arrUsuario as $user){
                                    ?>
                                    <tr>
                                        <td><?php echo  $user->getEmail(); ?></td>
                                        <td><?php echo $user->getDocumento(); ?></td>
                                        <td><?php echo $user->getPerfil(); ?></td>
                                        <td><?php echo $user->getEstado(); ?></td>

                                        <td>
                                            <a href="editarUsuario.php?id=<?php echo $user->getIdUsuarios(); ?>" type="button" data-toggle="tooltip" title="Actualizar" class="btn docs-tooltip btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                                            <?php if ( $user->getEstado() != "Activo"){ ?>
                                                <a type="button" href="../Controller/UsuarioController.php?action=ActivarUsuario&IdUsuarios=<?php echo  $user->getIdUsuarios(); ?>" data-toggle="tooltip" title='Estado:<?php echo  $user->getEstado(); ?>'  class="btn docs-tooltip btn-danger btn-xs"> <i class="fa fa-times-circle-o"></i></a>

                                            <?php }else{ ?>
                                                <a type="button" href="../Controller/UsuarioController.php?action=InactivarUsuario&IdUsuarios=<?php echo  $user->getIdUsuarios(); ?>" data-toggle="tooltip" title='Estado:<?php echo  $user->getEstado(); ?>' class="btn docs-tooltip btn-success btn-xs"> <i class="fa fa-check-square-o"></i></a>
                                            <?php } ?>
                                        </td>


                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                </div>
        </section>
        </div>
        </div>
        <!-- page end-->
    </section>
</section>


</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="bucketadmin.themebucket.net/js/jquery-1.10.2.min.js"></script>
<script src="bucketadmin.themebucket.net/js/jquery-migrate.js"></script>

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

<script type="text/javascript" src="bucketadmin.themebucket.net/js/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/data-tables/DT_bootstrap.js"></script>

<!--common script init for all pages-->
<script src="bucketadmin.themebucket.net/js/scripts.js"></script>

<!--script for this page only-->
<script src="bucketadmin.themebucket.net/js/table-editable.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>

</body>

<!-- Mirrored from bucketadmin.themebucket.net/editable_table.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2017 19:18:09 GMT -->
</html>