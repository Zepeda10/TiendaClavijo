<?php 

	session_start();//reanudando sesión

	if(!isset($_SESSION['usuario'])){
		header("Location: ../");
	}

    if($_SESSION['rol'] == 2){
        header("Location: ../");
    }



?>


<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title>Panel de Control</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../Assets/images/icono-logo.png">
    <!-- Custom CSS -->
    <link href="../../dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon -->
                        <b class="logo-icon ps-2">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../../Assets/images/logo-icon.png" alt="homepage" class="light-logo" />

                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text">
                            <!-- dark Logo text 
                            <img src="../Assets/images/logo-text.png" alt="homepage" class="light-logo" />
                            -->
                            <h4 class="mt-3">GRUPO CLAVIJO</h4>

                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                        <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                        <!-- Dark Logo icon -->
                        <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item d-none d-lg-block"><a
                                class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)"
                                data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                       
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->

                       
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->

                       
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <p>Hola usuario</p>
                            </a>
                           
                           
                        </li> 

                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../../Assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31">
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <!--
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user me-1 ms-1"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet me-1 ms-1"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email me-1 ms-1"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="ti-settings me-1 ms-1"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                -->
                                <a class="dropdown-item" href="../login/cerrar"><i
                                        class="fa fa-power-off me-1 ms-1"></i> Cerrar Sesión</a>
                                
                                <!--
                                <div class="ps-4 p-10"><a href="javascript:void(0)"
                                        class="btn btn-sm btn-success btn-rounded text-white">View Profile</a></div>
                                 -->
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../../panel/panel" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../../panel/roles" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Roles</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../../panel/familias" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Familias</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../../clientes/clientes" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span
                                    class="hide-menu">Clientes</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../../empleados/empleados" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span
                                    class="hide-menu">Empleados</span></a></li>


                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../../proveedores/proveedores" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span
                                    class="hide-menu">Proveedores</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../../delivery/delivery" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span
                                    class="hide-menu">Delivery</span></a></li>

                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                    class="hide-menu">Productos </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="../productos/productos" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Productos
                                        </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Productos sin stock
                                        </span></a></li>

                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Productos rebastecidos
                                        </span></a></li>
                            </ul>
                        </li>
      

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                    class="hide-menu">Ventas Web </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                                <li class="sidebar-item"><a href="form-basic.html" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Pedidos
                                        </span></a></li>
                                <li class="sidebar-item"><a href="form-wizard.html" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Detalle Pedidos
                                        </span></a></li>
                            </ul>
                        </li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="grid.html" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span
                                    class="hide-menu">Pedidos confirmados</span></a></li>

                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="grid.html" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span
                                    class="hide-menu">Vender</span></a></li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>


<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Editar Producto</h4>
                        <button class="btn btn-success mx-3 rounded"><a href="javascript: history.go(-1)" class="link-light">Regresar</a></button>
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../../panel/panel">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Inicio</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                    <div class="card">        
                            <div class="card-body">                  
                                <h5 class="card-title">Formulario de productos</h5>

                                <form action="../../productos/update" method="POST">
                                <?php  while( $row = sqlsrv_fetch_array( $data['producto'], SQLSRV_FETCH_ASSOC) ) { ?>
                                    <input id="modificar" type="hidden" name="id" value="<?= $row['id']; ?>">

                                    <div class="row my-3">
                                        <div class="col">
                                            <label for="nombre">Nombre del producto</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"  value="<?= $row['nombre']; ?>">
                                        </div>
                                        <div class="col">
                                            <label for="cod_barras">Código de Barras</label>
                                            <input type="text" class="form-control" id="cod_barras" name="cod_barras" value="<?= $row['cod_barras']; ?>">
                                        </div>
                                    </div>
                            
                                    <div class="row my-3">
                                        <div class="col">
                                            <label for="precio_compra">Precio Compra</label>
                                            <input type="text" class="form-control" id="precio_compra" name="precio_compra"  value="<?= $row['precio_compra']; ?>">
                                        </div>
                                        <div class="col">
                                            <label for="precio_venta">Precio Venta</label>
                                            <input type="text" class="form-control" id="precio_venta" name="precio_venta"  value="<?= $row['precio_venta']; ?>">
                                        </div>
                                        <div class="col">
                                            <label for="stock">Stock</label>
                                            <input type="number" class="form-control" id="stock" name="stock" value="<?= $row['stock']; ?>">
                                        </div>
                                    </div>

                                    <div class="row my-3">
                                        <div class="col">
                                            <label for="descripcion">Descripción</label>
                                            <textarea  type="text" class="form-control" id="descripcion" name="descripcion" rows="3" ><?= $row['descripcion']; ?></textarea>                           
                                        </div>                                       
                                    </div>


                                    <div class="row my-3">
                                        <div class="col">
                                            <label for="estado">Estado</label>
                                            <select class="form-select" name="estado" aria-label="Default select example">
                                                <option value="1">1</option>
                                                <option value="2">0</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="proveedor">Proveedor</label>
                                            <select class="form-select" name="id_proveedor" aria-label="Default select example">
                                            <?php
                                                while( $row = sqlsrv_fetch_array( $data['prov'], SQLSRV_FETCH_ASSOC) ) {
                                                    echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <label for="proveedor">Familia</label>
                                            <select class="form-select" name="id_familia" aria-label="Default select example">
                                            <?php
                                                while( $row = sqlsrv_fetch_array( $data['fam'], SQLSRV_FETCH_ASSOC) ) {
                                                    echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                                                }
                                            ?>
                                            </select>
                                        </div>                                     
                                    </div>

                                   
                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                </form>

                                <?php  } ?>
                                
                                

                            </div>
                        </div>
                    </div>
            </div>

            <footer class="footer text-center">
                Todos los derechos reservados. Desarrollado para <a
                    href="#">Grupo Clavijo</a>.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../../Assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../../Assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../../Assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../../Assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../../dist/js/custom.min.js"></script>
</body>

</html>