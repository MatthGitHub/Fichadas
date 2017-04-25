<?php
if(($_SESSION['logeado'] != "SI")||($_SESSION['origen'] != "fichadas")){
	header ("Location: ../index.php");
  exit();
}
?>
