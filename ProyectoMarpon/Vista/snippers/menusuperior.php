
<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">

        <a href="index.php" class="logo">
        <h7>SoftMarpon</h7>
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->


    <div class="top-nav clearfix">
        <!--search & user info start-->
        <ul class="nav pull-right top-menu">

            <!-- user login dropdown start-->
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <img alt="" src="bucketadmin.themebucket.net/images/avatar1_small.jpg">
                    <span class="username"> <?php echo  ' ' .strtoupper($_SESSION[ 'Perfil']); ?></a></span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">

                    <li><a href="../Controller/UsuarioController.php?action=CerrarSession"><i class="fa fa-key"></i> Cerrar Sesion</a></li>
                </ul>
            </li>
            <!-- user login dropdown end -->

        </ul>
        <!--search & user info end-->
    </div>
</header>
<!--header end-->
<!--sidebar start-->