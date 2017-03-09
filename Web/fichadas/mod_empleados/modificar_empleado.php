<?php
include('../inc/config.php');
include('../inc/validar.php');

if(($_POST['legajo'])&&($_POST['nombre'])&&($_POST['apellido'])&&($_POST['tipoDoc'])&&($_POST['documento'])&&($_POST['sexo'])&&($_POST['txtFecha'])){

    $legajo = $_POST['legajo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tipoDoc = $_POST['tipoDoc'];
    $documento = $_POST['documento'];
    $cuil = $_POST['cuil'];
    $domicilio = $_POST['domicilio'];
    $sexo = $_POST['sexo'];
    $funcion = $_POST['funcion'];
    $lugar = $_POST['lugar'];
    $nacionalidad = $_POST['nacionalidad'];
    $edificio = $_POST['edificio'];
    $tipEmpleado = $_POST['empleado'];
    $correo = $_POST['correo'];
    $fecha = $_POST['txtFecha'];
    $telefono = $_POST['telefono'];
    $categoria = $_POST['categoria'];
    if($sereno == null){
      $sereno = 0;
    }else{
      $sereno = $_POST['sereno'];
    }

    $activo = $_POST['activo'];
    $horas = $_POST['horas'];
    $tolerancia = $_POST['tolerancia'];
    $ingreso = $_POST['txtFechaIngreso'];
    $oficop = $_POST['oficop'];

    $sql = "UPDATE empleados
            SET Nombre = '$nombre',
                Apellido = '$apellido',
                NumDocumento = '$documento',
                Cuil = '$cuil',
                FechaNacimiento = '$txtFecha',
                Domicilio = '$domicilio',
                Sexo = '$sexo',
                Categoria = $categoria,
                Telefono = '$telefono',
                FechaIngreso = '$txtFechaIngreso',
                Activo = $activo,
                Email = '$correo',
                Esereno = $sereno,
                ToleranciaTarde = $tolerancia,
                HorasATrabajar = $horas,
                IdFuncion = $funcion,
                idTipoEmpleado = $tipEmpleado,
                idLugarTrabajo = $lugar,
                idTipoDoc = $tipoDoc,
                IdNacionalidad = $nacionalidad,
                IdEdificio = $edificio,
                OficinaPersonal = $oficop
              WHERE Legajo = $legajo";

    $error = sqlsrv_query($conn,$sql);

    if($error){
      header("Location: nuevo_empleado.php?success");
      exit();
    }else{
      echo $error;
      header("Location: nuevo_empleado.php?errordb");
      exit();
    }

}else{
    header("Location:nuevo_empleado.php?errordat");
    exit();
}

?>
