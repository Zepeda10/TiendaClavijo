<?php 
    
    include ("layouts/header.php");
    include ("layouts/sidebar.php");

?>

<div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Agregar Producto</h4>
                        <button class="btn btn-success mx-3 rounded"><a href="javascript: history.go(-1)" class="link-light">Regresar</a></button>
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
                                <h5 class="card-title">Formulario de productos</h5>

                                <form action="../productos/agregar" method="POST" enctype="multipart/form-data">
                                    <div class="row my-3">
                                        <div class="col">
                                            <label for="nombre">Nombre del producto</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Nombre">
                                        </div>
                                        <div class="col">
                                            <label for="cod_barras">Código de Barras</label>
                                            <input type="text" class="form-control" id="cod_barras" name="cod_barras" placeholder="Código de Barras">
                                        </div>
                                    </div>

                                    <div class="row my-3">
                                        <div class="col">
                                            <label for="precio_compra">Precio Compra</label>
                                            <input type="text" class="form-control" id="precio_compra" name="precio_compra" placeholder="Precio Compra">
                                        </div>
                                        <div class="col">
                                            <label for="precio_venta">Precio Venta</label>
                                            <input type="text" class="form-control" id="precio_venta" name="precio_venta" placeholder="Precio Venta">
                                        </div>
                                        <div class="col">
                                            <label for="stock">Stock</label>
                                            <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock">
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

                                    <div class="row my-3">
                                        <div class="col">
                                            <label for="descripcion">Descripción</label>
                                            <textarea  type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" rows="3"></textarea>                           
                                        </div>

                                        <div class="col my-auto">
                                            <small id="passwordHelpBlock" class="form-text text-muted">
                                                Tamaño límite para la imagen: 2MB
                                            </small>						
                                            <input class="form-control" type="file" name="imagen"  id="imagen">
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary">Aceptar</button>
                                </form>
                                
                                

                            </div>
                        </div>
                    </div>
            </div>

<?php 
    
    include ("layouts/footer.php");

?>