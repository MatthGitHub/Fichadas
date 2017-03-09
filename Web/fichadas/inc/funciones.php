<?php
include('validar.php');


function HoraEntrada($idEmpleado,$fecha,$conn){
  $sql = "SELECT CONVERT(VARCHAR(8),Hora,108) AS Hora FROM FICHADA WHERE IdEmpleado = $idEmpleado AND Fecha = '$fecha' AND EntradaSalida = 'E'";

  $stmt = sqlsrv_query($conn, $sql);

  $hora = sqlsrv_fetch_array($stmt);

  $hora = $hora['Hora'];

  return $hora;

}

?>
