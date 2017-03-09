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
    <title> Parte Diario </title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script language='javascript' src="../js/jquery-1.12.3.js"></script>
      <script src="../js/bootstrap.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.es.js"></script>

    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">


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
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
	  <h4 class="text-center bg-info">Parte diario</h4>

		<div class="container">
			<form name="form1" method="post" action="consulta_diaria.php">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-body"
							<form class="form form-signup" role="form">
								<div class="form-group">
					  <div class='input-group date' id='divMiCalendario'>
						<input name="txtFecha" type='text' id="txtFecha" class="form-control"  placeholder="Fecha" readonly/>
						<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
					  </div>
								</div>
					<span class="input-group-addon"><i class="fa fa-arrow-circle-o-right fa-fw"></i> Entrada o Salida</span>
					<div class="col-xs-15 selectContainer">
						<select class="form-control" name="entsal" id="entsal">
							  <option value = 3> Entradas y Salidas </option>
							  <option value = E> Entradas </option>
							  <option value = S> Salidas </option>
						</select>
					</div>
								<input type="submit" name="Submit" value="BUSCAR"  class="btn btn-sm btn-primary btn-block">
							</form>
					</div>
							 <?php
		if(isset($_GET['sucess'])){
		echo "
		<div class='alert alert-success-alt alert-dismissable'>
						<span class='glyphicon glyphicon-certificate'></span>
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
						<span class='glyphicon glyphicon-certificate'></span>
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
						<span class='glyphicon glyphicon-certificate'></span>
						<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
							×</button>Error, no ha introducido todos los datos.</div>
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
		<div class="panel-footer">
					<p class="text-center">Direccion de Sistemas - Municipalidad de Bariloche</p>
		</div>
    </div> <!-- /container -->
    <script type="text/javascript">
    $('#divMiCalendario').datetimepicker({
      format: 'YYYY-DD-MM'
    });
    //$('#divMiCalendario').data("DateTimePicker").show();
    </script>
  </body>
</html>
