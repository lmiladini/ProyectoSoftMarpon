
<aside>
    <div id="sidebar" class="nav-collapse">

        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <div class="side-mini-graph">
                <div class="target-sell">
                </div>
            </div>
            <ul class="sidebar-menu" id="nav-accordion">

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-group"></i>


                        <?php if (($_SESSION["Perfil"])=="Administrador" ){
                        ?>


                        <span> Cliente</span>
                    </a>
                    <ul class="sub">
                        <li><a href="../Vista/CreateCliente.php">Registrar</a></li>
                        <li><a href="../Vista/GestionarCliente.php">Ver</a></li>


                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-group"></i>
                        <span> Venta</span>
                    </a>
                    <ul class="sub">

                        <li><a href="../Vista/CreateVenta.php">Registrar 2</a></li>
                        <li><a href="../Vista/listDetalle.php">Ver</a></li>



                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-group"></i>
                        <span> Producto</span>
                    </a>
                    <ul class="sub">
                        <li><a href="../Vista/Producto.php">Registrar</a></li>
                        <li><a href="../Vista/listPro.php">Ver</a></li>
                        <li><a href="../Vista/CardProducto.php">Ver todos los productos </a></li>

                    </ul>
                </li>


                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-group"></i>
                        <span> Proveedor</span>
                    </a>
                    <ul class="sub">
                        <li><a href="../Vista/ProveedorCrear.php">Registrar</a></li>
                        <li><a href="../Vista/GestinarProveedor.php">Ver</a></li>

                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-group"></i>
                        <span> Gastos</span>
                    </a>
                    <ul class="sub">
                        <li><a href="../Vista/GastosCrear.php">Registrar</a></li>
                        <li><a href="../Vista/GestionarGastos.php">Ver</a></li>

                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-group"></i>
                        <span> Usuario</span>
                    </a>
                    <ul class="sub">
                        <li><a href="../Vista/CreateUsuario.php">Registrar</a></li>
                        <li><a href="../Vista/GestionarUsuario.php">Ver</a></li>

                    </ul>


                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-group"></i>
                        <?php   } ?>
                        <span> Tipo de Materia</span>
                            </a>
                            <ul class="sub">
                                <li><a href="../Vista/CreateTipoMateria.php">Registrar</a></li>
                                <li><a href="../Vista/GestionarTipoMateria.php">Ver</a></li>

                            </ul>
                        </li>

                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-group"></i>
                                <span> Ingresos</span>
                            </a>
                            <ul class="sub">
                                <li><a href="../Vista/CreateIngresos.php">Registrar</a></li>
                                <li><a href="../Vista/GestionarIngresos.php">Ver</a></li>

                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                                <i class="fa fa-group"></i>
                                <span>Salidas</span>
                            </a>
                            <ul class="sub">
                                <li><a href="../Vista/CreateSalidas.php">Registrar</a></li>
                                <li><a href="../Vista/GestionarIngresos.php">Ver</a></li>

                            </ul>
                        </li>








            </ul>




        </div>
    </div>

      <!-- sidebar menu end-->

</aside>
