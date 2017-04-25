<?php
include('../inc/config.php');
include('../inc/validar.php');


$sql = "SELECT CAST(legajo AS VARCHAR(8))+' - '+apellido+' '+ nombre AS nombre, uw.idUsuario
FROM usuarios_web uw
JOIN empleados e
ON uw.idEmpleado = e.idEmpleado ORDER By Legajo
";
$stmt = sqlsrv_query($conn,$sql);

$sql2 = "SELECT * FROM roles";

$roles = sqlsrv_query($conn,$sql2);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/clock.png" sizes="16x16">
    <title>Modificar Usuario</title>

    <!-- Bootstrap -->
    <script language='javascript' src="../js/jquery-1.12.3.js"></script>
	<link href="../css/bootstrap.css" rel="stylesheet">

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
          <?php include("../inc/menu.php"); ?>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">

		<h4 class="text-center bg-info">Modificar Usuario</h4>

		<div class="container">
			<form name="form1" method="post" action="editar_usuario.php">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="form form-signup" role="form">
							<div class="form-group">
								<span class="input-group-addon"> <i class="fa fa-female fw" aria-hidden="true"></i>
								<i class="fa fa-male fw" aria-hidden="true"></i> Usuario</span>
								<div class="col-xs-15 selectContainer">
									<select class="form-control" name="empleado">
										<?php while($empleados = sqlsrv_fetch_array($stmt)){ ?>
										<option value=<?php echo $empleados['idUsuario'] ?>><?php echo $empleados['nombre']?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<span class="input-group-addon"><i class="fa fa-user-o fw" aria-hidden="true"></i> Perfil</span>
								<div class="col-xs-15 selectContainer">
									<select class="form-control" name="rol">
									  <?php while($rol = sqlsrv_fetch_array($roles)){ ?>
										<option value="<?php echo $rol['idRol']; ?>"> <?php echo $rol['descripcion']; ?></option>
									  <?php } ?>
									</select>
								</div>
							</div>
						<input type="submit" name="Submit" value="MODIFICAR"  class="btn btn-sm btn-primary btn-block">
						</div>
					  </form>
					</div>

					<?php
					if(isset($_GET['success'])){
					echo "
					<div class='alert alert-success-alt alert-dismissable'>
									<span class='glyphicon glyphicon-ok'></span>
									<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
										×</button>Listo! Usuario modificado satisfactoriamente.</div>";
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
										×</button>El nombre de usuario ya esta en uso o no ha introducido todos los datos</div>
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
<div class="panel-footer">
	<p class="text-center">Direccion de Sistemas - Municipalidad de Bariloche</p>
</div>
    </div> <!-- /container -->
  </body>
</html>
