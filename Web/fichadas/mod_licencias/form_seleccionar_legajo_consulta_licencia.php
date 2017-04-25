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
	<link rel="icon" type="image/png" href="../images/icons/clock.png" sizes="16x16">
    <title> Consultar licencia </title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
		<link href="../css/jquery.dataTables.min.css" rel="stylesheet">

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
  <body>

        <div class="container">
			  <br>
			  <?php include('../inc/menu.php'); ?>


		  <div class="jumbotron">
			<h4 class="text-center bg-info">Registrar licencia</h4>

			<div class="container">
				<form name="form1" method="post" action="form_licencia.php">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel panel-default">
							<div class="panel-body">
								<form class="form form-signup" role="form">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-folder fa-fw"></i></span>
													<input name="legajo" type="text" id="legajo" class="form-control" placeholder="Legajo" />
												</div>
											</div>
											<input type="submit" name="Submit" value="BUSCAR"  class="btn btn-sm btn-primary btn-block">
										</form>
							</div>
							<div>
								<h5 class="text-left bg-info"><i class="fa fa-comments-o fa-fw"></i> Legajo del solicitante.</h5>
							</div>
								 <?php
			if(isset($_GET['sucess'])){
			echo "
			<div class='alert alert-success-alt alert-dismissable'>
							<span class='glyphicon glyphicon-ok'></span>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
								×</button>Listo! Tu registro fue hecho satisfactoriamente.</div>
			";
			}else{
			echo "";
			}
			?>
			<?php
			if(isset($_GET['errordat'])){
			echo "
			<div class='alert alert-warning-alt alert-dismissable'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
								×</button>Ha habido un error al insertar los valores.</div>
			";
			}else{
			echo "";
			}
			?>
			<?php
			if(isset($_GET['errordb'])){
			echo "
			<div class='alert alert-danger-alt alert-dismissable'>
							<span class='glyphicon glyphicon-exclamation-sign'></span>
							<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
								×</button>Debe introducir un legajo!.</div>
			";
			}else{
			echo "";
			}
			?>
					</div>
				</div>
			</div>
			</form>
			</div>
      </div>

    </div> <!-- /container -->
  </body>
</html>
