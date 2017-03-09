<?php
include('../inc/config.php');
include('../inc/validar.php');

if($_POST['legajo']){
  $legajo = $_POST['legajo'];
  //echo "Entro por GET: ".$legajo;
}else{
  if($_GET['legajo']){
    $legajo = $_GET['legajo'];
  }else{
    header("Location: form_seleccionar_legajo_tarjeta.php?errordb");
  }
  //echo "Entro por POST: ".$legajo;
}


  $sql = "SELECT nombre +' '+apellido AS nombre, idEmpleado FROM empleados WHERE legajo = $legajo";
  $stmt = sqlsrv_query($conn,$sql);
  $usuario = sqlsrv_fetch_array($stmt);
  $empleado = $usuario['idEmpleado'];
  $usuario = $usuario['nombre'];


  //Busco las tarjetas que tiene asignado el legajo seleccionado
  $sql = "SELECT Descripcion,DesdeDia,HastaDia,CONVERT(VARCHAR(12),em.DesdeFecha,3) AS DesdeFecha,CONVERT(VARCHAR(12),em.HastaFecha,3) AS HastaFecha,SUBSTRING(LE,0,6) AS LE, SUBSTRING(LS,0,6) AS LS, SUBSTRING(ME,0,6) AS ME, SUBSTRING(MS,0,6) AS MS, SUBSTRING(MIE,0,6) AS MIE, SUBSTRING(MIS,0,6) AS MIS, SUBSTRING(JE,0,6) AS JE, SUBSTRING(JS,0,6) AS JS, SUBSTRING(VE,0,6) AS VE, SUBSTRING(VS,0,6) AS VS, SUBSTRING(SE,0,6) AS SE, SUBSTRING(SS,0,6) AS SS, SUBSTRING(DE,0,6) AS DE, SUBSTRING(DS,0,6) AS DS, CONVERT(VARCHAR(12),em.Fecha,3) AS Fecha FROM EMPLEADOMODALIDAD em JOIN MODALIDADHORARIA m ON em.IdModalidad = m.IdModalidad WHERE em.idEmpleado = $empleado";
  $stmt = sqlsrv_query($conn,$sql);
  $sql2 = "SELECT Descripcion,DesdeDia,HastaDia,CONVERT(VARCHAR(12),em.DesdeFecha,3) AS DesdeFecha,CONVERT(VARCHAR(12),em.HastaFecha,3) AS HastaFecha,SUBSTRING(LE,0,6) AS LE, SUBSTRING(LS,0,6) AS LS, SUBSTRING(ME,0,6) AS ME, SUBSTRING(MS,0,6) AS MS, SUBSTRING(MIE,0,6) AS MIE, SUBSTRING(MIS,0,6) AS MIS, SUBSTRING(JE,0,6) AS JE, SUBSTRING(JS,0,6) AS JS, SUBSTRING(VE,0,6) AS VE, SUBSTRING(VS,0,6) AS VS, SUBSTRING(SE,0,6) AS SE, SUBSTRING(SS,0,6) AS SS, SUBSTRING(DE,0,6) AS DE, SUBSTRING(DS,0,6) AS DS, CONVERT(VARCHAR(12),em.Fecha,3) AS Fecha FROM EMPLEADOMODALIDAD em JOIN MODALIDADHORARIA m ON em.IdModalidad = m.IdModalidad WHERE em.idEmpleado = $empleado";
  $stmt2 = sqlsrv_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/clock.png" sizes="16x16">
    <title>Modalidades</title>

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

      $('#example2').DataTable( {
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


});

</script>
  </head>
  <body>

        <div class="container">
          <br>
          <?php include('../inc/menu.php'); ?>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">


<div class="container">
	<form name="form1" method="post" action="agregar_permiso.php?agente=<?php echo $legajo;?>">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                  <h4 class="text-center bg-info">Asignar modalidad a empleado</h4>
                <form class="form form-signup" role="form">
      						<div class="form-group">
      							<div class="input-group">
      								<span class="input-group-addon"><h5 class="text-center"><i class="fa fa-user fa-fw"></i> Empleado:</h5><?php echo $usuario; ?> </span>
                    </div>
      						</div>
    					</form>
            </div>

 <?php
if(isset($_GET['sucess'])){
echo "
<div class='alert alert-success-alt alert-dismissable'>
                <span class='glyphicon glyphicon-certificate'></span>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>Listo! Legajo agregado satisfactoriamente.</div>
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
                    ×</button>El legajo no existe o ya se encuentra en la tabla.</div>
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
                    ×</button> Debe introducir un legajo! </div>
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
        <div class="row">
              <table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                      <th>Descripcion</th>
                      <th>DD</th>
                      <th>HD</th>
                      <th>DFecha</th>
                      <th>HFecha</th>
                      <th>LE</th>
                      <th>LS</th>
                      <th>ME</th>
                      <th>MS</th>
                      <th>MiE</th>
                      <th>MiS</th>
                      <th>JE</th>
                      <th>JS</th>
                      <th>VE</th>
                      <th>VS</th>
                  </thead>
                    <tbody>
                      <?php while($tarjetas = sqlsrv_fetch_array( $stmt)){ ?>
                        <tr >
                            <td> <?php echo $tarjetas['Descripcion']; ?> </td>
                            <td> <?php echo $tarjetas['DesdeDia']; ?> </td>
                            <td> <?php echo $tarjetas['HastaDia']; ?> </td>
                            <td> <?php echo $tarjetas['DesdeFecha']; ?> </td>
                            <td> <?php echo $tarjetas['HastaFecha']; ?> </td>
                            <td> <?php echo $tarjetas['LE']; ?> </td>
                            <td> <?php echo $tarjetas['LS']; ?> </td>
                            <td> <?php echo $tarjetas['ME']; ?> </td>
                            <td> <?php echo $tarjetas['MS']; ?> </td>
                            <td> <?php echo $tarjetas['MIE']; ?> </td>
                            <td> <?php echo $tarjetas['MIS']; ?> </td>
                            <td> <?php echo $tarjetas['JE']; ?> </td>
                            <td> <?php echo $tarjetas['JS']; ?> </td>
                            <td> <?php echo $tarjetas['VE']; ?> </td>
                            <td> <?php echo $tarjetas['VS']; ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
        </table>

<!--href="inc/quitar.php?legajo=<?php echo $permisos['legajo'];?>&usuario=<?php echo $_SESSION['legajo'];?>"-->
        </div>
        </div>
          <div class="jumbotron">
        <div class="row">
              <table id="example2" class="display" cellspacing="0" width="100%">
                  <thead>
                      <th>SE</th>
                      <th>SS</th>
                      <th>DE</th>
                      <th>DS</th>
                      <th>Fecha </th>
                  </thead>
                    <tbody>
                      <?php while($tarjetas2 = sqlsrv_fetch_array( $stmt2)){ ?>
                        <tr >
                            <td> <?php echo $tarjetas2['SE']; ?> </td>
                            <td> <?php echo $tarjetas2['SS']; ?> </td>
                            <td> <?php echo $tarjetas2['DE']; ?> </td>
                            <td> <?php echo $tarjetas2['DS']; ?> </td>
                            <td> <?php echo $tarjetas2['Fecha']; ?> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
        </table>
        </div>
      </div>
    </div> <!-- /container -->


  </body>
</html>
