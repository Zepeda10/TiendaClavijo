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
                        <h4 class="page-title">Agregar Familia</h4>
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
                                <h5 class="card-title">Formulario de familias</h5>

                                <form action="../panel/agregarFamilia" method="POST" id="form">
                                    <div class="row my-3">
                                        <div class="col">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre"  placeholder="Nombre">
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#form").validate({
            rules: {
                nombre : {
                    required: true,
                    maxlength: 40
                }  
            },
            messages : {
                nombre: {
                    required: "Este campo es obligatorio",
                    maxlength: "No debe tener más de 40 caracteres"
                }  
            }
        });
    });
</script>