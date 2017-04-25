<?php
include('../inc/config.php');
include('../inc/validar.php');
include('../inc/funciones.php');

if($_POST['txtFecha']){



$fecha = $_POST['txtFecha'];

//Numero del dia de la semana
$dia = date('l', strtotime($fecha));
$diaSemana = date('N', strtotime($dia));
$diaMes = date('d', strtotime($dia));

//Numero del dia del mes
$dia = date('d',strtotime($fecha));

list($d,$m,$a)=explode("-",$fecha);
$fecha =  $a."-".$d."-".$m;

if($diaSemana == 1){

  //verifico si ficha el lunes
        $NoNulo = "MODALIDADHORARIA.LE is not null and";

        $CadenaDia = " EMPLEADOS.ToleranciaTarde,FICHADA.EntradaSalida, CONVERT(VARCHAR(8),FICHADA.Hora,108) AS Ficho, CONVERT(VARCHAR(12),FICHADA.Fecha,3) AS Fecha, MODALIDADHORARIA.LE AS HoraEdebeFichar, MODALIDADHORARIA.Lunes, DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.LE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) AS MinutosTarde,";

        $tarde = "AND DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.LE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) > 0";
}

if($diaSemana == 2){

  //verifico si ficha el martes
        $NoNulo = "MODALIDADHORARIA.MS is not null and";

        $CadenaDia = " EMPLEADOS.ToleranciaTarde, FICHADA.EntradaSalida, CONVERT(VARCHAR(8),FICHADA.Hora,108) AS Ficho, CONVERT(VARCHAR(12),FICHADA.Fecha,3) AS Fecha, MODALIDADHORARIA.ME AS HoraEdebeFichar,MODALIDADHORARIA.Martes, DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.ME, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) AS MinutosTarde,";

        $tarde = "AND DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.ME, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) > 0";
}

if($diaSemana == 3){

  //verifico si ficha el miercoles
        $NoNulo = "MODALIDADHORARIA.MiS is not null and";

        $CadenaDia = " EMPLEADOS.ToleranciaTarde, FICHADA.EntradaSalida, CONVERT(VARCHAR(8),FICHADA.Hora,108) AS Ficho, CONVERT(VARCHAR(12),FICHADA.Fecha,3) AS Fecha, MODALIDADHORARIA.MiE AS HoraEdebeFichar,MODALIDADHORARIA.Miercoles, DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.MiE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) AS MinutosTarde,";

        $tarde = "AND DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.MiE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) > 0";
}

if($diaSemana == 4){

  //'verifico si ficha el jueves'
          $NoNulo = "MODALIDADHORARIA.JS is not null and";

          $CadenaDia = " EMPLEADOS.ToleranciaTarde, FICHADA.EntradaSalida, CONVERT(VARCHAR(8),FICHADA.Hora,108) AS Ficho,CONVERT(VARCHAR(12),FICHADA.Fecha,3) AS Fecha, MODALIDADHORARIA.JE AS HoraEdebeFichar,MODALIDADHORARIA.Jueves, DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.JE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) AS MinutosTarde,";

          $tarde = "AND DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.JE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) > 0";
}

if($diaSemana == 5){

  //'verifico si ficha el viernes'
        $NoNulo = "MODALIDADHORARIA.VS is not null and";

        $CadenaDia = " EMPLEADOS.ToleranciaTarde, FICHADA.EntradaSalida, CONVERT(VARCHAR(8),FICHADA.Hora,108) AS Ficho,CONVERT(VARCHAR(12),FICHADA.Fecha,3) AS Fecha, MODALIDADHORARIA.VE AS HoraEdebeFichar,MODALIDADHORARIA.Viernes, DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.VE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) AS MinutosTarde,";

        $tarde = "AND DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.VE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) > 0";
}

if($diaSemana == 6){

  //'verifico si ficha el sabado'
          $NoNulo = "MODALIDADHORARIA.SS is not null and";

          $CadenaDia = " EMPLEADOS.ToleranciaTarde, FICHADA.EntradaSalida, CONVERT(VARCHAR(8),FICHADA.Hora,108) AS Ficho,CONVERT(VARCHAR(12),FICHADA.Fecha,3) AS Fecha, MODALIDADHORARIA.SE AS HoraEdebeFichar,MODALIDADHORARIA.Sabado, DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.SE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) AS MinutosTarde, ";

          $tarde = "AND DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.SE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) > 0";
}

if($diaSemana == 7){

  //'verifico si ficha el domingo'
        $NoNulo = "MODALIDADHORARIA.DS is not null and";

        $CadenaDia = " EMPLEADOS.ToleranciaTarde, CONVERT(VARCHAR(8),FICHADA.Hora,108) AS Ficho,CONVERT(VARCHAR(12),FICHADA.Fecha,3) AS Fecha, MODALIDADHORARIA.DE AS HoraEdebeFichar,MODALIDADHORARIA.Domingo, DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.DE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) AS MinutosTarde,";

        $tarde = "AND DATEDIFF(MINUTE,DATEADD(MINUTE, ToleranciaTarde, CONVERT(datetime,MODALIDADHORARIA.DE, 114)),CONVERT(VARCHAR(8),FICHADA.Hora,108)) > 0";
}

 $sqlQuienes = "SELECT DISTINCT EMPLEADOS.IdEmpleado, EMPLEADOS.Legajo, EMPLEADOS.Nombre, EMPLEADOS.Apellido, FICHADA.Tipo, FICHADA.Fecha, ";

 $sqlQuienes = $sqlQuienes.$CadenaDia;
 $sqlQuienes = $sqlQuienes." UBICACIONRELOJ.UbicacionReloj AS Lugar, FICHADA.IdReloj
     FROM EMPLEADOS INNER JOIN
     EMPLEADOMODALIDAD ON EMPLEADOS.IdEmpleado = EMPLEADOMODALIDAD.IdEmpleado INNER JOIN
     MODALIDADHORARIA ON EMPLEADOMODALIDAD.IdModalidad = MODALIDADHORARIA.IdModalidad INNER JOIN
     FICHADA ON EMPLEADOS.IdEmpleado = FICHADA.IdEmpleado INNER JOIN
     UBICACIONRELOJ ON FICHADA.IdReloj = UBICACIONRELOJ.IdReloj
     WHERE fichada.fecha='$fecha' AND (FICHADA.EntradaSalida = 'E')
     and EMPLEADOMODALIDAD.desdefecha<='$fecha' and EMPLEADOMODALIDAD.hastafecha>='$fecha'
     and EMPLEADOMODALIDAD.desdedia<= $diaMes and EMPLEADOMODALIDAD.hastadia>=$diaMes
     and modalidadhoraria.liberado<1 ".$tarde." order by apellido";



$stmt = sqlsrv_query( $conn,$sqlQuienes);
if( $stmt === false ) {
    if( ($errors = sqlsrv_errors() ) != null) {
        foreach( $errors as $error ) {
            echo "SQLSTATE: ".$error[ 'SQLSTATE']."<br />";
            echo "code: ".$error[ 'code']."<br />";
            echo "message: ".$error[ 'message']."<br />";
        }
    }
}
}else{
  header("Location: form_consulta_salidas.php?errordb");
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
    <title> Control Llegadas Tarde</title>

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
	  <h4 class="text-center bg-info">Listado de control de llegadas tarde</h4>
        <div class="row">
              <table id="example" class="display" cellspacing="0" width="100%">
                	<thead>
                      <th> Legajo </th>
                      <th> Empleado </th>
                      <th> HoraDebeFichar </th>
                      <th> Fichó </th>
                      <th> Tolerancia </th>
                      <th> MinutosTarde </th>
                      <th> Fecha </th>
                      <th> LugarFichada </th>
                  </thead>
                    <tbody>
                    	<?php while($fichadas = sqlsrv_fetch_array($stmt)){ ?>
                        <tr class="success">
                            <td> <?php echo $fichadas['Legajo']; ?> </td>
                            <td> <?php echo $fichadas['Nombre']." ".$fichadas['Apellido']; ?> </td>
                            <td> <?php echo $fichadas['HoraEdebeFichar']; ?> </td>
                            <td> <?php echo $fichadas['Ficho']; ?> </td>
                            <td> <?php echo $fichadas['ToleranciaTarde']; ?> </td>
                            <td> <?php echo $fichadas['MinutosTarde']; ?> </td>
                            <td> <?php echo $fichadas['Fecha']; ?> </td>
                            <td> <?php echo $fichadas['Lugar']; ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
				</table>

				</div>
      </div>

    </div> <!-- /container -->
  </body>
</html>
