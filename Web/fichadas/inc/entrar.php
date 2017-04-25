<?php
session_start();
// Configura los datos de tu cuenta
include('config.php');

if(isset($_POST['nombre_usuario']) && isset($_POST['contrasenia'])){
	if ($_POST['nombre_usuario']) {
		//Comprobacion del envio del nombre de usuario y contrasenia
		$nombre_usuario=htmlentities($_POST['nombre_usuario']);
		//$contrasenia=md5($_POST['contrasenia']);
		$contrasenia=md5($_POST['contrasenia']);



		if ($contrasenia==NULL) {
			header ("Location: ../index.php?nopass");
			exit();
		}else{
		$sql = "SELECT nombre_usuario,clave,activo,idEmpleado,fk_rol FROM USUARIOS_WEB WHERE nombre_usuario = '$nombre_usuario'";
		$stmt = sqlsrv_query($conn,$sql);

		$data = sqlsrv_fetch_array($stmt);

		if($data['clave'] != $contrasenia) {
			//echo "No a introducido una contrasenia correcta -"." Clave=".$contrasenia." - Original=".$data['clave'];
			header ("Location: ../index.php?errorpass");
			exit();
		}else{
			$sql = "SELECT legajo,e.idempleado,nombre_usuario,clave,fk_rol FROM USUARIOS_WEB uw JOIN empleados e ON uw.idEmpleado = e.idEmpleado WHERE nombre_usuario = '$nombre_usuario'";
			$stmt =sqlsrv_query($conn,$sql);
			$row = sqlsrv_fetch_array($stmt);
			$nombre_usuario2 = $row['nombre_usuario'];
			$_SESSION["s_nombre_usuario"] = $row['nombre_usuario'];

			$_SESSION["logeado"] = "SI";
			$_SESSION["permiso"] = $row['fk_rol'];
			$_SESSION["idempelado"] = $row['idempleado'];
			$_SESSION["legajo"] = $row['legajo'];
			$_SESSION["origen"] = "fichadas";
			if($data['activo'] != 1){
				session_destroy();
				header("Location: ../index.php?erroractiv");
				exit();
			}
			header ("Location: inicio.php");
			exit();
			}
		}
	}else{
		session_destroy();
		header("Location: ../index.php?errorpass");
		exit();
	}
}else{
	session_destroy();
	header("Location: ../index.php?errorpass");
	exit();
}
?>
