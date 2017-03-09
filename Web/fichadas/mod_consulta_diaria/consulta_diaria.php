<?php
include('../inc/config.php');
include('../inc/validar.php');


if($_POST['txtFecha']){

$desde = $_POST['txtFecha'];
$entsal = $_POST['entsal'];
$legajo = $_SESSION['legajo'];


if($entsal == 3){
  $sql = "SELECT legajo,nombre, apellido, CONVERT(VARCHAR(12),fecha,3) as fechaN,CONVERT(VARCHAR(8),hora,108) AS hora,
          entradasalida,tipo, ubicacionreloj+'('+CAST(numeroreloj as VARCHAR(2))+')' AS reloj
          FROM fichada f
          JOIN empleados e
          ON e.idempleado = f.idempleado
          JOIN ubicacionreloj u
          ON u.idReloj = f.idreloj
          WHERE legajo IN (
              SELECT legajo
              FROM Personal_fichadas_permisos
              WHERE usuario = $legajo
              )
          AND fecha = '$desde'
          ORDER BY legajo,fecha,hora,entradasalida DESC";
}else{
  $sql = "SELECT legajo,nombre, apellido, CONVERT(VARCHAR(12),fecha,3) as fechaN,SUBSTRING(CAST(hora AS varchar(24)),12,24) as hora,
          entradasalida,tipo, ubicacionreloj+'('+CAST(numeroreloj as VARCHAR(2))+')' AS reloj
          FROM fichada f
          JOIN empleados e
          ON e.idempleado = f.idempleado
          JOIN ubicacionreloj u
          ON u.idReloj = f.idreloj
          WHERE legajo IN (
              SELECT legajo
              FROM Personal_fichadas_permisos
              WHERE usuario = $legajo
              )
          AND fecha = '$desde'
          AND entradasalida = '$entsal'
          ORDER BY legajo,fecha,hora,entradasalida DESC";
}

$stmt = sqlsrv_query( $conn,$sql);
if( $stmt === false ) {
      echo "Error en el query";
     //die( print_r( sqlsrv_errors(), true));
}
}else{
  header("Location: form_consulta_diaria.php?errordb");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/clock.png" sizes="16x16">
    <title>Parte Diario</title>

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
      <!-- Static navbar -->
      <?php include('../inc/menu.php'); ?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
		<h4 class="text-center bg-info">Listado de Parte diario</h4>
        <div class="row">
              <table id="example" class="display" cellspacing="0" width="100%">
                	<thead>
                      <th> Legajo </th>
                      <th> Nombre </th>
                      <th> Apellido </th>
                      <th> Fecha </th>
            					<th> Hora </th>
            					<th> E/S </th>
                      <th> Tipo </th>
                      <th> Reloj </th>
                  </thead>
                    <tbody>
                    	<?php while($fichadas = sqlsrv_fetch_array($stmt)){ ?>
                        <tr class="success">
                            <td> <?php echo $fichadas['legajo']; ?> </td>
                            <td> <?php echo $fichadas['nombre']; ?> </td>
                            <td> <?php echo $fichadas['apellido']; ?> </td>
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
  </body>
</html>
