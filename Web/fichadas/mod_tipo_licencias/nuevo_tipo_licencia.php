<?php

include('../inc/config.php');
include('../inc/validar.php');

$existe = 0;
if(isset($_POST['legajob'])){
  $legajo = $_POST['legajob'];
  $sql = "SELECT * FROM empleados WHERE legajo = $legajo";
  $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
  $params = array();
  $query = sqlsrv_query($conn,$sql,$params,$options);

  $cant  = sqlsrv_num_rows($query);

  if($cant > 0){
    $existe = 1;
    $sql = "SELECT * FROM empleados WHERE legajo = $legajo";
    $empleado = sqlsrv_query($conn,$sql);
    $empleado = sqlsrv_fetch_array($empleado);

    $legajo = $empleado['Legajo'];
    $doc = $empleado['NumDocumento'];
    $nombre = $empleado['Nombre'];
    $apellido = $empleado['Apellido'];
    $cuil = $empleado['Cuil'];
    $fechaNac = $empleado['FechaNacimiento']->format('d/m/Y');
    //$fechaNac = $empleado['FechaNacimiento'];
    $domicilio = $empleado['Domicilio'];
    $sexo = $empleado['Sexo'];
    $categoria = $empleado['Categoria'];
    $telefono = $empleado['Telefono'];
    $fechaIng = $empleado['FechaIngreso']->format('d/m/Y');
    //$fechaIng = $empleado['FechaIngreso'];
    $activo = $empleado['Activo'];
    $email = $empleado['Email'];
    $tolerancia = $empleado['ToleranciaTarde'];
    $horas = $empleado['HorasATrabajar'];
    $func = $empleado['IdFuncion'];
    $lug = $empleado['IdLugarTrabajo'];
    $tipoDoc = $empleado['IdTipoDoc'];
    $tipoEmp = $empleado['IdTipoEmpleado'];
    $edif = $empleado['IdEdificio'];
    $nacio = $empleado['IdNacionalidad'];
    $sereno = $empleado['Esereno'];
    $franco = $empleado['IdTipoFranco'];
    $personal = $empleado['OficinaPersonal'];

  }else{
    $sereno = 0;
    $activo = 0;
  }
}else{
  $legajo = '';
  $sereno = 0;
  $activo = 0;
}


$sql = "SELECT idTipoDoc,Abreviacion FROM TIPODOCUMENTO";
$documento = sqlsrv_query($conn,$sql);

$sql = "SELECT idFuncion, Descripcion FROM FUNCION";
$funcion = sqlsrv_query($conn,$sql);

$sql = "SELECT idLugarTrabajo, Descripcion FROM LUGARDETRABAJO";
$lugar = sqlsrv_query($conn,$sql);

$sql = "SELECT idNacionalidad, Descripcion FROM NACIONALIDAD";
$nacionalidad = sqlsrv_query($conn,$sql);

$sql = "SELECT idEdificio, Descripcion FROM EDIFICIO";
$edificio = sqlsrv_query($conn,$sql);

$sql = "SELECT idTipoEmpleado, Descripcion FROM TIPOEMPLEADO";
$tipoEmpleado = sqlsrv_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuevo Empleado</title>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script language='javascript' src="../js/jquery-1.12.3.js"></script>
      <script src="../js/bootstrap.js"></script>
    <script src="../js/moment.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.min.js"></script>
    <script src="../js/bootstrap-datetimepicker.es.js"></script>

    <!-- Bootstrap -->
    <script src="../js/bootstrap.min.js"></script>
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

        <div class="container">
          <br>
          <?php include("../inc/menu.php"); ?>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
		<h4 class="text-center bg-info">Editar Empleado</h4>
      <div class="container">
        <form name="form1" method="post" action="nuevo_empleado.php">
          <div class="row">
            <div class="col-md-4 col-md-offset-4">
              <div class="panel panel-default">
                <div class="panel-body"
                  <form class="form form-signup" role="form">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-search fa-fw"></i></span>
                        <input name="legajob" type="text" id="legajob" class="form-control" placeholder="Buscar legajo si existe" />
                      </div>
                    </div>
                    <input type="submit" name="Submit" value="BUSCAR"  class="btn btn-sm btn-primary btn-block">
                  </form>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>


