<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Iniciar Sesión</title>
  <link rel="icon" type="image/png" sizes="16x16" href="Assets/images/icono-logo.png">
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet"  href="Assets/css/login.css">
</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="Assets/images/modeloLogin.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="Assets/images/logo.jpg" alt="logo" class="logo">
              </div>
              <p class="login-card-description">Iniciar Sesión</p>

              <form action="login/comprobar" method="POST" autocomplete="off">
                  <div class="form-group">
                    <label for="usuario" class="sr-only">DNI</label>
                    <input type="text" name="usuario" id="email" class="form-control" placeholder="DNI">
                  </div>
                  <div class="form-group mb-4">
                    <label for="pass" class="sr-only">Contraseña</label>
                    <input type="password" name="pass" id="password" class="form-control" placeholder="***********">
                  </div>
                  <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
                </form>
                <a href="#!" class="forgot-password-link">¿Olvidaste tu contraseña?</a>
                <p class="login-card-footer-text">¿No tienes una cuenta? <a href="Login/Registro" class="text-reset">Regístrate aquí</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Todos los derechos reservados.</a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>

