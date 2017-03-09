<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include('../inc/config.php');
include('../inc/validar.php');


//Busco las nacionalidades
$sql = "SELECT idEdificio, Descripcion FROM edificio";
$stmt = sqlsrv_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/clock.png" sizes="16x16">
    <title> Edificios </title>

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
                  <h4 class="text-center bg-info">Edificios</h4>
                <form class="form form-signup" role="form">
      						<div class="form-group">
      							<div class="input-group">
      								<span class="input-group-addon"><h5 class="text-center"><i class="fa fa-user fa-fw"></i> Edificio:</h5></span>
                    </div>
                      <input name="edificio" type="text" id="edificio" class="form-control" placeholder="Nuevo edificio" />
      						</div>
					        <input type="submit" name="Submit" value="AGREGAR"  class="btn btn-sm btn-primary btn-block">
    					</form>
            </div>

 <?php
if(isset($_GET['success'])){
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
                    <th> ID </th>
                    <th> Descripcion </th>
                    <th> Eliminar </th>
                  </thead>
                    <tbody>
                      <?php while($edificios = sqlsrv_fetch_array( $stmt)){ ?>
                        <tr >
                          <td> <?php echo $edificios['idEdificio']; ?> </td>
                          <td> <?php echo $edificios['Descripcion']; ?> </td>
                          <td> <a class="btn btn-primary btn-danger" role="button" legajo="<?php echo $edificios['idEdificio'];?>" > Eliminar </a> </td>
                        <?php } ?>
                    </tbody>
        </table>

        </div>
      </div>
    </div> <!-- /container -->


  </body>
</html>
