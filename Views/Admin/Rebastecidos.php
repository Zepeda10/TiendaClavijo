<?php 
    
    include ("layouts/header.php");
    include ("layouts/sidebar.php");

?>

<style>
    .imagen{
        width: 50px;
        height: 50px;
        border-radius: 1px;
    }
</style>

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Productos rebastecidos</h4>
                        
                        <div class="ms-auto text-end">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="../panel/panel">Home</a></li>
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
                            
                                <h5 class="card-title">Tabla de productos rebastecidos</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Código de Barras</th>
                                                <th>Producto</th>                                                
                                                <th>Descripción</th>
                                                <th>Precio Compra</th>
                                                <th>Precio Venta</th>
                                                <th>Stock</th>
                                                <th>Estado</th>
                                                <th>Proveedor</th>
                                            </tr>
                                        </thead>
                                        <tbody>     
                                            <?php
                                                while( $row = sqlsrv_fetch_array( $data, SQLSRV_FETCH_ASSOC) ) {
                                                    echo "<tr>";
                                                    echo "<td>".$row['id']."</td>";
                                                    echo "<td>".$row['cod_barras']."</td>";
                                                    echo "<td>".$row['nombre']."</td>";
                                                    echo "<td>".$row['descripcion']."</td>";
                                                    echo "<td>".$row['precio_compra']."</td>";
                                                    echo "<td>".$row['precio_venta']."</td>";
                                                    echo "<td>".$row['stock']."</td>";
                                                    echo "<td>".$row['estado']."</td>";
                                                    echo "<td>".$row['id_proveedor']."</td>";
                                                    
                                                    echo "</tr>";
                                                }
                                            ?>                 
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>

<?php 
    
    include ("layouts/footer.php");

?>

<script src="../Assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../Assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../Assets/extra-libs/DataTables/datatables.min.js"></script>
    <script>
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable({
            "bLengthChange": false,
            "bFilter": false,
            "bInfo": false
        });
</script>