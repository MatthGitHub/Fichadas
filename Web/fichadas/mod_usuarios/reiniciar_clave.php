<?php
include('../inc/config.php');
include('../inc/validar.php');

if(isset($_POST['empleado'])){
    $usuario = $_POST['empleado'];

    $sql = "SELECT idEmpleado FROM usuarios_web WHERE idUsuario = $usuario";

    $stmt = sqlsrv_query($conn,$sql);

    $empleado = sqlsrv_fetch_array($stmt);
    $empleado = $empleado['idEmpleado'];

    $sql = "SELECT legajo FROM empleados WHERE idEmpleado = $empleado";

    $stmt = sqlsrv_query($conn,$sql);

    $clave = sqlsrv_fetch_array($stmt);
    $clave = $clave['legajo'];
    $clave = md5($clave);

    $sql = "UPDATE usuarios_web SET clave = '$clave' WHERE idUsuario = $usuario";
    $error = sqlsrv_query($conn,$sql);
    //echo "Error:".$error;
    //exit();

    if($error){
      header("Location: frm_reiniciar_clave?success");
      exit();
    }else{
      header("Location: frm_reiniciar_clave?errordb");
      exit();
    }



}else{
    header("Location:frm_reiniciar_clave.php?errordat");
    exit();
}

?>
