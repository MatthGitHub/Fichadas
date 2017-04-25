<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include('../inc/config.php');
include('../inc/validar.php');

if(isset($_POST['hd_legajo'])&&isset($_POST['hd_desde'])&&isset($_POST['hd_hasta'])){
  $legajo = $_POST['hd_legajo'];
  $desde = $_POST['hd_desde'];
  $hasta = $_POST['hd_hasta'];

  $aLegajo = $_SESSION['legajo'];

  $dias = array("domingo","lunes","martes","miercoles","jueves","viernes","sabado");

  //Valido si el usuario que lo pide tiene asignado el legajo que pide al menos que sea de personal
  if(($_SESSION['permiso'] == 0)||($_SESSION['permiso'] == 3)){
    //Busco al empleado
    $sql = "SELECT apellido, nombre FROM Empleados WHERE legajo = $legajo";
    $stmt = sqlsrv_query($conn,$sql);
    $stmt = sqlsrv_fetch_array($stmt);
    $nombre = $stmt['nombre'];
    $apellido = $stmt['apellido'];

    //Busco las fichadas del legajo seleccionado
    $sql = "SELECT fecha,CONVERT(VARCHAR(12),fecha,3) as fechaN,
    CONVERT(VARCHAR(8),hora,108) AS hora,entradasalida,tipo,
     ubicacionreloj+'('+CAST(numeroreloj as VARCHAR(2))+')' AS reloj
     FROM fichada f JOIN empleados e 	ON e.idempleado = f.idempleado JOIN ubicacionreloj u ON u.idReloj = f.idreloj WHERE legajo = $legajo AND fecha >= '$desde' AND fecha <= '$hasta' ORDER BY fecha ASC,hora ASC";
    $stmt = sqlsrv_query($conn,$sql);


  }else{
    //Valido si el usuario que solicita las fichadas tiene el legajo asignado
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
      $sql = "SELECT fecha,CONVERT(VARCHAR(12),fecha,3) as fechaN,
      CONVERT(VARCHAR(8),hora,108) AS hora,entradasalida,tipo, ubicacionreloj+'('+CAST(numeroreloj as VARCHAR(2))+')' AS reloj FROM fichada f JOIN empleados e 	ON e.idempleado = f.idempleado JOIN ubicacionreloj u ON u.idReloj = f.idreloj WHERE legajo = $legajo AND fecha >= '$desde' AND fecha <= '$hasta' ORDER BY fecha ASC,hora ASC";
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

<script language="LiveScript">

window.print();

</script>

  </head>
   <body>

	<div class="container">
		<br>
		<!-- Main component for a primary marketing message or call to action -->

			<h4 class="text-center bg-info">Consulta general de Fichadas -  <?php echo "Agente: ".$apellido.", ".$nombre." Legajo: ".$legajo; ?> </h4>

	</div>


				<table id="example"  cellspacing="0" width="100%">
					<thead>
            <th> Dia </th>
					  <th> Fecha </th>
					  <th> Hora </th>
					  <th> E/S </th>
					  <th> Tipo </th>
					  <th> Reloj </th>
					</thead>
					<tbody>
					  <?php while($fichadas = sqlsrv_fetch_array( $stmt)){ ?>
						<tr class="success">
              <td> <?php echo $dias[date('N',strtotime(date('l', strtotime(date_format($fichadas['fecha'],'Y-m-d')))))]; ?> </td>
							<td> <?php echo $fichadas['fechaN']; ?> </td>
							<td> <?php echo $fichadas['hora']; ?> </td>
							<td> <?php echo $fichadas['entradasalida']; ?> </td>
							<td> <?php echo $fichadas['tipo']; ?> </td>
							<td> <?php echo $fichadas['reloj']; ?> </td>
						</tr>
						<?php } ?>
					</tbody>
				</table>


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
    <script type="text/javascript">
    $('#divMiCalendario2').datetimepicker({
      format: 'YYYY-DD-MM'
    });
    //$('#divMiCalendario2').data("DateTimePicker").show();
    </script>
  </body>
</html>
