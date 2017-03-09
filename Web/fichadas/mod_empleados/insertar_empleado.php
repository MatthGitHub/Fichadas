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

  echo "Legajo: ".$legajo." -- Nombre: ".$nombre." -- Apellido: ".$apellido." -- TipoDoc: ".$tipoDoc.
    " -- DNI: ".$documento." -- CUIL: ".$cuil." -- Domicilio: ".$domicilio." -- Sexo: ".$sexo." -- Func: ".$funcion.
    " -- Lugar: ".$lugar." -- Nac: ".$nacionalidad." -- Edif: ".$edificio." -- TipoEmp: ".$tipEmpleado." -- Correo: ".$correo.
    " -- FechaN: ".$fecha." -- Tel: ".$telefono." -- Cat.: ".$categoria." -- Sereno: ".$sereno." -- Activo: ".$activo.
    " -- Horas: ".$horas." -- Toler: ".$tolerancia." -- FechaI: ".$ingreso." -- Oficina: ".$oficop;
    //exit();

    //Busco si existe el nombre de usuario
    $slq = "SELECT * FROM empleados WHERE NumDocumento = '$documento'";
    $stmt = sqlsrv_query($conn,$sql);
    //Compruebo si existe el nombre de usuario
    if(sqlsrv_num_rows($stmt)>0){
      header("Location:nuevo_usuario.php?errordat");
      exit();
    }else{
      //Busco el ultimo idempleado
      $sql = "SELECT MAX(idEmpleado) as Num FROM empleados";
      $query = sqlsrv_query($conn,$sql);
      $idempleado = sqlsrv_fetch_array($query);
      $idempleado = $idempleado['Num'];
      $idempleado = $idempleado + 1;




      $sql = "INSERT INTO empleados
      (idEmpleado,Legajo,Nombre,Apellido,NumDocumento,Cuil,FechaNacimiento,Domicilio,Sexo,Categoria,Telefono,PersonalACargo,IdFoto,FechaIngreso,Activo,AdicionalPorFuncion,AntiguedadAnterior,Email,Esereno,ToleranciaTarde,HorasATrabajar,IdFuncion,idTipoEmpleado,idLugarTrabajo,idTipoDoc,IdNacionalidad,IdTipoFranco,IdEdificio,OficinaPersonal)
      VALUES ($idempleado,$legajo,'$nombre','$apellido','$documento','$cuil','$txtFecha','$domicilio','$sexo',$categoria,'$telefono',null,null,'$txtFechaIngreso',$activo,null,null,'$correo',$sereno,$tolerancia,$horas,$funcion,$tipEmpleado,$lugar,$tipoDoc,$nacionalidad,NULL,$edificio,$oficop)";

      $error = sqlsrv_query($conn,$sql);

      if($error){
        header("Location: nuevo_empleado.php?success");
        exit();
      }else{
        header("Location: nuevo_empleado.php?errordb");
        exit();
      }

    }

}else{
      header("Location:nuevo_empleado.php?errordat");
      exit();
}

?>
