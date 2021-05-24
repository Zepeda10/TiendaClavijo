<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="../Assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../Assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="../Assets/css/main.css">
</head>
<body>
    <div class="sec-banner bg0 p-t-80 p-b-50">
        <section class="bg0 p-t-23 p-b-140">
            <div class="container">
            <div class="col-md-5">
                <img src="../Assets/images/logo.jpg" alt="login" width="320px" class="login-card-img">
            </div>
                <div class="card login-card p-5 mt-4">
                    <div class="brand-wrapper">

                    <div class="p-b-10">
                        <h3 class="ltext-103 cl5">
                            Formulario de registro
                        </h3>
                    </div>

                        <form action="../login/registrarse" method="POST" class="mt-5">
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
                            <button type="submit" class="btn btn-success">Registrarse</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

