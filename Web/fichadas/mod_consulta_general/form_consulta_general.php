<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include('../inc/config.php');
include('../inc/validar.php');

if(isset($_POST['legajo'])&&isset($_POST['txtFechaDesde'])&&isset($_POST['txtFechaHasta'])){
  $legajo = $_POST['legajo'];
  $desde = $_POST['txtFechaDesde'];
  $hasta = $_POST['txtFechaHasta'];

  $aLegajo = $_SESSION['legajo'];

  //Valido si el usuario que lo pide tiene asignado el legajo que pide al menos que sea de personal
  if($_SESSION['permiso'] == 3){
    //Busco al empleado
    $sql = "SELECT apellido, nombre FROM Empleados WHERE legajo = $legajo";
    $stmt = sqlsrv_query($conn,$sql);
    $stmt = sqlsrv_fetch_array($stmt);
    $nombre = $stmt['nombre'];
    $apellido = $stmt['apellido'];
    //Busco las fichadas del legajo seleccionado
    $sql = "SELECT CONVERT(VARCHAR(12),fecha,3) as fechaN,CONVERT(VARCHAR(8),hora,108) AS hora,entradasalida,tipo, ubicacionreloj+'('+CAST(numeroreloj as VARCHAR(2))+')' AS reloj FROM fichada f JOIN empleados e 	ON e.idempleado = f.idempleado JOIN ubicacionreloj u ON u.idReloj = f.idreloj WHERE legajo = $legajo AND fecha >= '$desde' AND fecha <= '$hasta' ORDER BY fecha DESC";
    $stmt = sqlsrv_query($conn,$sql);


  }else{
    $sql = "SELECT * FROM Personal_fichadas_permisos WHERE usuario = $aLegajo AND legajo = $legajo";
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $params = array();
    $stmt = sqlsrv_query($conn,$sql,$params,$options);

    if(sqlsrv_num_rows($stmt) > 0){
      //Busco al empleado
      $sql = "SELECT apellido, nombre FROM Empleados WHERE legajo = $legajo";
      $stmt = sqlsrv_query($conn,$sql);
      $stmt = sqlsrv_fetch_array($stmt);
      $nombre = $stmt['nombre'];
      $apellido = $stmt['apellido'];

      //Busco las fichadas del legajo seleccionado
      $sql = "SELECT CONVERT(VARCHAR(12),fecha,3) as fechaN,CONVERT(VARCHAR(8),hora,108) AS hora,entradasalida,tipo, ubicacionreloj+'('+CAST(numeroreloj as VARCHAR(2))+')' AS reloj FROM fichada f JOIN empleados e 	ON e.idempleado = f.idempleado JOIN ubicacionreloj u ON u.idReloj = f.idreloj WHERE legajo = $legajo AND fecha >= '$desde' AND fecha <= '$hasta' ORDER BY fecha DESC";
      $stmt = sqlsrv_query($conn,$sql);
    }else{
      header("Location: form_consulta_general.php?errordat");
      exit();
    }
  }
}else{
  $nombre = '';
  $apellido = '';
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/clock.png" sizes="16x16">
    <title> Consulta general de fichadas </title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script language='javascript' src="../js/jquery-1.12.3.js"></script>
      <script src="../js/bootstrap.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.es.js"></script>
    <script language='javascript' src="../js/jquery.dataTables.min.js"></script>

    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js"></script>
	   <link href="../css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
    jQuery.extend( jQuery.fn.dataTableExt.oSort, {
      "date-uk-pre": function ( a ) {
          if (a == null || a == "") {
              return 0;
          }
          var ukDatea = a.split('/');
          return (ukDatea[2] + ukDatea[1] + ukDatea[0]) * 1;
          },

          "date-uk-asc": function ( a, b ) {
              return ((a < b) ? -1 : ((a > b) ? 1 : 0));
          },

          "date-uk-desc": function ( a, b ) {
              return ((a < b) ? 1 : ((a > b) ? -1 : 0));
          }
      } );
    </script>

    <script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
      "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "No se encontraron registros",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros",
            "infoFiltered": "(filtrado de _MAX_ registros)",
            "sSearch":       	"Buscar",
          	"oPaginate": {
          		"sFirst":    	"Primero",
          		"sPrevious": 	"Anterior",
          		"sNext":     	"Siguiente",
          		"sLast":     	"Ultimo"
          	}
        },
        "scrollY":        "500px",
        "scrollCollapse": true,
        "columnDefs": [{ type: 'date-uk', targets: 0 }],
        "order":[[0,"desc"]]
          } );
      } );
    </script>
  </head>
   <body>

	<div class="container">
		<br>
		  <?php include('../inc/menu.php'); ?>
		<!-- Main component for a primary marketing message or call to action -->
		<div class="jumbotron">
			<h4 class="text-center bg-info">Consulta general de Fichadas</h4>
			<div class="container">
				<form name="form1" method="post" action="form_consulta_general.php">
				<div class="row">
					<div class="col-md-4 col-md-offset-4">
						<div class="panel panel-default">
							<div class="panel-body"
								<form class="form form-signup" role="form">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><h5 class="text-center"><i class="fa fa-female fa-fw"></i> Empleado <i class="fa fa-male fa-fw"></i></h5><?php echo $nombre." ".$apellido; ?></span>		
										</div>
									</div>
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-folder fa-fw"></i></span>
											<input name="legajo" type="text" id="legajo" class="form-control" placeholder="Legajo" />
										</div>
									</div>
									<div class="form-group">
									  <div class='input-group date' id='divMiCalendario'>
										<input name="txtFechaDesde" type='text' id="txtFechaDesde" class="form-control" placeholder="Desde" readonly/>
										<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
									  </div>
									</div>
									<div class="form-group">
									  <div class='input-group date' id='divMiCalendario2'>
										<input name="txtFechaHasta" type='text' id="txtFechaHasta" class="form-control" placeholder="Hasta" readonly/>
										<span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
										
									  </div>
									</div>
									
									<input type="submit" name="Submit" value="BUSCAR"  class="btn btn-sm btn-primary btn-block">
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
														×</button> No posee permisos para consultar este legajo.</div>
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
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="jumbotron">
			<div class="row">
				<table id="example" class="display" cellspacing="0" width="100%">
					<thead>
					  <th> Fecha </th>
					  <th> Hora </th>
					  <th> E/S </th>
					  <th> Tipo </th>
					  <th> Reloj </th>
					</thead>
					<tbody>
					  <?php while($fichadas = sqlsrv_fetch_array( $stmt)){ ?>
						<tr class="success">
							<td> <?php echo $fichadas['fechaN']; ?> </td>
							<td> <?php echo $fichadas['hora']; ?> </td>
							<td> <?php echo $fichadas['entradasalida']; ?> </td>
							<td> <?php echo $fichadas['tipo']; ?> </td>
							<td> <?php echo $fichadas['reloj']; ?> </td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="panel-footer">
			<p class="text-center">Direccion de Sistemas - Municipalidad de Bariloche</p>
		</div>
	</div> <!-- /container -->
    <script type="text/javascript">
    $('#divMiCalendario').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    //$('#divMiCalendario').data("DateTimePicker").show();
    </script>
    <script type="text/javascript">
    $('#divMiCalendario2').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    //$('#divMiCalendario2').data("DateTimePicker").show();
    </script>
  </body>
</html>
