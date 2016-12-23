<?php
include('config');
include('validar');

$usuario = $_POST['usuario'];

//Busco el legajo
$sql = "SELECT * FROM usuarios_web WHERE nombre_usuario = '$usuario'"
$stmt = mssql_query($sql,$conn);
$legajo = mssql_fetch_array($stmt);
$legajo = $legajo['legajo'];

//Borro todos los registros con legajos asociados en control acceso fichadas
$sql = "DELETE FROM Personal_fichadas_permisos WHERE usuario = $legajo"
mssql_query($sql,$conn);

//Borro el usuario del sistema
$sql = "DELETE FROM usuarios_web WHERE nombre_usuario = '$usuario'";
mssql_query($sql,$conn);

header("Location: ../usuarios.php");
exit();
?>
