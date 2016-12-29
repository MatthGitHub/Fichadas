<?php
include('inc/config.php');
include('inc/validar.php');


if($_POST['txtFecha']){

$desde = $_POST['txtFecha'];
$area = $_POST['area'];
$legajo = $_SESSION['legajo'];


if($area == 3){
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
          AND entradasalida = '$area'
          ORDER BY legajo,fecha,hora,entradasalida DESC";
}

$stmt = mssql_query( $sql,$conn);
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
    <title>Mis Fichadas</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script language='javascript' src="js/jquery-1.12.3.js"></script>
    <script language='javascript' src="js/jquery.dataTables.min.js"></script>

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
        "scrollY":        "500px",
        "scrollCollapse": true,
        "columnDefs": [{ type: 'date-uk', targets: 0 }],
        "order":[[0,"desc"]]
          } );
      } );
    </script>
  </head>
  <style type="text/css">
  body{background: #000;}

       .media
    {
        /*box-shadow:0px 0px 4px -2px #000;*/
        margin: 20px 0;
        padding:30px;
    }
    .dp
    {
        border:10px solid #eee;
        transition: all 0.2s ease-in-out;
    }
    .dp:hover
    {
        border:2px solid #eee;
        transform:rotate(360deg);
        -ms-transform:rotate(360deg);
        -webkit-transform:rotate(360deg);
        /*-webkit-font-smoothing:antialiased;*/
    }
  </style>
  <body>
    <div class="container">

      <!-- Static navbar -->
      <?php include('inc/menu.php'); ?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
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
                    	<?php while($fichadas = mssql_fetch_array( $stmt)){ ?>
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

    </div> <!-- /container -->
  </body>
</html>
