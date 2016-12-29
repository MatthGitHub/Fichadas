<?php
include('inc/config.php');
include('inc/validar.php');

if(isset($_POST['legajo'])){
    $legajo = $_POST['legajo'];
    $aLegajo = $_SESSION['legajo'];

    // Valido si existe el legajo introducido
    $sql = "SELECT * FROM Empleados WHERE legajo = $legajo";
    $existe = mssql_query($sql,$conn);
    if(mssql_num_rows($existe) > 0){
      //Valido que no este ya en la tabla el legajo introducido
      $sql = "SELECT * FROM Personal_fichadas_permisos WHERE Usuario = $aLegajo AND legajo = $legajo";
      $existe = mssql_query($sql,$conn);
      if(mssql_num_rows($existe) > 0){
        header("Location: form_control_acceso.php?errordat&legajo={$aLegajo}");
        exit();
      }else{
        $sql = "INSERT INTO Personal_fichadas_permisos VALUES ( $aLegajo,$legajo)";
        mssql_query($sql,$conn);
        header("Location: form_control_acceso.php?succes&legajo={$aLegajo}");
        exit();
      }
    }else{
      header("Location: form_control_acceso.php?errordat&legajo={$aLegajo}");
      exit();
    }


}


?>
