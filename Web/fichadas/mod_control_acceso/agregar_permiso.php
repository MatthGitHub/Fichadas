<?php
include('../inc/config.php');
include('../inc/validar.php');

if(isset($_POST['legajo'])){
    $legajo = $_POST['legajo'];
    $aLegajo = $_GET['agente'];

    // Valido si existe el legajo introducido
    $sql = "SELECT * FROM Empleados WHERE legajo = $legajo";
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $params = array();

    $existe = sqlsrv_query($conn,$sql,$params,$options);
    if(sqlsrv_num_rows($existe) > 0){
      //Valido que no este ya en la tabla el legajo introducido
      $sql = "SELECT * FROM Personal_fichadas_permisos WHERE Usuario = $aLegajo AND legajo = $legajo";
      $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
      $params = array();
      $existe = sqlsrv_query($conn,$sql,$params,$options);

      if(sqlsrv_num_rows($existe) > 0){
        header("Location: form_control_acceso.php?errordat&legajo={$aLegajo}");
        exit();
      }else{
        $sql = "INSERT INTO Personal_fichadas_permisos VALUES ( $aLegajo,$legajo)";
        sqlsrv_query($conn,$sql);
        header("Location: form_control_acceso.php?success&legajo={$aLegajo}&listo={$legajo}");
        exit();
      }
    }else{
      header("Location: form_control_acceso.php?errordat&legajo={$aLegajo}");
      exit();
    }


}


?>
