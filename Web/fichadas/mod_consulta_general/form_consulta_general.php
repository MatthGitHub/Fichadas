<?php
include('../inc/config.php');
include('../inc/validar.php');

if(isset($_POST['legajo'])&&isset($_POST['txtFechaDesde'])&&isset($_POST['txtFechaHasta'])){
  $legajo = $_POST['legajo'];
  $desde = $_POST['txtFechaDesde'];
  $hasta = $_POST['txtFechaHasta'];

  $aLegajo = $_SESSION['legajo'];

  //Valido si el usuario que lo pide tiene asignado el legajo que pide
  $sql = "SELECT * FROM Personal_fichadas_permisos WHERE usuario = $aLegajo AND legajo = $legajo";
  $stmt = mssql_query($sql,$conn);
  if(mssql_num_rows($stmt) > 0){
    //Busco al empleado
    $sql = "SELECT apellido, nombre FROM Empleados WHERE legajo = $legajo";
    $stmt = mssql_query($sql,$conn);
    $stmt = mssql_fetch_array($stmt);
    $nombre = $stmt['nombre'];
    $apellido = $stmt['apellido'];

    //Busco las fichadas del legajo seleccionado
    $sql = "SELECT CONVERT(VARCHAR(12),fecha,3) as fechaN,CONVERT(VARCHAR(8),hora,108) AS hora,entradasalida,tipo, ubicacionreloj+'('+CAST(numeroreloj as VARCHAR(2))+')' AS reloj FROM fichada f JOIN empleados e 	ON e.idempleado = f.idempleado JOIN ubicacionreloj u ON u.idReloj = f.idreloj WHERE legajo = $legajo AND fecha >= '$desde' AND fecha <= '$hasta' ORDER BY fecha DESC";
    $stmt = mssql_query( $sql,$conn);
  }else{
    header("Location: form_consulta_general.php?errordat");
    exit();
  }
}





?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
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
body
{
    background-color: #1b1b1b;
}

.alert-purple { border-color: #694D9F;background: #694D9F;color: #fff; }
.alert-info-alt { border-color: #B4E1E4;background: #81c7e1;color: #fff; }
.alert-danger-alt { border-color: #B63E5A;background: #E26868;color: #fff; }
.alert-warning-alt { border-color: #F3F3EB;background: #E9CEAC;color: #fff; }
.alert-success-alt { border-color: #19B99A;background: #20A286;color: #fff; }
.glyphicon { margin-right:10px; }
.alert a {color: gold;}

.input-group-addon
{
    background-color: rgb(50, 118, 177);
    border-color: rgb(40, 94, 142);
    color: rgb(255, 255, 255);
}
.form-control:focus
{
    background-color: rgb(50, 118, 177);
    border-color: rgb(40, 94, 142);
    color: rgb(255, 255, 255);
}

  </style>
  <body>


        <div class="container">
          <br>
          <?php include('../inc/menu.php'); ?>
      <!-- Main component for a primary marketing message or call to action -->



<div class="container">
	<form name="form1" method="post" action="form_consulta_general.php">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body"
                    <form class="form form-signup" role="form">
						<div class="form-group">
							<div class="input-group">

								<span class="input-group-addon"><h5 class="text-center"> Empleado: </h5><span class="glyphicon glyphicon-user"><?php echo $nombre." ".$apellido; ?></span></span>
                </div>
                <input name="legajo" type="text" id="legajo" class="form-control" placeholder="Legajo a buscar" />

						</div>

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
                <span class='glyphicon glyphicon-certificate'></span>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>Error, no ha introducido todos los datos.</div>
";
}else{
echo "";
}
?>
<div class="form-group">
  <div class='input-group date' id='divMiCalendario'> Desde
    <input name="txtFechaDesde" type='text' id="txtFechaDesde" class="form-control"  readonly/>
    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
    </span>
  </div>
  <div class='input-group date' id='divMiCalendario2'> Hasta
    <input name="txtFechaHasta" type='text' id="txtFechaHasta" class="form-control"  readonly/>
    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
    </span>
  </div>
</div>
<input type="submit" name="Submit" value="Buscar"  class="btn btn-sm btn-primary btn-block">
        </div>
    </div>
</div>
</form>
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
                  <?php while($fichadas = mssql_fetch_array( $stmt)){ ?>
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
