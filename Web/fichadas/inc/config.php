<?php
$serverName = "10.20.130.242"; //serverName\instanceName
$connectionInfo = array( "Database"=>"KRONOSPERSONAL", "UID"=>"sa", "PWD"=>"tacuari");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn ) {
	    //echo "Conexión establecida.<br />";
      session_start();
}else{
     echo "Conexión no se pudo establecer.<br />";
     die( print_r( sqlsrv_errors(), true));
}

?>
