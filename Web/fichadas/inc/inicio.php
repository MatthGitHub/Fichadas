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
	<link rel="icon" type="image/png" href="../images/icons/clock.png" sizes="16x16">
    <title>Sistema de Fichadas</title>

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
  <body>
    <br>
        <div class="container">
		<!-- Static navbar -->
		<?php include "menu.php"; ?>
		<!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h2><img src="../images/icons/clock_blanco.gif" alt="Municipalidad Bariloche" align="middle" style="margin:0px 0px 0px 0px" height="32" width="32"> Accesos Frecuentes de Fichadas </h2>
        <div class="row">
			<div class="col-lg-5">
				<p>
				   <a class="btn btn-lg btn-direct" href="../mod_mis_fichadas/form_mis_fichadas.php" role="button">Mis fichadas</a>
					<?php if(($_SESSION['permiso'] == 0) || ($_SESSION['permiso'] == 1)|| ($_SESSION['permiso'] == 3)){ ?>
					<a class="btn btn-lg btn-direct" href="../mod_consulta_general/form_consulta_general.php" role="button"> Consulta general de fichadas</a>
				</p>
				<?php } ?>
			</div>
			<div class="col-md-5"><?php
             if(($_SESSION['permiso'] == 0) || ($_SESSION['permiso'] == 1)){ ?>
              <p>
                <a class="btn btn-lg btn-direct" href="../mod_consulta_diaria/form_consulta_diaria.php" role="button"> Parte diario</a>
              
				<?php } ?>
				<?php
				if(($_SESSION['permiso'] == 0)|| ($_SESSION['permiso'] == 3)){  ?>
					<a class="btn btn-lg btn-direct" href="../mod_control_acceso/form_seleccionar_legajo_control_acceso.php" role="button">Control acceso a fichadas</a>
				</p>
			   <?php } ?>
			</div>
        </div>


      </div>
		<div class="panel-footer">
			<p class="text-center">Direccion de Sistemas - Municipalidad de Bariloche</p>
		</div>
    </div> <!-- /container -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
	
  </body>
</html>
