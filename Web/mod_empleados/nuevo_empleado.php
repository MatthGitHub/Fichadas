<?php
include('../inc/config.php');
include('../inc/validar.php');

if(isset($_POST['legajob'])){
  $legajo = $_POST['legajob'];

  $sql = "SELECT * FROM empleados WHERE legajo = $legajo";
  $query = mssql_query($sql);
  $cant = mssql_num_rows($query);

  if($cant > 0){
    $existe = 1;

    $sql = "SELECT * FROM empleados WHERE legajo = $legajo";
    $empleado = mssql_query($sql);
    $empleado = mssql_fetch_array($empleado);

    $legajo = $empleado['Legajo'];
    $doc = $empleado['NumDocumento'];
    $nombre = $empleado['Nombre'];
    $apellido = $empleado['Apellido'];
    $cuil = $empleado['Cuil'];
    $fechaNac = $empleado['FechaNacimiento'];
    $domicilio = $empleado['Domicilio'];
    $sexo = $empleado['Sexo'];
    $categoria = $empleado['Categoria'];
    $telefono = $empleado['Telefono'];
    $fechaIng = $empleado['FechaIngreso'];
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

  }
}
$sql = "SELECT idTipoDoc,Abreviacion FROM TIPODOCUMENTO";
$documento = mssql_query($sql,$conn);

$sql = "SELECT idFuncion, Descripcion FROM FUNCION";
$funcion = mssql_query($sql,$conn);

$sql = "SELECT idLugarTrabajo, Descripcion FROM LUGARDETRABAJO";
$lugar = mssql_query($sql,$conn);

$sql = "SELECT idNacionalidad, Descripcion FROM NACIONALIDAD";
$nacionalidad = mssql_query($sql,$conn);

$sql = "SELECT idEdificio, Descripcion FROM EDIFICIO";
$edificio = mssql_query($sql,$conn);

