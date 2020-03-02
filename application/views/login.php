<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/varios/animate.min.css">
    <link rel="shortcut icon" type="image/ico" href="<?php echo base_url(); ?>assets/image/gt.jpg"/>


    <title>Inicio de sesión</title>
    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/varios/login.css">
  </head>

<body class="text-center">
    <form method="POST" class="form-signin" action="<?php echo base_url();?>Auth/login" autocomplete="off">
      <img class="mb-3" src="<?php echo base_url(); ?>assets/image/gt_.png" alt="" width="82" height="82">
      <h3 class="mb-3" style="font-family: 'Lobster', normal;">Inicio de Sesión</h3>

      <!--muestra error-->
      <?php if($this->session->flashdata("error")):?>
        <div class="alert alert-warning animated shake" role="alert">
          <p style="margin-bottom: 0px;"><?php echo $this->session->flashdata("error") ?></p>
        </div>
      <?php endif; ?>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="text" id="inputEmail" class="form-control" placeholder="Usuario" required autofocus name="user">
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" required name="pass">

      <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
      <p class="mt-5 mb-3 text-muted">&copy HRO Quetzaltango - <?php echo $anio; ?></p>
      <!--<p class="mt-5 mb-3 text-muted">&copy; Quetzaltenango, Guatemala</p>-->
    </form>
  </body>
</html>
