<?php
include('config.php');
include('validar.php');
    // Primero comprobamos que ning�n campo est� vac�o y que todos los campos existan.
    if(isset($_POST['claveA']) && !empty($_POST['claveA']) &&
    isset($_POST['claveN']) && !empty($_POST['claveN']) &&
	($_POST['claveA'] == $_POST['claveN'])){
        // Si entramos es que todo se ha realizado correctamente
		$claveA = md5($_POST['claveA']);
    $legajo=$_SESSION['legajo'];


        // Con esta sentencia SQL insertaremos los datos en la base de datos
        mssql_query("UPDATE USUARIOS_WEB SET clave = '{$claveA}' WHERE legajo = $legajo",$conn);

        include_once('cerrar_sesion.php');

    }
?>
