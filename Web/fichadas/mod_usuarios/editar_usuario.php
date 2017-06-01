<?php
include('../inc/config.php');
include('../inc/validar.php');

if(isset($_POST['empleado'])&&isset($_POST['rol'])){
    $empleado = $_POST['empleado'];
    $rol = $_POST['rol'];

    $sql = "UPDATE usuarios_web SET fk_rol = $rol WHERE idUsuario = $empleado";
    $error = sqlsrv_query($conn,$sql);

    if($error){
      header("Location: modificar_usuario?success");
      exit();
    }else{
      header("Location: modificar_usuario?errordb");
      exit();
    }



}else{
    header("Location:modificar_usuario.php?errordat");
    exit();
}

?>
