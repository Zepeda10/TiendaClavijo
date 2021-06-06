<?php 
    
    include ("layouts/header.php");
    include ("layouts/sidebar.php");

?>
<script languaje="Javascript">

    function confirmaEliminar(e){
        var res = confirm("¿Desea eliminar el registro?");
        if(res == false){
            e.preventDefault();
        }
    }


</script>

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
                        <h4 class="page-title">Ventas físicas</h4>
                       
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
                            
                                <h5 class="card-title">Tabla de ventas físicas</h5>
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Folio</th>
                                                <th>Total</th>                                                
                                                <th>Id Usuario</th>
                                                <th>Fecha</th>
                                                <th>Detalles</th>
                                            </tr>
                                        </thead>
                                        <tbody>     
                                            <?php
                                                while( $row = sqlsrv_fetch_array( $data, SQLSRV_FETCH_ASSOC) ) {
                                                    echo "<tr>";
                                                    echo "<td>".$row['id']."</td>";
                                                    echo "<td>".$row['folio']."</td>";
                                                    echo "<td>".$row['total']."</td>";
                                                    echo "<td>".$row['id_user']."</td>";
                                                    echo "<td>".$row['fecha']->format('Y-m-d H:i:s')."</td>"; 
                                                    echo "<td><a href='../ventas/ver_detalles/".$row['id']."'>Detalles</a></td>";                                      
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
