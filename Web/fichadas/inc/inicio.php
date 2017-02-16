<?php
include('config.php');
include('validar.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fichadas</title>

    <!-- Bootstrap -->
		<script src="../js/jquery-1.12.3.js"></script>
		<link href="../css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <style type="text/css">
  body{background: #000;}
  </style>
  <body>
    <br>
        <div class="container">
		<!-- Static navbar -->
		<?php include "menu.php"; ?>
		<!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h1> Consulta de fichadas </h1>
        <div class="row">
          <div class="col-lg-5">
            <p>
  			       <a class="btn btn-lg btn-primary" href="../mod_mis_fichadas/form_mis_fichadas.php" role="button">Mis fichadas &raquo;</a>
          </p>
        </div>
            <div class="col-lg-5"><?php if(($_SESSION['permiso'] == 0) || ($_SESSION['permiso'] == 1)){ ?>
      				<p>
      					<a class="btn btn-lg btn-primary" href="../mod_consulta_general/form_consulta_general.php" role="button"> Consulta general de fichadas &raquo;</a>
      				</p>
    				<?php } ?>
          </div>
        </div>
        <div class="row">
          <div class="col-md-5"><?php
             if(($_SESSION['permiso'] == 0) || ($_SESSION['permiso'] == 1)){ ?>
              <p>
                <a class="btn btn-lg btn-primary" href="../mod_consulta_diaria/form_consulta_diaria.php" role="button"> Parte diario &raquo;</a>
              </p>
            <?php } ?>
        </div>
          <div class="col-md-5"><?php
  				    if($_SESSION['permiso'] == 0){  ?>
      			<p>
      				<a class="btn btn-lg btn-primary" href="../mod_control_acceso/form_seleccionar_legajo_control_acceso.php" role="button">Control acceso a fichadas &raquo;</a>
      			</p>
  			       <?php } ?>
        </div>
        </div>


      </div>
      <form name="form1" method="post" action="cerrar_sesion.php" align="mid">
        <div class="form-group">
          <div class="input-group">
            <button type="submit" class="btn btn-danger btn-lg btn-block">Cerrar sesion</button>
          </div>
        </div>
    </form>
    </div> <!-- /container -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <p align="center"> by M. Benditti. </p>
  </body>
</html>
