<?php
  $_SESSION["logeado"] = "NO";
  //setcookie();
  session_destroy();
  session_unset();
  $parametros_cookies = session_get_cookie_params();
  setcookie(session_name(),0,1,$parametros_cookies["path"]);
  header ("Location: ../index.php");
  exit();
?>
