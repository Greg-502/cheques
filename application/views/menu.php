<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Cheques</title>

  <!--Google font-->
  <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">

  <!-- DataTables -->
  <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

  <!--Bootstrap-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">

  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/varios/index.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/varios/animate.min.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/varios/hover.css">
  <link rel="shortcut icon" type="image/ico" href="<?php echo base_url(); ?>assets/image/gt.jpg"/>
<!--glip icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<!--swit alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>

 <nav class="navbar navbar-expand-lg navbar-light col-md-12 fixed-top" style="background-color: #e3f2fd;">
  <div class="container">
  <a class="navbar-brand" href="<?php echo base_url()?>">
    <img style="height: 30px;" src="<?php echo base_url();?>assets/image/footer.png">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url(); ?>Add">Añadir</a>
        </li>
      </ul>

    </div>
  </div>
</nav>
<br>
