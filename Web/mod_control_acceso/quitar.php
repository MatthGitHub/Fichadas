<?php
include('../inc/config.php');
include('../inc/validarQuitar.php');


$usuario = $_POST['usuario'];
$legajo = $_POST['legajo'];

$sql = "DELETE FROM Personal_fichadas_permisos WHERE usuario = $usuario AND legajo = $legajo";
mssql_query($sql,$conn);

header("Location: form_control_acceso.php?legajo={$usuario}");
exit();
?>
