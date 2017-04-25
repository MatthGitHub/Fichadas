<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include('../inc/config.php');
include('../inc/validar.php');



if($_POST['legajo']){
  $legajo = $_POST['legajo'];
  $existe = false;
}else{
  if($_GET['legajo']){
    $legajo = $_GET['legajo'];
    $existe = false;

    //Valido si la fecha desde no es anterior a la de hoy
    if($_POST['txtFechaDesde']&&$_POST['txtFechaHasta']){
      $desde = $_POST['txtFechaDesde'];
      $hasta = $_POST['txtFechaHasta'];
      $date = date_create(Date('d-m-Y'));
      $hoy = date_format($date, 'd-m-Y');
      $antiguedad = $_POST['antiguedad'];
      if($desde&&$hasta&&$desde >= $hoy){
        $existe = true;
        //Busco los feriados dentro de las fechas solicitadas
        $sql = "SELECT * FROM FERIADOS WHERE Fecha BETWEEN '$desde' AND '$hasta'";
        $stmt = sqlsrv_query($conn,$sql);

        $fI=strtotime($desde);
        $fF=strtotime($hasta);

        $dif = $fF - $fI;
        $solicitados = $dif/(60*60*24);

        while($feriados = sqlsrv_fetch_array($stmt)){
          for($i=$fI; $i<=$fF; $i+=86400){
              if(date("d-m-Y", $i) == date_format($feriados['Fecha'],'d-m-Y')){
                //echo "feriados<br>".date("d-m-Y", $i)."<br>";
                $solicitados--;
              }
          }
        }


        for($i=$fI; $i<=$fF; $i+=86400){
          $diaSemana = date('l', strtotime(date("Y-m-d", $i)));
          $diaSemana = date('N', strtotime($diaSemana));
          if($diaSemana == 6 || $diaSemana == 7){
          //  echo "findes<br>".date("d-m-Y", $i)."<br>";
            $solicitados--;
          }
        }

        if($solicitados > $antiguedad){
          $existe = false;
          header("Location:form_licencia.php?errordb&legajo=$legajo");
          exit();
        }
      }else{
       header("Location:form_licencia.php?errordat&legajo=$legajo");
       exit();
      }
  }
  }else{
    header("Location:form_seleccionar_legajo_licencia.php?errordat");
    exit();
  }
}

    //Calculo los dias de licencia que le corresponden
    $sql = "SELECT FechaIngreso FROM EMPLEADOS WHERE Legajo = $legajo";
    $stmt = sqlsrv_query($conn,$sql);
    $empleado = sqlsrv_fetch_array($stmt);
    $fechaI = date_format($empleado['FechaIngreso'],'Y-m-d');
    $date = date_create(Date('Y-m-d'));
    $hoy = date_format($date, 'Y-m-d');
    $antiguedad = $hoy - $fechaI;

    //Calculo todos los dias de licencias segun la antiguedad
    for($i = 1; $i <= $antiguedad; $i++){
      $diasLicencia = $diasLicencia+$i+10;
    }

    //Busco todas las licencias del empleado
    $sql = "SELECT DISTINCT a.desdeFecha, a.hastafecha, a.IdTipoAusencia
            FROM
            empleados E ,
            ausencias A ,
            tipoausencias TA
            WHERE
            e.legajo = $legajo
            AND a.IdTipoAusencia IN (7)
            AND e.idempleado = a.idempleado
            AND a.idtipoausencia = ta.idtipoausencia";
    $stmt = sqlsrv_query($conn,$sql);

    //Busco solos los dias habiles dentro de las fechas de las licencias
    $sql = "SELECT * FROM FERIADOS";
    $stmt2 = sqlsrv_query($conn,$sql);
    $j = 0;
    while($licencias = sqlsrv_fetch_array($stmt)){
      $j++;
      //echo "Licencia:".$j." diasLicencia:".$diasLicencia;
      $desde = date_format($licencias['desdeFecha'],'d-m-Y');
      $hasta = date_format($licencias['hastafecha'],'d-m-Y');
      $fI=strtotime($desde);
      $fF=strtotime($hasta);

      //echo "DesdeFecha:".$desde." - HastaFecha:".$hasta./*" - FI:".$fI." - FF:".$fF.*/"<br>";

      $dif = $fF - $fI;
      $dif = ($dif/(60*60*24))+1;
      $diasLicencia = $diasLicencia - $dif;

      //echo "Dif:".$dif."<br>";

      //Busco feriados entre fechas
      while($feriados = sqlsrv_fetch_array($stmt2)){
        for($i=$fI; $i<=$fF; $i+=86400){
            if(date("d-m-Y", $i) == date_format($feriados['Fecha'],'d-m-Y')){
              //echo "feriados<br>".$i/(60*60*24)." - ".date("d-m-Y", $i)."<br>";
              $diasLicencia++;
            }
        }
      }
      //Busco findes entre fechas
      for($i=$fI; $i<=$fF; $i+=86400){
        $diaSemana = date('l', strtotime(date("Y-m-d", $i)));
        $diaSemana = date('N', strtotime($diaSemana));
        if($diaSemana == 6 || $diaSemana == 7){
          //echo "findes<br>".($i/(60*60*24))." - ".date("d-m-Y", $i)."<br>";
          $diasLicencia++;
        }
      }


    }




    //Busco el idEmpleado y nombre
    $sql = "SELECT * FROM empleados WHERE legajo = $legajo";
    $stmt = sqlsrv_query($conn,$sql);
    $empleado = sqlsrv_fetch_array($stmt);
    $idEmpleado = $empleado['IdEmpleado'];
    $nombre = $empleado['Nombre']." ".$empleado['Apellido'];

    //Busco las licenias que tiene asignado el idEmpleado seleccionado
    $sql = "SELECT e.legajo , e.apellido , e.nombre , CONVERT(VARCHAR(12),a.desdefecha,3) as desdefecha ,
             CONVERT(VARCHAR(12),a.hastafecha,3) as hastafecha ,
            ta.descripcion AS TipoLicencia ,
            lt.descripcion
            FROM
            empleados E ,
            ausencias A ,
            tipoausencias TA ,
            lugardetrabajo LT
            WHERE
            e.legajo = $legajo
            AND e.idempleado = a.idempleado
            AND a.idtipoausencia = ta.idtipoausencia
            AND E.IDLUGARTRABAJO = lt.idlugartrabajo
            ORDER By  desdefecha";
    $stmt = sqlsrv_query($conn,$sql);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="../images/icons/clock.png" sizes="16x16">
    <title> Licencias </title>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script language='javascript' src="../js/jquery-1.12.3.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.es.js"></script>
    <link href="../css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">
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
      "scrollCollapse": true,
      "columnDefs": [{ type: 'date-uk', targets: 0 }],
      "order":[3,"desc"]
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

    <h4 class="text-center bg-info">Licencias</h4>

