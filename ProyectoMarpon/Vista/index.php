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
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="bucketadmin.themebucket.net/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/css/bootstrap-reset.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="bucketadmin.themebucket.net/css/style.css" rel="stylesheet">
    <link href="bucketadmin.themebucket.net/css/style-responsive.css" rel="stylesheet" />
    <script type="application/x-javascript">
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="//fonts.googleapis.com/css?family=Dosis:300,400,500,600,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
          rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="bucketadmin.themebucket.net/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <link href="./assetsslider/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./assetsslider/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="./assetsslider/css/demo.css" rel="stylesheet" />
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
            <div class="section" id="carousel">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block" src="assetsslider/img/bg1.jpg" alt="First slide">
                                        <div class="carousel-caption d-none d-md-block">

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="assetsslider/img/bg3.jpg" alt="Second slide">
                                        <div class="carousel-caption d-none d-md-block">

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="assetsslider/img/bg4.jpg" alt="Third slide">
                                        <div class="carousel-caption d-none d-md-block">

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img class="d-block" src="assetsslider/img/bg5.jpg" alt="fourth slide">
                                        <div class="carousel-caption d-none d-md-block">

                                        </div>
                                    </div>

                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <i class="now-ui-icons arrows-1_minimal-left"></i>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <i class="now-ui-icons arrows-1_minimal-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
    <script src="js/responsiveslides.min.js"></script>
    <script>
        // You can also use "$(window).load(function() {"
        $(function () {
            // Slideshow 4
            $("#slider4").responsiveSlides({
                auto: true,
                pager: true,
                nav: false,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                    $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                    $('.events').append("<li>after event fired.</li>");
                }
            });

        });
    </script>
    <script src="./assetsslider/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
    <script src="./assetsslider/js/core/popper.min.js" type="text/javascript"></script>
    <script src="./assetsslider/js/core/bootstrap.min.js" type="text/javascript"></script>
    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="./assetsslider/js/plugins/bootstrap-switch.js"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="./assetsslider/js/plugins/nouislider.min.js" type="text/javascript"></script>
    <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
    <script src="./assetsslider/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
    <script src="./assetsslider/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            // the body of this function is in assets/js/now-ui-kit.js
            nowuiKit.initSliders();
        });

        function scrollToDownload() {

            if ($('.section-download').length != 0) {
                $("html, body").animate({
                    scrollTop: $('.section-download').offset().top
                }, 1000);
            }
        }
    </script>
    <!-- stats -->

</body>

<!-- Mirrored from bucketadmin.themebucket.net/form_validation.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Aug 2017 19:18:19 GMT -->
</html>
