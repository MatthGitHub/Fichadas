<?php

include('../inc/config.php');
include('../inc/validar.php');


$legajo = $_SESSION['legajo'];
//echo "Desde: ".$_POST['txtFechaDesde']." Hasta: ".$_POST['txtFechaHasta'];
//exit();

if(($_POST['hd_desde'])&&($_POST['hd_hasta'])){

$desde = $_POST['hd_desde'];
$hasta = $_POST['hd_hasta'];
$tipo = $_POST['tp_lic'];

if($tipo != "nada"){



  $sql = "SELECT e.legajo , e.apellido , e.nombre , CONVERT(VARCHAR(12),a.desdefecha,3) as desdefecha ,CONVERT(VARCHAR(12),a.hastafecha,3) as hastafecha ,ta.descripcion as TipoLicencia ,lt.descripcion
  FROM EMPLEADOS E ,ausencias A ,tipoausencias TA ,lugardetrabajo LT
  WHERE e.idempleado = a.idempleado
  and a.idtipoausencia = ta.idtipoausencia
  and E.IDLUGARTRABAJO = lt.idlugartrabajo
  and  a.desdefecha BETWEEN '$desde' and '$hasta'
  AND  A.IDTIPOAUSENCIA = '$tipo'
  order by  e.apellido+e.nombre  , a.desdefecha";

}else{
  $sql = "SELECT e.legajo , e.apellido , e.nombre , CONVERT(VARCHAR(12),a.desdefecha,3) as desdefecha ,CONVERT(VARCHAR(12),a.hastafecha,3) as hastafecha ,ta.descripcion as TipoLicencia ,lt.descripcion
  FROM EMPLEADOS E ,ausencias A ,tipoausencias TA ,lugardetrabajo LT
  WHERE e.idempleado = a.idempleado
  AND e.sexo = 'Femenino'
  and a.idtipoausencia = ta.idtipoausencia
  and E.IDLUGARTRABAJO = lt.idlugartrabajo
  and  a.desdefecha BETWEEN '$desde' and '$hasta'
  order by  e.apellido+e.nombre  , a.desdefecha";
}

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
    <title>Listado Tipo Licencia</title>

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

<script language="LiveScript">
function checkAGE()
{
  if (!confirm  ("¿deseas imprimir la orden que elegiste?")
     ) history.go(-1);
  return " "
}
window.print();

</script>

  </head>
   <body>
    <div >

      <!-- Static navbar -->
      <br>


      <!-- Main component for a primary marketing message or call to action -->

	  <h4 class="text-center bg-info">Listado tipo de licencia</h4>

              <table id="example"  cellspacing="0" width="100%">
                <thead>
                    <th> Legajo </th>
                    <th> Apellido </th>
                    <th> Nombre </th>
                    <th> Desde </th>
                    <th> Hasta </th>
                    <th> Tipo Licencia </th>
                    <th> Descripcion </th>
                </thead>
                  <tbody>
                    <?php while($registros = sqlsrv_fetch_array( $stmt)){ ?>
                      <tr class="success">
                          <td> <?php echo $registros['legajo']; ?> </td>
                          <td> <?php echo $registros['apellido']; ?> </td>
                          <td> <?php echo $registros['nombre']; ?> </td>
                          <td> <?php echo $registros['desdefecha']; ?> </td>
                          <td> <?php echo $registros['hastafecha']; ?> </td>
                          <td> <?php echo $registros['TipoLicencia']; ?> </td>
                          <td> <?php echo $registros['descripcion']; ?> </td>
                      </tr>
                      <?php } ?>
                  </tbody>
				</table>



		<div class="panel-footer">
					<p class="text-center">Direccion de Sistemas - Municipalidad de Bariloche</p>
		</div>
    </div> <!-- /container -->
  </body>
</html>
