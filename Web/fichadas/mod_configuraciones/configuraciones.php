<?php
include('../inc/config.php');
include('../inc/validar.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Configuraciones generales</title>

    <!-- Bootstrap -->
		<script src="../js/jquery-1.12.3.js"></script>
    <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
		<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/menuLateral.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script language='javascript' src="../js/jquery-1.12.3.js"></script>
    <script language='javascript' src="../js/jquery.dataTables.min.js"></script>

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
		<?php include "../inc/menu.php"; ?>
    <?php include "../inc/menuLateral.php"; ?>
    </div> <!-- /container -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <p align="center"> by M. Benditti. </p>
  </body>
</html>
