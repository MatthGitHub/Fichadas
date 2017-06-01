<?php

include('../inc/config.php');
include('../inc/validar.php');


$legajo = $_SESSION['legajo'];
//echo "Desde: ".$_POST['txtFechaDesde']." Hasta: ".$_POST['txtFechaHasta'];
//exit();

if(($_POST['txtFechaDesde'])&&($_POST['txtFechaHasta'])){

$desde = $_POST['txtFechaDesde'];
$hasta = $_POST['txtFechaHasta'];

$sql = "SELECT fecha,CONVERT(VARCHAR(12),fecha,3) as fechaN,CONVERT(VARCHAR(8),hora,108) AS hora,entradasalida,tipo, ubicacionreloj+'('+CAST(numeroreloj as VARCHAR(2))+')' AS reloj FROM fichada f JOIN empleados e 	ON e.idempleado = f.idempleado JOIN ubicacionreloj u ON u.idReloj = f.idreloj WHERE legajo = $legajo AND fecha >= '$desde' AND fecha <= '$hasta' ORDER BY fecha DESC, hora ASC";

$dias = array("lunes","martes","miercoles","jueves","viernes","sabado","domingo");

$stmt = sqlsrv_query($conn,$sql);
if( $stmt === false ) {
      echo "Error en el query";
     //die( print_r( sqlsrv_errors(), true));
}
}else{
  header("Location: ../index.php?errorpass");
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
    <title>Mis Fichadas</title>

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
        "columnDefs": [{ type: 'date-uk', targets: 0 }]
          } );
      } );
    </script>
  </head>
   <body>
    <div class="container">

      <!-- Static navbar -->
      <br>
      <?php include('../inc/menu.php'); ?>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
	  <h4 class="text-center bg-info">Mis Fichadas</h4>
      <form action="mis_fichadas_print.php" method="post" target="_blank">
        <input name="hd_desde" type="hidden" id="hd_desde" value="<?php echo $desde; ?>">
        <input name="hd_hasta" type="hidden" id="hd_hasta" value="<?php echo $hasta; ?>">
        <label>
        <input class="btn btn-sm btn-primary btn-block" type="submit" name="button" id="button" value="Imprimir">
        </label>
      </form>
        <div class="row">
              <table id="example" class="display" cellspacing="0" width="100%">
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
                            <td> <?php echo $dias[date('N',strtotime(date('l', strtotime(date_format($fichadas['fecha'],'Y-m-d')))))-1]; ?> </td>
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