<div class="container">
	<form name="form1" method="post" action="insertar_empleado.php">
    <div class="row">
        <div class="col-md-12 col-md-offset">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form form-signup" role="form">
                      <div class="col-md-6 col-md-offset">
                        <div class="panel panel-default">
                                    <div class="form-group">
                                       <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-folder fa-fw"></i> Legajo</span>
                                              <input name="legajo" type="text" class="form-control"  id="legajo" value="<?php echo $legajo; ?>" readonly />
                                       </div>
                                    </div>

                                    <div class="form-group">
                                          <div class="input-group">
                                              <span class="input-group-addon"><i class="fa fa-keyboard-o fa-fw"></i> Nombre</span>
                                              <?php if($existe == 1){ ?>
                                              <input name="nombre" type="text" class="form-control"  id="nombre" value="<?php echo $nombre; ?>" />
                                              <?php }else{ ?>
                                              <input name="nombre" type="text" class="form-control"  id="nombre" />
                                              <?php } ?>
                                          </div>
                                      </div>

                                    <div class="form-group">
                                       <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-keyboard-o fa-fw"></i> Apellido</span>
                                           <?php if($existe == 1){ ?>
                                           <input name="apellido" type="text" class="form-control"  id="apellido" value="<?php echo $apellido; ?>" />
                                           <?php }else{ ?>
                                           <input name="apellido" type="text" class="form-control"  id="apellido"/>
                                           <?php } ?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="input-group-addon"><i class="fa fa-id-card-o fa-fw"></i> Tipo documento</span>
                                        <div class="col-xs-15 selectContainer">
                                            <select class="form-control" id="tipoDoc" name="tipoDoc">
                                                <?php while($documentos = sqlsrv_fetch_array($documento)){
                                                if($documentos['idTipoDoc'] == $tipoDoc){ ?>
                                                <option value=<?php echo $documentos['idTipoDoc']; ?> selected ><?php echo $documentos['Abreviacion']; ?></option>
                                                <?php }else{ ?>
                                                <option value=<?php echo $documentos['idTipoDoc']; ?>><?php echo $documentos['Abreviacion']; ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-id-card fa-fw"></i> DNI</span>
                                           <?php if($existe == 1){ ?>
                                           <input name="documento" type="text" class="form-control"  id="documento" value="<?php echo $doc; ?>" />
                                           <?php }else{ ?>
                                           <input name="documento" type="text" class="form-control"  id="documento"/>
                                           <?php } ?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-id-badge fa-fw"></i> CUIL</span>
                                            <?php if($existe == 1){ ?>
                                            <input name="cuil" type="text" class="form-control"  id="cuil" value="<?php echo $cuil; ?>" />
                                            <?php }else{ ?>
                                            <input name="cuil" type="text" class="form-control"  id="cuil" />
                                            <?php } ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       <div class="input-group">
                                           <span class="input-group-addon"><i class="fa fa-map-marker fa-fw"></i> Domicilio</span>
                                           <?php if($existe == 1){ ?>
                                           <input name="domicilio" type="text" class="form-control"  id="domicilio" value="<?php echo $domicilio; ?>" />
                                           <?php }else{ ?>
                                           <input name="domicilio" type="text" class="form-control"  id="domicilio"/>
                                           <?php } ?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="input-group-addon"><i class="fa fa-venus-mars fa-fw"></i> Género</span>
                                        <div class="col-xs-15 selectContainer">
                                            <select class="form-control" name="sexo" id="sexo">
                                                <?php if($sexo == 'Masculino'){ ?>
                                                <option value="Masculino" selected >Masculino</option>
                                                <option value="Femenino">Femenino</option>
                                                <?php }else{ ?>
                                                <option value="Masculino">Masculino</option>
                                                <option value="Femenino" selected >Femenino</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="input-group-addon"><i class="fa fa-genderless fa-fw"></i> Funcion</span>
                                        <div class="col-xs-15 selectContainer">
                                            <select class="form-control" name="funcion" id="funcion">
                                                <?php while($funciones = sqlsrv_fetch_array($funcion)){
                                                if($func == $funciones['idFuncion']){ ?>
                                                <option value=<?php echo $funciones['idFuncion']; ?> selected ><?php echo $funciones['Descripcion']; ?></option>
                                                <?php }else{ ?>
                                                <option value=<?php echo $funciones['idFuncion']; ?>><?php echo $funciones['Descripcion']; ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="input-group-addon"><i class="fa fa-building fa-fw"></i> Lugar de trabajo</span>
                                        <div class="col-xs-15 selectContainer">
                                            <select class="form-control" name="lugar" id="lugar">
                                                <?php while($lugares = sqlsrv_fetch_array($lugar)){
                                                if($lug == $lugares['idLugarTrabajo']){ ?>
                                                <option value=<?php echo $lugares['idLugarTrabajo']; ?> selected ><?php echo $lugares['Descripcion']; ?></option>
                                                <?php }else{ ?>
                                                <option value=<?php echo $lugares['idLugarTrabajo']; ?>><?php echo $lugares['Descripcion']; ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="input-group-addon"><i class="fa fa-globe fa-fw"></i> Nacionalidad</span>
                                        <div class="col-xs-15 selectContainer">
                                            <select class="form-control" id="nacionalidad" name="nacionalidad">
                                                <?php while($nacionalidades = sqlsrv_fetch_array($nacionalidad)){
                                                  if($nacio == $nacionalidades['idNacionalidad']){ ?>
                                                <option value=<?php echo $nacionalidades['idNacionalidad']; ?> selected ><?php echo $nacionalidades['Descripcion']; ?></option>
                                                <?php }else{ ?>
                                                <option value=<?php echo $nacionalidades['idNacionalidad']; ?>><?php echo $nacionalidades['Descripcion']; ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>
                        </div>
                      </div>
                      <div class="col-md-6 col-md-offset">
                        <div class="panel panel-default">
                              <div class="form-group">
                                  <span class="input-group-addon"><i class="fa fa-building-o fa-fw"></i> Edificio</span>
                                  <div class="col-xs-15 selectContainer">
                                      <select class="form-control" id="edificio" name="edificio">
                                          <?php while($edificios = sqlsrv_fetch_array($edificio)){
                                          if($edif == $edificios['idEdificio']){ ?>
                                          <option value=<?php echo $edificios['idEdificio']; ?> selected ><?php echo $edificios['Descripcion']; ?></option>
                                          <?php }else{ ?>
                                          <option value=<?php echo $edificios['idEdificio']; ?>><?php echo $edificios['Descripcion']; ?></option>
                                          <?php }} ?>
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <span class="input-group-addon"><i class="fa fa-users fa-fw"></i> Tipo empleado</span>
                                  <div class="col-xs-15 selectContainer">
                                      <select class="form-control" id="empleado" name="empleado">
                                          <?php while($empleados = sqlsrv_fetch_array($tipoEmpleado)){
                                          if($tipoEmp == $empleados['idTipoEmpleado']){ ?>
                                          <option value=<?php echo $empleados['idTipoEmpleado']; ?>><?php echo $empleados['Descripcion']; ?></option>
                                          <?php }else{ ?>
                                          <option value=<?php echo $empleados['idTipoEmpleado']; ?>><?php echo $empleados['Descripcion']; ?></option>
                                          <?php }} ?>
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                     <div class="input-group">
                                         <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i> Email</span>
                                         <?php if($existe == 1){ ?>
                                         <input name="correo" type="text" class="form-control"  id="correo" value="<?php echo $email; ?>" />
                                         <?php }else{ ?>
                                         <input name="correo" type="text" class="form-control"  id="correo"/>
                                         <?php } ?>
                                     </div>
                                 </div>

                              <div class="form-group">
                                <span class="input-group-addon"> Fecha nacimiento </span>
                                <div class='input-group date' id='divMiCalendario'>

                                  <?php if($existe == 1){ ?>
                                  <input name="txtFecha" type='text' id="txtFecha" class="form-control" value="<?php echo $fechaNac; ?>"  readonly/>
                                  <?php }else{ ?>
                                  <input name="txtFecha" type='text' id="txtFecha" class="form-control" readonly/>
                                  <?php } ?>
								   <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                </div>
                              </div>

                              <div class="form-group">
                                <span class="input-group-addon"> Fecha Ingreso </span>
                                <div class='input-group date' id='divMiCalendario2'>
                                  <?php if($existe == 1){ ?>
                                  <input name="txtFechaIngreso" type='text' id="txtFechaIngreso" class="form-control" value="<?php echo $fechaIng; ?>"  readonly/>
                                  <?php }else{ ?>
                                  <input name="txtFechaIngreso" type='text' id="txtFechaIngreso" class="form-control" readonly/>
                                  <?php } ?>
								  <span class="input-group-addon"><i class="fa fa-calendar fa-fw"></i></span>
                                </div>
                              </div>

                              <div class="form-group">
                                 <div class="input-group">
                                     <span class="input-group-addon"><i class="fa fa-phone fa-fw"></i> Telefono</span>
                                     <?php if($existe == 1){ ?>
                                     <input name="telefono" type="text" class="form-control"  id="telefono" value="<?php echo $telefono; ?>" />
                                     <?php }else{ ?>
                                     <input name="telefono" type="text" class="form-control"  id="telefono" />
                                     <?php } ?>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <div class="input-group">
                                     <span class="input-group-addon"><i class="fa fa-star-o fa-fw"></i> Categoria</span>
                                     <?php if($existe == 1){ ?>
                                     <input name="categoria" type="text" class="form-control"  id="categoria" value="<?php echo $categoria; ?>" />
                                     <?php }else{ ?>
                                     <input name="categoria" type="text" class="form-control"  id="categoria"/>
                                     <?php } ?>
                                 </div>
                              </div>

                              <div class="checkbox">
                                <?php if($sereno == 1){ ?>
                                <label><input name="sereno" type="checkbox" value="1" checked>¿Es sereno?</label>
                                <?php }else{ ?>
                                <label><input name="sereno" type="checkbox" value="1">¿Es sereno?</label>
                                <?php } ?>
                              </div>

                              <div class="checkbox">
                                <?php if($activo == 1){ ?>
                                <label><input name="activo" type="checkbox" value="1" checked > ACTIVO </label>
                                <?php }else{ ?>
                                <label><input name="activo" type="checkbox" value="1" > ACTIVO </label>
                                <?php } ?>
                              </div>

                              <div class="form-group">
                                  <span class="input-group-addon"><i class="fa fa-clock-o fa-fw"></i> Horas Jornada Laboral </span>
                                  <div class="col-xs-15 selectContainer">
                                      <select class="form-control" name="horas">
                                        <?php
                                        if($existe == 1){
                                          switch ($horas) {
                                            case 1: ?>
                                                <option value=1 >1</option>
                                                <?php
                                                break;
                                            case 2: ?>
                                                <option value=2 >2</option>
                                                <?php
                                                break;
                                            case 3: ?>
                                                <option value=3>3</option>
                                                <?php
                                                break;
                                            case 4: ?>
                                                <option value=4 >4</option>
                                                <?php
                                                break;
                                            case 5: ?>
                                                <option value=5 >5</option>
                                                <?php
                                                break;
                                            case 6: ?>
                                                <option value=6 >6</option>
                                                <?php
                                                break;
                                            case 7: ?>
                                                <option value=7 >7</option>
                                                <?php
                                                break;
                                            case 8: ?>
                                                <option value=8 >8</option>
                                                <?php
                                                break;
                                            case 9: ?>
                                                <option value=9 >9</option>
                                                <?php
                                                break;
                                            case 10: ?>
                                                <option value=10 >10</option>
                                                <?php
                                                break;
                                              }     }else{ ?>
                                                <option value=1 >1</option>
                                                <option value=2 >2</option>
                                                <option value=3>3</option>
                                                <option value=4 >4</option>
                                                <option value=5 >5</option>
                                                <option value=6 >6</option>
                                                <option value=7 >7</option>
                                                <option value=8 >8</option>
                                                <option value=9 >9</option>
                                                <option value=10 >10</option>
                                                <?php } ?>
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <span class="input-group-addon"><i class="fa fa-handshake-o fa-fw"></i> Tolerancia Llegadas Tarde</span>
                                  <div class="col-xs-15 selectContainer">
                                    <select class="form-control" name="tolerancia">
                                      <?php
                                      if($existe == 1){
                                        switch ($tolerancia) {
                                          case 1: ?>
                                              <option value=1 >1</option>
                                              <?php
                                              break;
                                          case 2: ?>
                                              <option value=2 >2</option>
                                              <?php
                                              break;
                                          case 3: ?>
                                              <option value=3>3</option>
                                              <?php
                                              break;
                                          case 4: ?>
                                              <option value=4 >4</option>
                                              <?php
                                              break;
                                          case 5: ?>
                                              <option value=5 >5</option>
                                              <?php
                                              break;
                                          case 6: ?>
                                              <option value=6 >6</option>
                                              <?php
                                              break;
                                          case 7: ?>
                                              <option value=7 >7</option>
                                              <?php
                                              break;
                                          case 8: ?>
                                              <option value=8 >8</option>
                                              <?php
                                              break;
                                          case 9: ?>
                                              <option value=9 >9</option>
                                              <?php
                                              break;
                                          case 10: ?>
                                              <option value=10 >10</option>
                                              <?php
                                              break;
                                            }     }else{ ?>
                                              <option value=1 >1</option>
                                              <option value=2 >2</option>
                                              <option value=3>3</option>
                                              <option value=4 >4</option>
                                              <option value=5 >5</option>
                                              <option value=6 >6</option>
                                              <option value=7 >7</option>
                                              <option value=8 >8</option>
                                              <option value=9 >9</option>
                                              <option value=10 >10</option>
                                              <?php } ?>
                                    </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                 <div class="input-group">
                                     <span class="input-group-addon"><i class="fa fa-compass fa-fw"></i> Oficina Personal</span>
                                     <?php if($existe == 1){ ?>
                                     <input name="oficop" type="text" class="form-control"  id="oficop" value="<?php echo $personal; ?>" />
                                     <?php }else{ ?>
                                     <input name="oficop" type="text" class="form-control"  id="oficop"/>
                                     <?php } ?>
                                 </div>
                              </div>
                          </div>
                        </div>
                <input type="submit" name="Submit" value="GUARDAR"  class="btn btn-sm btn-primary btn-block">
                </div>
              </form>
            </div>

<?php
if(isset($_GET['success'])){
echo "
<div class='alert alert-success-alt alert-dismissable'>
                <span class='glyphicon glyphicon-ok'></span>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>Listo! Empleado creado satisfactoriamente.</div>";
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
                    ×</button> No ha introducido todos los datos </div>
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
                    ×</button>Error en la base de datos al intentar guardar.</div>
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
    </div> <!-- /container -->
    <script type="text/javascript">
    $('#divMiCalendario').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    $('#divMiCalendario2').datetimepicker({
      format: 'YYYY-MM-DD'
    });
    //$('#divMiCalendario').data("DateTimePicker").show();
    </script>
  </body>
</html>