<div class="container">
  <?php if($existe){ ?>
   <form name="form1" method="post" action="guardar_licencia.php?legajo=<?php echo $legajo;?>">
  <?php }else{ ?>
    <form name="form1" method="post" action="form_licencia.php?legajo=<?php echo $legajo;?>">
  <?php } ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-body">
                <form class="form form-signup" role="form">
                  <div class="form-group">
      							<div class="input-group">
      								<span class="input-group-addon"><h5 class="text-center"><i class="fa fa-user fa-fw"></i> Empleado:</h5><?php echo $nombre; ?></span>
                    </div>
      						</div>
                  <div class="form-group">
                     <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-plane fa-fw"></i> Dias restantes</span>
                            <input name="antiguedad" type="text" class="form-control"  id="antiguedad" value="<?php echo $diasLicencia; ?>" readonly />
                     </div>
                  </div>
                  <div class="form-group">
                      <span class="input-group-addon"><i class="fa fa-users fa-fw"></i> Tipo licencias </span>
                      <div class="col-xs-15 selectContainer">
                        <select class="form-control" name="tipoLicencia">
                          <option value=13>Accidente de Trabajo</option>
                          <option value=12>Atencion Familiar</option>
                          <option value=8>Ausencia c/ Aviso</option>
                          <option value=27>Ausencia prolongada</option>
                          <option value=9>Ausencia sin aviso</option>
                          <option value=30>Baja</option>
                          <option value=28>Capacitacion</option>
                          <option value=16>Casamiento</option>
                          <option value=20>Cultural y/o deportiva</option>
                          <option value=19>Donacion de sangre</option>
                          <option value=37>Enfer. Fuera de termino</option>
                          <option value=2>Enfermedad</option>
                          <option value=26>Especial</option>
                          <option value=6>Firma planilla</option>
                          <option value=10>Franco compensatorio</option>
                          <option value=33>Franco Cultura</option>
                          <option value=32>Franco Defensa Civil</option>
                          <option value=25>Franco Terminal</option>
                          <option value=31>Franco Turismo</option>
                          <option value=3>Gremial</option>
                          <option value=14>Paternidad</option>
                          <option value=42>Permiso salida</option>
                          <option value=21>Por comision</option>
                          <option value=4>Por duelo</option>
                          <option value=22>Por estudios</option>
                          <option value=35>Por judaismo</option>
                          <option value=15>Por maternidad</option>
                          <option value=18>Por mudanza</option>
                          <option value=34>Razones particulares</option>
                          <option value=7>Reglamentaria</option>
                          <option value=29>Suspension</option>
                          <option value=17>Tramite jubilatorio</option>
                          <option value=24>Viaticos c/ resolucion</option>
                        </select>
                      </div>
                  </div>
                  <div class="form-group">
                    <span class="input-group-addon"> Desde </span>
                    <div class='input-group date' id='divMiCalendario'>
                      <?php if($existe){ ?>
                        <input name="txtFechaDesde" type='text' id="txtFechaDesde" class="form-control" value=<?php echo $desde; ?> readonly/>
                      <?php }else{ ?>
                        <input name="txtFechaDesde" type='text' id="txtFechaDesde" class="form-control" readonly/>
                        <?php } ?>
                      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                    </div>
                  </div>
                  <div class="form-group">
                    <span class="input-group-addon"> Hasta </span>
                    <div class='input-group date' id='divMiCalendario2'>
                      <?php if($existe){ ?>
                        <input name="txtFechaHasta" type='text' id="txtFechaHasta" class="form-control" value=<?php echo $hasta; ?> readonly/>
                      <?php }else{ ?>
                        <input name="txtFechaHasta" type='text' id="txtFechaHasta" class="form-control" readonly/>
                        <?php } ?>
                      <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                    </div>
                  </div>
                    <?php if($existe){ ?>
                  <div class="form-group">
                     <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-plane fa-fw"></i> Dias solicitados </span>
                            <input name="antiguedad" type="text" class="form-control"  id="antiguedad" value="<?php echo $solicitados; ?>" readonly />
                     </div>
                  </div>
                    <?php } ?>
                    <?php if($existe){ ?>
                  <div class="form-group">
                     <div class="input-group">
                         <span class="input-group-addon"><i class="fa fa-plane fa-fw"></i> Restantes post licencia </span>
                            <input name="restantes" type="text" class="form-control"  id="restantes" value="<?php echo $diasLicencia - $solicitados; ?>" readonly />
                     </div>
                  </div>
                    <?php } ?>
                    <?php if($existe){ ?>
                      <input type="submit" name="Submit" value="GUARDAR"  class="btn btn-sm btn-primary btn-block">
                     <?php }else{ ?>
                       <input type="submit" name="Submit" value="VALIDAR"  class="btn btn-sm btn-primary btn-block">
                     <?php } ?>
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
                    ×</button>La fecha debe ser mayor a la fecha de hoy.</div>
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
                    ×</button>La cantidad de dias solicitados es mayor que los dias de licencia restantes.</div>
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
<!--href="inc/quitar.php?legajo=<?php// echo $permisos['legajo'];?>&usuario=<?php// echo $_SESSION['legajo'];?>"-->
        </div>
      </div>
    </div> <!-- /container -->

    <script type="text/javascript">
    $('#divMiCalendario').datetimepicker({
      format: 'DD-MM-YYYY',
      autoclose: true
    });
    //$('#divMiCalendario').data("DateTimePicker").show();
    $('#divMiCalendario2').datetimepicker({
      format: 'DD-MM-YYYY',
      autoclose: true
    });
    //$('#divMiCalendario2').data("DateTimePicker").show();
    </script>
  </body>
</html>
