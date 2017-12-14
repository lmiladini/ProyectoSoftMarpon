<?php

session_start();
if(empty($_SESSION['idUsuarios'])){
    header("Location: login/index.php");
}else if($_SESSION["Perfil"] == "Empleado"){
    header("Location: ../Controller/UsuarioController.php?action=CerrarSession");
}else

?>
<html lang="en">

<!-- Mirrored from bucketadmin.themebucket.net/form_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2017 19:18:18 GMT -->
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="bucketadmin.themebucket.net/images/favicon.html">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Bienvenido</title>

    <!--Core CSS -->



    <link href="bucketadmin.themebucket.net/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/css/bootstrap-reset.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="bucketadmin.themebucket.net/css/style.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/css/style-responsive.css" rel="stylesheet" />
    <link href="bucketadmin.themebucket.net/js/bootstrap-imageupload/dist/css/bootstrap-imageupload.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="bucketadmin.themebucket.net/js/bootstrap-fileupload/bootstrap-fileupload.css" />
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
            <div id="alertas">
                <?php if(!empty($_GET['respuesta'])){ ?>
                    <?php if ($_GET['respuesta'] == "correcto"){ ?>
                        <div class="alert alert-success alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>El usuario!</strong> se ha creado correctamente.
                        </div>
                    <?php }else {?>
                        <div class="alert alert-danger alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Error!</strong> No se pudo ingresar la persona intentalo nuevamente!!
                        </div>
                    <?php } ?>
                <?php } ?>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Registrar Usuario
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                             </span>
                        </header>

                        <div class="panel-body">
                            <div class="form">
                                <form   class="cmxform form-horizontal " enctype="multipart/form-data" data-toggle="validation"  method="post" action="../Controller/UsuarioController.php?action=crear">



                                    <div class="form-group ">
                                        <label for="Email" class="control-label col-lg-4">Correo </label>
                                        <div class="col-lg-4">
                                            <input class="form-control " id="Email" type="Email" name="Email" maxlength="50" placeholder="Ingrese su correo electronico" required />
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>


                                    <div class="form-group ">
                                        <label for="Documento" class="control-label col-lg-4">Documento</label>
                                        <div id="resultado"></div>
                                        <div class="col-lg-4">
                                            <input class="form-control " id="Documento" name="Documento" type="number"  max="3000000000" min="1100000" maxlength="12" minlength="7"  placeholder="Ingrese su Documento" required />
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="Password" class="control-label col-lg-4">Contraseña</label>
                                        <div class="col-lg-4">
                                            <input class="form-control" data-minlength="6" id="Password" name="Password" type="password" min="20" max="30" placeholder="Ingrese su contraseña" required  />
                                        </div>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="Estado" class="control-label col-lg-4">Estado</label>
                                        <div class="col-lg-4">
                                            <select id="Estado" name="Estado" class="form-control m-bot15">
                                                <option>Seleccione</option>
                                                <option value="1">Activo</option>
                                                <option value="2">Inactivo</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <label for="Perfil" class="control-label col-lg-4">Tipo Perfil</label>
                                        <div class="col-lg-4">
                                            <select id="Perfil" name="Perfil" class="form-control m-bot15">
                                                <option>Seleccione</option>
                                                <option value="1">Administrador</option>
                                                <option value="2">Empleado</option>

                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-lg-offset-7 col-lg-6">
                                            <button class="btn btn-primary" type="submit">Registrar</button>
                                        </div>
                                    </div>

                                </form>
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
    <script type="text/javascript">
        $(document).ready(function(){
            var consulta;
            $("#Documento").focus();
            $("#Documento").keyup(function(e){
                consulta = $("#Documento").val();
                $("#resultado").delay(1000).queue(function(n) {
                    $("#resultado").html('<img src="ajax-loader.gif" />');
                    $.ajax({
                        type: "POST",
                        url: "../Controller/UsuarioController.php?action=validacion",
                        data: "Documento="+consulta,
                        dataType: "html",
                        error: function(){
                            alert("error petición ajax");
                        },
                        success: function(data){
                            if(data == "<span style='font-weight:bold;color:red;'> ya existe</span>"){
                                $('#enviar').attr("disabled", true);
                            } else if(data == "<span style='font-weight:bold;color:green;'>Disponibles</span>"){
                                $('#enviar').attr("disabled", false);
                            }
                            $("#resultado").html(data);
                            n();
                        }
                    });

                });

            });

        });
    </script>
<!--Core js-->
<script src="bucketadmin.themebucket.net/js/jquery.js"></script>
<script src="bucketadmin.themebucket.net/bs3/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="bucketadmin.themebucket.net/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="bucketadmin.themebucket.net/js/jquery.scrollTo.min.js"></script>
<script src="bucketadmin.themebucket.net/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="bucketadmin.themebucket.net/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script src="bucketadmin.themebucket.net/js/bootstrap-imageupload/dist/js/bootstrap-imageupload.js"></script>
<script>
    $('.imageupload').imageupload({
        allowedFormats: [ 'jpg', 'jpeg', 'png', 'gif' ],
        maxWidth : 250,
        maxHeight : 250,
        maxFileSizeKb: 2048
    });

</script>
<!--Easy Pie Chart-->
<script src="bucketadmin.themebucket.net/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="bucketadmin.themebucket.net/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="bucketadmin.themebucket.net/js/flot-chart/jquery.flot.js"></script>
<script src="bucketadmin.themebucket.net/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="bucketadmin.themebucket.net/js/flot-chart/jquery.flot.resize.js"></script>
<script src="bucketadmin.themebucket.net/js/flot-chart/jquery.flot.pie.resize.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/bootstrap-validator/dist/validator.min.js"></script>
<script type="text/javascript" src="bucketadmin.themebucket.net/js/jquery.validate.min.js"></script>

<!--common script init for all pages-->
<script src="bucketadmin.themebucket.net/js/scripts.js"></script>
<!--this page script-->
<script src="bucketadmin.themebucket.net/js/validation-init.js"></script>


</body>

<!-- Mirrored from bucketadmin.themebucket.net/form_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2017 19:18:19 GMT -->
</html>
