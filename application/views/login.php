<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <title>Renta Car &gt; Exoneracion</title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'assets/css/sb-admin-2.min.css'; ?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/vendor/fontawesome-free/css/all.min.css'; ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'assets/css/signin1.css'; ?>" rel="stylesheet">
  </head>
  <body class="text-center">
  <form class="form-signin" method="post" action="<?php echo base_url().'welcome/login'; ?>">
  <div class="rotate-n-15">
    <i class="fas fa-car fa-4x"></i>
  </div>
  <h1 class="h3 mb-3 font-weight-normal">Renta Car Proyecto de Exoneracion</h1>
        <?php
        if(isset($_GET['message'])){
            if($_GET['message'] == "failed"){
                echo '<div class="alert alert-danger text-left" role="alert"><strong>¡Error de inicio de sesion!</strong><br>Nombre de usuario y contraseña incorrectos.</div>';
            } else if($_GET['message'] == "logout"){
                echo '<div class="alert alert-success text-left" role="alert">¡Cierre la sesión con éxito!</div>';
            } else if($_GET['message'] == "no ha iniciado sesión todavía"){
                echo '<div class="alert alert-warning text-left" role="alert">¡Por favor ingresa primero!</div>';
            }
        }
        ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <label for="inputUname" class="sr-only">Usuario</label>
                <input type="text" name="username" id="inputUname" class="form-control" placeholder="Username" required autofocus>
                    <?php echo form_error('username'); ?>
                <label for="inputPassword" class="sr-only">Contraseña</label>
                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <?php echo form_error('password'); ?>
                  <div class="form-group">
                      <input type="submit" name="login" value="Iniciar Sesion" class="btn btn-info" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url(); ?>register">Registrarse</a>
                  </div>
                <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
            </div>
        </div>
    </div>
</form>
</body>
</html>