<aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="pt-4">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../panel/panel" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Dashboard</span></a></li>

                    <?php  if($_SESSION['rol'] == 1){ ?>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../panel/roles" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Roles</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../panel/familias" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Familias</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../clientes/clientes" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span
                                    class="hide-menu">Clientes</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../empleados/empleados" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span
                                    class="hide-menu">Empleados</span></a></li>
                    
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../proveedores/proveedores" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span
                                    class="hide-menu">Proveedores</span></a></li>

                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../delivery/delivery" aria-expanded="false"><i class="mdi mdi-border-inside"></i><span
                                    class="hide-menu">Delivery</span></a></li>

                    <?php  } ?>

                    <?php  if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 4 || $_SESSION['rol'] == 6 ){ ?>

                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                    class="hide-menu">Productos </span></a>
                        
                            <ul aria-expanded="false" class="collapse  first-level">

                            <?php  if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 4 ){ ?>

                                <li class="sidebar-item"><a href="../productos/productos" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Productos
                                        </span></a></li>
                            <?php  } ?>
                                <li class="sidebar-item"><a href="../productos/stock" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Productos sin stock
                                        </span></a></li>
                            <?php  if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 4 ){ ?>
                                <li class="sidebar-item"><a href="../productos/rebastecidos" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Productos rebastecidos
                                        </span></a></li>
                            <?php  } ?>
                            </ul>
                        </li>

                    <?php  } ?>
      

                    <?php  if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3 || $_SESSION['rol'] == 7 ){ ?>
                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                    class="hide-menu">Ventas Web </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">
                            <?php  if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 3  ){ ?>

                                <li class="sidebar-item"><a href="../pedidos/pedidos" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Pedidos
                                        </span></a></li>
                            <?php  } ?>
                                <li class="sidebar-item"><a href="../pedidos/confirmados" class="sidebar-link"><i
                                            class="mdi mdi-note-plus"></i><span class="hide-menu"> Pedidos confirmados
                                        </span></a></li>
                            </ul>
                        </li>

                    <?php  } ?>

                    <?php  if($_SESSION['rol'] == 1  ){ ?>
                        
                        <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                                href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-receipt"></i><span
                                    class="hide-menu">Ventas Físicas </span></a>
                            <ul aria-expanded="false" class="collapse  first-level">

                                <li class="sidebar-item"><a href="../ventas/ver_ventas" class="sidebar-link"><i
                                            class="mdi mdi-note-outline"></i><span class="hide-menu"> Ventas
                                        </span></a></li>        
                            </ul>
                        </li>

                    <?php  } ?>


                    <?php  if($_SESSION['rol'] == 1 || $_SESSION['rol'] == 5 ){ ?>

                      <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="../ventas/ventas" aria-expanded="false"><i class="mdi mdi-blur-linear"></i><span
                                    class="hide-menu">Vender</span></a></li>
                        
                    <?php  } ?>

                

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>