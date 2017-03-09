<?php
include('../inc/config.php');
include('../inc/validar.php');
    // Primero comprobamos que ning�n campo est� vac�o y que todos los campos existan.
    if(isset($_POST['claveA']) && !empty($_POST['claveA']) && isset($_POST['claveN']) && !empty($_POST['claveN']) &&
	   ($_POST['claveA'] == $_POST['claveN'])){
        // Si entramos es que todo se ha realizado correctamente
		$claveA = md5($_POST['claveA']);
    $legajo=$_SESSION['legajo'];

        //Busco el idEmpleado con el legajo
        $stmt = sqlsrv_query($conn,"SELECT idEmpleado FROM empleados WHERE legajo = $legajo");
        $idEmpleado = sqlsrv_fetch_array($stmt);
        $idEmpleado = $idEmpleado['idEmpleado'];

        // Con esta sentencia SQL insertaremos los datos en la base de datos
        sqlsrv_query($conn,"UPDATE USUARIOS_WEB SET clave = '{$claveA}' WHERE idEmpleado = $idEmpleado");

        header("Location: form_cambiar_clave.php?success");
        exit();

    }else{
      header("Location: form_cambiar_clave.php?errordat");
      exit();
    }
?>
