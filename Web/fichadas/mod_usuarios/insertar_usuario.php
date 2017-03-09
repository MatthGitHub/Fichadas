<?php
include('../inc/config.php');
include('../inc/validar.php');

if(isset($_POST['empleado'])&&isset($_POST['nombre'])&&isset($_POST['rol'])){
    $nombre = $_POST['nombre'];
    $empleado = $_POST['empleado'];
    $rol = $_POST['rol'];


    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $params = array();

    //Busco si existe el nombre de usuario
    $slq = "SELECT * FROM usuarios_web WHERE nombre_usuario = '$nombre'";
    $stmt = sqlsrv_query($conn,$slq,$params,$options);

    //Busco el legajo para la clave
    $slq2 = "SELECT legajo FROM empleados WHERE idEmpleado = '$empleado'";
    $stmt2= sqlsrv_query($conn,$slq2);
    $clave = sqlsrv_fetch_array($stmt2);
    $clave = md5($clave['legajo']);

    //Compruebo si existe el nombre de usuario
    if(sqlsrv_num_rows($stmt) > 0){
      header("Location:nuevo_usuario.php?errordat");
      exit();
    }else{
      $sql = "INSERT INTO usuarios_web (nombre_usuario,clave,idEmpleado,activo,fk_rol,idExtreme) VALUES ('$nombre','$clave',$empleado,1,$rol,null)";
      $error = sqlsrv_query($conn,$sql);

      if($error){
        header("Location: nuevo_usuario?success");
        exit();
      }else{
        header("Location: nuevo_usuario?errordb");
        exit();
      }

    }

}else{
      echo "Nombre: ".$_POST['nombre'];
      echo " - Empleado: ".$_POST['empleado'];
      echo " - Rol: ".$_POST['rol'];
      //header("Location:nuevo_usuario.php?errordat");
      exit();
}

?>
