<?php
include('../inc/config.php');
include('../inc/validar.php');

$sql = "SELECT * FROM TIPOLICENCIA";
$stmt = sqlsrv_query($conn,$sql);



?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/clock.png" sizes="16x16">
    <title> Tipo licencias </title>

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
               var usuario = $(this).attr('usuario');
               //Recogemos el valor del servicio
              var dataString = 'idEmpleado='+usuario;
              console.log(dataString);


               $.ajax({
                   type: "POST",
                   url: "inc/eliminar.php",
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

      <!-- Static navbar -->
     <!-- Static navbar -->
     <br>
      <?php include('../inc/menu.php'); ?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <h4 class="text-center bg-info">Tipo de licencias</h4>
        <div class="row">
              <table id="example" class="display" cellspacing="0" width="100%">
                	<thead>
                      <th> Identificador </th>
            					<th> Descripcion </th>
                      <th> Comentario </th>
                      <th> MaxDiasAlMes </th>
                      <th> MaxDiasPorLicencia </th>
                      <th> Dias Habiles </th>
                      <th> Eliminar </th>
                  </thead>
                    <tbody>
                    	<?php while($licencias = sqlsrv_fetch_array( $stmt)){ ?>
                        <tr class="success">
                            <td> <?php echo $licencias['IdTipoLicencia']; ?> </td>
                            <td> <?php echo $licencias['Descripcion']; ?> </td>
                            <td> <?php echo $licencias['Comentario']; ?> </td>
                            <td> <?php echo $licencias['MaxDiasAlMes']; ?> </td>
                            <td> <?php echo $licencias['MaxDiasporLicencia']; ?> </td>
                            <td> <?php echo $licencias['DiasHabiles']; ?> </td>
                            <td>  <a class="btn btn-primary btn-danger" role="button" usuario="<?php echo $licencias['IdTipoLicencia']; ?>"> Eliminar </a> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
              </table>

				</div>
      </div>

    </div> <!-- /container -->

  </body>
</html>
