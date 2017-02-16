<?php
//$serverName = "SECUNDARIO\MSSQLSERVER"; //serverName\instanceName
//$connectionInfo = array( "Database"=>"KRONOSPERSONAL", "UID"=>"sa", "PWD"=>"");
//$conn = sqlsrv_connect( $serverName, $connectionInfo);

$conn = mssql_connect("10.20.130.17","sa","");


if( $conn ) {
	    mssql_select_db("KRONOSPERSONAL",$conn);
      session_start();
}else{
     echo "Conexión no se pudo establecer.<br />";
     //die( print_r( sqlsrv_errors(), true));
}

?>
