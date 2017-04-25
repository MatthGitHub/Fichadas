<?php
include('../inc/config.php');
include('../inc/validar.php');

$sql = "SELECT * FROM TIPOLICENCIA";
$stmt = sqlsrv_query($conn,$sql);


?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/clock.png" sizes="16x16">
    <title> Listado por tipo de licencia </title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script language='javascript' src="../js/jquery-1.12.3.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.es.js"></script>

    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">

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

       <?php include('../inc/menu.php'); ?>

		<!-- Main component for a primary marketing message or call to action -->
		<div class="jumbotron">
			<h4 class="text-center bg-info">Listado por tipo de licencia</h4>
			<div class="container">
				<form name="form1" method="post" action="listado_tipo_licencia.php">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel panel-default">
							<div class="panel-body">
								<form class="form form-signup" role="form">
										<div class="form-group">
      								<span> Desde </span>
      								  <div class='input-group date' id='divMiCalendario'>
        									<input name="txtFechaDesde" type='text' id="txtFechaDesde" class="form-control"  readonly/>
        									<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
        									</span>
      								  </div>
      								  <span> Hasta </span>
      								  <div class='input-group date' id='divMiCalendario2'>
        									<input name="txtFechaHasta" type='text' id="txtFechaHasta" class="form-control"  readonly/>
        									<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
        									</span>
      								  </div>
                        <i class="fa fa-male fw" aria-hidden="true"></i> Tipo licencia</span>
        								<div class="col-xs-15 selectContainer">
        									<select class="form-control" name="tipoLicencia">
        										<option value=13>Accidente de Trabajo</option>
                            <option value=12>Atencion Familiar</option>
                            <option value=8>Ausencia c/ Aviso</option>
                            <option value=27>Ausencia prolongada</option>
                            <option value=9>Ausencia sin aviso</option>
                            <option value=30>Baja</option>
                            <option value=28>Capacitacion</option>
                            <option value=16>Casamiento</option>
                            <option value=20>Cultural y/o deportiva</option>
                            <option value=19>Donacion de sangre</option>
                            <option value=37>Enfer. Fuera de termino</option>
                            <option value=2>Enfermedad</option>
                            <option value=26>Especial</option>
                            <option value=6>Firma planilla</option>
                            <option value=10>Franco compensatorio</option>
                            <option value=33>Franco Cultura</option>
                            <option value=32>Franco Defensa Civil</option>
                            <option value=25>Franco Terminal</option>
                            <option value=31>Franco Turismo</option>
                            <option value=3>Gremial</option>
                            <option value=14>Paternidad</option>
                            <option value=42>Permiso salida</option>
                            <option value=21>Por comision</option>
                            <option value=4>Por duelo</option>
                            <option value=22>Por estudios</option>
                            <option value=35>Por judaismo</option>
                            <option value=15>Por maternidad</option>
                            <option value=18>Por mudanza</option>
                            <option value=34>Razones particulares</option>
                            <option value=7>Reglamentaria</option>
                            <option value=29>Suspension</option>
                            <option value=17>Tramite jubilatorio</option>
                            <option value=24>Viaticos c/ resolucion</option>
        									</select>
        								</div>
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
      <div class="jumbotron">
  			<h4 class="text-center bg-info">Listado por tipo de licencia de mujeres</h4>
  			<div class="container">
  				<form name="form1" method="post" action="listado_tipo_licencia.php">
  				<div class="row">
  					<div class="col-md-4 col-md-offset-4">
  						<div class="panel panel-default">
  							<div class="panel-body">
  								<form class="form form-signup" role="form">
  										<div class="form-group">
        								<span> Desde </span>
        								  <div class='input-group date' id='divMiCalendario3'>
          									<input name="txtFechaDesde" type='text' id="txtFechaDesde" class="form-control"  readonly/>
          									<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
          									</span>
        								  </div>
        								  <span> Hasta </span>
        								  <div class='input-group date' id='divMiCalendario4'>
          									<input name="txtFechaHasta" type='text' id="txtFechaHasta" class="form-control"  readonly/>
          									<span class="input-group-addon"><span class="fa fa-calendar fa-fw"></span>
          									</span>
        								  </div>
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
      format: 'YYYY-DD-MM',
      autoclose: true
    });
    //$('#divMiCalendario').data("DateTimePicker").show();
    </script>
    <script type="text/javascript">
    $('#divMiCalendario2').datetimepicker({
      format: 'YYYY-DD-MM',
      autoclose: true
    });
    $('#divMiCalendario3').datetimepicker({
      format: 'YYYY-DD-MM',
      autoclose: true
    });
    //$('#divMiCalendario').data("DateTimePicker").show();
    </script>
    <script type="text/javascript">
    $('#divMiCalendario4').datetimepicker({
      format: 'YYYY-DD-MM',
      autoclose: true
    });
    //$('#divMiCalendario2').data("DateTimePicker").show();
    </script>
  </body>
</html>
