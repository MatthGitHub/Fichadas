<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include('../inc/config.php');
include('../inc/validar.php');



if($_POST['legajo']){
  $legajo = $_POST['legajo'];
}else{
  if($_GET['legajo']){
    $legajo = $_GET['legajo'];
    $listo = $_GET['listo'];
  }else{
  header("Location: form_seleccionar_legajo_control_acceso.php?errordb");
  exit();
  }
}

    //Busco el nombre de usuario y el legajo
    $sql = "SELECT legajo,nombre_usuario FROM USUARIOS_WEB uw JOIN empleados e ON uw.idEmpleado = e.idEmpleado WHERE legajo = $legajo";
    $stmt = sqlsrv_query($conn,$sql);
    $usuario = sqlsrv_fetch_array($stmt);
    $legajo = $usuario['legajo'];
    $usuario = $usuario['nombre_usuario'];

    //Busco los legajos que tiene asignado el legajo seleccionado
    $sql = "SELECT e.legajo, apellido, nombre FROM Personal_fichadas_permisos pfp JOIN empleados e ON e.legajo = pfp.legajo WHERE usuario = $legajo";
    $stmt = sqlsrv_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/clock.png" sizes="16x16">
    <title> Control acceso a fichadas </title>

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
      "scrollY": "500px",
      "scrollCollapse": true
  } );

  $('#example tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
              $('#example').DataTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );



  $('.btn').click(function(){
       //Recogemos la id del contenedor padre
       var legajo = $(this).attr('legajo');
       //Recogemos el valor del servicio
       var usuario = "<?php echo $legajo; ?>";

       var dataString = 'legajo='+legajo+"&usuario="+usuario;
       console.log(dataString);

       $.ajax({
           type: "POST",
           url: "quitar.php",
           data: dataString,
           success: function() {
              var row = $(this).closest('tr').attr('id');
              //var nRow = row[0];
              $('#example').DataTable().row('.selected').remove().draw( false );
           }
       });
   });

});

</script>
  </head>
<body onLoad="document.form1.legajo.focus();">

        <div class="container">
          <br>
          <?php include('../inc/menu.php'); ?>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">

    <h4 class="text-center bg-info">Control de acceso a fichadas</h4>

<div class="container">
	<form name="form1" method="post" action="agregar_permiso.php?agente=<?php echo $legajo;?>">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                <form class="form form-signup" role="form">
      						<div class="form-group">
      							<div class="input-group">
      								<span class="input-group-addon"><h5 class="text-center"><i class="fa fa-user fa-fw"></i> Usuario:</h5><?php echo $usuario; ?></span>
                    </div>
                      <input name="legajo" type="text" id="legajo" class="form-control" placeholder="Legajo a asignar" />
      						</div>
					        <input type="submit" name="Submit" value="AGREGAR"  class="btn btn-sm btn-primary btn-block">
    					</form>
            </div>

 <?php
if(isset($_GET['success'])){
echo "
<div class='alert alert-success-alt alert-dismissable'>
                <span class='glyphicon glyphicon-ok'></span>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>Listo! Legajo $listo agregado satisfactoriamente.</div>
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
      </div>
      <div class="jumbotron">
        <div class="row">
              <table id="example" class="display" cellspacing="0" width="100%">
                  <thead>
                      <th> Legajo </th>
                      <th> Apellido </th>
                      <th> Nombre </th>
                      <th> Eliminar </th>
                  </thead>
                    <tbody>
                      <?php while($permisos = sqlsrv_fetch_array( $stmt)){ ?>
                        <tr >
                            <td> <?php echo $permisos['legajo']; ?> </td>
                            <td> <?php echo $permisos['apellido']; ?> </td>
                            <td> <?php echo $permisos['nombre']; ?> </td>
                            <td> <a class="btn btn-primary btn-danger" role="button" legajo="<?php echo $permisos['legajo'];?>" > Eliminar </a> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
        </table>
<!--href="inc/quitar.php?legajo=<?php// echo $permisos['legajo'];?>&usuario=<?php// echo $_SESSION['legajo'];?>"-->
        </div>
      </div>
    </div> <!-- /container -->


  </body>
</html>
