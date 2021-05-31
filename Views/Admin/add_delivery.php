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
                        <h4 class="page-title">Agregar delivery</h4>
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
                                <h5 class="card-title">Formulario de delivery</h5>

                                <form action="../delivery/agregarDelivery" method="POST" class="mt-5" id="form">
                                    <div class="row my-4">
                                        <div class="col">
                                            <input type="text" name="nombre" class="form-control border border-secondary" placeholder="Nombre">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="apellidos" class="form-control border border-secondary" placeholder="Apellidos">
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col">
                                            <input type="text" name="dni" class="form-control border border-secondary" placeholder="DNI">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="celular" class="form-control border border-secondary" placeholder="Celular">
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col">
                                            <textarea class="form-control border border-secondary" name="direccion" id="exampleFormControlTextarea1" rows="3" placeholder="Dirección"></textarea>
                                        </div>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col">
                                            <input type="text" class="form-control border border-secondary" name="email" placeholder="Email">
                                        </div>
                                        <div class="col">
                                            <input type="text" class="form-control border border-secondary" name="pass" placeholder="Contraseña">
                                        </div>
                                    </div>
                                <button type="submit" class="btn btn-success">Aceptar</button>
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
                },
                apellidos : {
                    required: true,
                    maxlength: 60
                },
                dni : {
                    required: true,
                    maxlength: 15
                },
                celular : {
                    required: true,
                    maxlength: 15,
                    number: true
                },
                direccion : {
                    required: true,
                    maxlength: 120
                },
                email : {
                    required: true,
                    maxlength: 40,
                    email: true
                },
                pass : {
                    required: true,
                    maxlength: 40
                }  
            },
            messages : {
                nombre: {
                    required: "Este campo es obligatorio",
                    maxlength: "No debe tener más de 40 caracteres"
                },
                apellidos : {
                    required: "Este campo es obligatorio",
                    maxlength: "No debe tener más de 60 caracteres"
                },
                dni : {
                    required: "Este campo es obligatorio",
                    maxlength: "No debe tener más de 15 caracteres"
                },
                celular : {
                    required: "Este campo es obligatorio",
                    maxlength: "No debe tener más de 15 caracteres",
                    number: "Solo debe contener números"
                },
                direccion : {
                    required: "Este campo es obligatorio",
                    maxlength: "No debe tener más de 120 caracteres",           
                },
                email : {
                    required: "Este campo es obligatorio",
                    maxlength: "No debe tener más de 40 caracteres",
                    email: "Introduzca un email válido"
                },
                pass : {
                    required: "Este campo es obligatorio",
                    maxlength: "No debe tener más de 40 caracteres"
                }  
            }
        });
    });
</script>