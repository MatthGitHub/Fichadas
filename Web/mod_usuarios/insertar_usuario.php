<?php
include('../inc/config.php');
include('../inc/validar.php');

if(!empty($_POST['empleado'])&&!empty($_POST['nombre'])&&!empty($_POST['rol'])){
    $nombre = $_POST['nombre'];
    $empleado = $_POST['empleado'];
    $rol = $_POST['rol'];

    //Busco si existe el nombre de usuario
    $slq = "SELECT * FROM usuarios_web WHERE nombre_usuario = '$nombre'";
    $stmt = mssql_query($sql,$conn);
    //Compruebo si existe el nombre de usuario
    if(mssql_num_rows($stmt)>0){
      header("Location:nuevo_usuario.php?errordat");
      exit();
    }else{
      $sql = "INSERT INTO usuarios_web (nombre_usuario,clave,idEmpleado,activo,fk_rol,idExtreme) VALUES ('$nombre','202cb962ac59075b964b07152d234b70',$empleado,1,$rol,null)";
      $error = mssql_query($sql,$conn);

      if($error){
        header("Location: nuevo_usuario?success");
        exit();
      }else{
        header("Location: nuevo_usuario?errordb");
        exit();
      }

    }

}else{
      header("Location:nuevo_usuario.php?errordat");
      exit();
}

?>