$sql = "SELECT idTipoEmpleado, Descripcion FROM TIPOEMPLEADO";
$tipoEmpleado = mssql_query($sql,$conn);


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
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
          <?php include("../inc/menu.php"); ?>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">

      <div class="container">
        <form name="form1" method="post" action="nuevo_empleado.php">
          <div class="row">
            <div class="col-md-4 col-md-offset-4">
              <div class="panel panel-default">
                <div class="panel-body"
                  <form class="form form-signup" role="form">
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                        <input name="legajob" type="text" id="legajob" class="form-control" placeholder="Buscar legajo si existe" />
                      </div>
                    </div>
                    <input type="submit" name="Submit" value="Buscar"  class="btn btn-sm btn-primary btn-block">
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
                    <h4 class="text-center bg-info"> Nuevo Empleado</h4>
                    <form class="form form-signup" role="form">
                      <div class="col-md-6 col-md-offset">
                        <div class="panel panel-default">
                                    <div class="form-group">
                                       <div class="input-group">
                                           <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"> Legajo </span></span>
                                            <? if($existe == 1){ ?>
                                              <input name="legajo" type="text" class="form-control"  id="legajo" value="<?php echo $legajo; ?>" />
                                           <? }else{ ?>
                                              <input name="legajo" type="text" class="form-control"  id="legajo" placeholder="Legajo" />
                                           <? } ?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                          <div class="input-group">
                                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"> Nombre </span></span>
                                              <? if($existe == 1){ ?>
                                              <input name="nombre" type="text" class="form-control"  id="nombre" value="<?php echo $nombre; ?>" />
                                              <? }else{ ?>
                                              <input name="nombre" type="text" class="form-control"  id="nombre" placeholder="Nombre" />
                                              <? } ?>
                                          </div>
                                      </div>

                                    <div class="form-group">
                                       <div class="input-group">
                                           <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"> Apellido </span></span>
                                           <? if($existe == 1){ ?>
                                           <input name="apellido" type="text" class="form-control"  id="apellido" value="<?php echo $apellido; ?>" />
                                           <? }else{ ?>
                                           <input name="apellido" type="text" class="form-control"  id="apellido" placeholder="Apellido" />
                                           <? } ?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"> Tipo documento </span></span>
                                        <div class="col-xs-15 selectContainer">
                                            <select class="form-control" id="tipoDoc" name="tipoDoc">
                                                <?php while($documentos = mssql_fetch_array($documento)){
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
                                           <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"> DNI </span></span>
                                           <? if($existe == 1){ ?>
                                           <input name="documento" type="text" class="form-control"  id="documento" value="<?php echo $doc; ?>" />
                                           <? }else{ ?>
                                           <input name="documento" type="text" class="form-control"  id="documento" placeholder="Nº de Documento" />
                                           <? } ?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"> CUIL </span></span>
                                            <? if($existe == 1){ ?>
                                            <input name="cuil" type="text" class="form-control"  id="cuil" value="<?php echo $cuil; ?>" />
                                            <? }else{ ?>
                                            <input name="cuil" type="text" class="form-control"  id="cuil" placeholder="C.U.I.L." />
                                            <? } ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                       <div class="input-group">
                                           <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"> Domicilio </span></span>
                                           <? if($existe == 1){ ?>
                                           <input name="domicilio" type="text" class="form-control"  id="domicilio" value="<?php echo $domicilio; ?>" />
                                           <? }else{ ?>
                                           <input name="domicilio" type="text" class="form-control"  id="domicilio" placeholder="Domicilio" />
                                           <? } ?>
                                       </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"> Sexo </span></span>
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
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"> Funcion </span></span>
                                        <div class="col-xs-15 selectContainer">
                                            <select class="form-control" name="funcion" id="funcion">
                                                <?php while($funciones = mssql_fetch_array($funcion)){
                                                if($func == $funciones['idFuncion']){ ?>
                                                <option value=<?php echo $funciones['idFuncion']; ?> selected ><?php echo $funciones['Descripcion']; ?></option>
                                                <?php }else{ ?>
                                                <option value=<?php echo $funciones['idFuncion']; ?>><?php echo $funciones['Descripcion']; ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"> Lugar de trabajo </span></span>
                                        <div class="col-xs-15 selectContainer">
                                            <select class="form-control" name="lugar" id="lugar">
                                                <?php while($lugares = mssql_fetch_array($lugar)){
                                                if($lug == $lugares['idLugarTrabajo']){ ?>
                                                <option value=<?php echo $lugares['idLugarTrabajo']; ?> selected ><?php echo $lugares['Descripcion']; ?></option>
                                                <?php }else{ ?>
                                                <option value=<?php echo $lugares['idLugarTrabajo']; ?>><?php echo $lugares['Descripcion']; ?></option>
                                                <?php }} ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <span class="input-group-addon"><span class="glyphicon glyphicon-user"> Nacionalidad </span></span>
                                        <div class="col-xs-15 selectContainer">
                                            <select class="form-control" id="nacionalidad" name="nacionalidad">
                                                <?php while($nacionalidades = mssql_fetch_array($nacionalidad)){
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
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-user"> Edificio </span></span>
                                  <div class="col-xs-15 selectContainer">
                                      <select class="form-control" id="edificio" name="edificio">
                                          <?php while($edificios = mssql_fetch_array($edificio)){
                                          if($edif == $edificios['idEdificio']){ ?>
                                          <option value=<?php echo $edificios['idEdificio']; ?> selected ><?php echo $edificios['Descripcion']; ?></option>
                                          <?php }else{ ?>
                                          <option value=<?php echo $edificios['idEdificio']; ?>><?php echo $edificios['Descripcion']; ?></option>
                                          <?php }} ?>
                                      </select>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-user"> Tipo empleado </span></span>
                                  <div class="col-xs-15 selectContainer">
                                      <select class="form-control" id="empleado" name="empleado">
                                          <?php while($empleados = mssql_fetch_array($tipoEmpleado)){
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
                                         <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"> Email </span></span>
                                         <? if($existe == 1){ ?>
                                         <input name="correo" type="text" class="form-control"  id="correo" value="<?php echo $email; ?>" />
                                         <? }else{ ?>
                                         <input name="correo" type="text" class="form-control"  id="correo" placeholder="Correo" />
                                         <? } ?>
                                     </div>
                                 </div>

                              <div class="form-group">
                                <span class="input-group-addon"> Fecha nacimiento </span>
                                <div class='input-group date' id='divMiCalendario'>
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                  <? if($existe == 1){ ?>
                                  <input name="txtFecha" type='text' id="txtFecha" class="form-control" value="<?php echo $fechaNac; ?>"  readonly/>
                                  <? }else{ ?>
                                  <input name="txtFecha" type='text' id="txtFecha" class="form-control" placeholder="Fecha de nacimiento"  readonly/>
                                  <? } ?>
                                </div>
                              </div>

                              <div class="form-group">
                                <span class="input-group-addon"> Fecha Ingreso </span>
                                <div class='input-group date' id='divMiCalendario2'>
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                  <? if($existe == 1){ ?>
                                  <input name="txtFechaIngreso" type='text' id="txtFechaIngreso" class="form-control" value="<?php echo $fechaIng; ?>"  readonly/>
                                  <? }else{ ?>
                                  <input name="txtFechaIngreso" type='text' id="txtFechaIngreso" class="form-control" placeholder="Fecha de ingreso"  readonly/>
                                  <? } ?>
                                </div>
                              </div>

                              <div class="form-group">
                                 <div class="input-group">
                                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"> Telefono </span></span>
                                     <? if($existe == 1){ ?>
                                     <input name="telefono" type="text" class="form-control"  id="telefono" value="<?php echo $telefono; ?>" />
                                     <? }else{ ?>
                                     <input name="telefono" type="text" class="form-control"  id="telefono" placeholder="Telefono" />
                                     <? } ?>
                                 </div>
                              </div>

                              <div class="form-group">
                                 <div class="input-group">
                                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"> Categoria </span></span>
                                     <? if($existe == 1){ ?>
                                     <input name="categoria" type="text" class="form-control"  id="categoria" value="<?php echo $categoria; ?>" />
                                     <? }else{ ?>
                                     <input name="categoria" type="text" class="form-control"  id="categoria" placeholder="Categoria" />
                                     <? } ?>
                                 </div>
                              </div>

                              <div class="checkbox">
                                <? if($sereno == 1){ ?>
                                <label><input name="sereno" type="checkbox" value="1" checked>¿Es sereno?</label>
                                <? }else{ ?>
                                <label><input name="sereno" type="checkbox" value="1">¿Es sereno?</label>
                                <? } ?>
                              </div>

                              <div class="checkbox">
                                <? if($activo == 1){ ?>
                                <label><input name="activo" type="checkbox" value="1" checked > ACTIVO </label>
                                <? }else{ ?>
                                <label><input name="activo" type="checkbox" value="1" > ACTIVO </label>
                                <? } ?>
                              </div>

                              <div class="form-group">
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-user"> Horas que trabaja por dia </span></span>
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
                                  <span class="input-group-addon"><span class="glyphicon glyphicon-user"> Tolerancia llegadas tarde </span></span>
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
                                     <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"> Oficina Personal</span></span>
                                     <? if($existe == 1){ ?>
                                     <input name="oficop" type="text" class="form-control"  id="oficop" value="<?php echo $personal; ?>" />
                                     <? }else{ ?>
                                     <input name="oficop" type="text" class="form-control"  id="oficop" placeholder="Oficina Personal" />
                                     <? } ?>
                                 </div>
                              </div>
                          </div>
                        </div>
                <input type="submit" name="Submit" value="Guardar"  class="btn btn-sm btn-primary btn-block">
                </div>
              </form>
            </div>

<?php
if(isset($_GET['success'])){
echo "
<div class='alert alert-success-alt alert-dismissable'>
                <span class='glyphicon glyphicon-certificate'></span>
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
                <span class='glyphicon glyphicon-certificate'></span>
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
                <span class='glyphicon glyphicon-certificate'></span>
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
