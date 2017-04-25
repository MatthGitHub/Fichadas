<?php
include('../inc/config.php');
include('../inc/validar.php');

if(isset($_POST['emisor'])&&isset($_POST['receptor'])){
    $emisor = $_POST['emisor'];
    $receptor = $_POST['receptor'];

    // Valido si existe el legajo introducido
    $sql = "SELECT * FROM Empleados WHERE legajo = $receptor";
    $options =  array( "Scrollable" => SQLSRV_CURSOR_KEYSET );
    $params = array();

    $existe = sqlsrv_query($conn,$sql,$params,$options);
    if(sqlsrv_num_rows($existe) > 0){
      //Elimino la tabla temporal porque si existe no puedo hacer el insert into
      $sql = "DROP TABLE tmp_copiar_permisos_fichadas";

      sqlsrv_query($conn,$sql);

      // Inserto todos los legajos del emisor en la tabla.
      $sql = "SELECT * INTO tmp_copiar_permisos_fichadas
      FROM Personal_fichadas_permisos WHERE Usuario = $emisor";

      sqlsrv_query($conn,$sql);

      //Cambio el usuario emisor por el receptro en la tabla temporal
      $sql = "UPDATE tmp_copiar_permisos_fichadas SET Usuario = $receptor";

      sqlsrv_query($conn,$sql);

      //Agrego los nuevos regristros a la tabla de permisos
      $sql = "INSERT INTO Personal_fichadas_permisos SELECT * FROM tmp_copiar_permisos_fichadas";

      $error = sqlsrv_query($conn,$sql);

      if($error){
        header("Location: form_copiar_control_acceso.php?sucess");
        exit();
      }else{
        header("Location: form_copiar_control_acceso.php?errordb");
        exit();
      }

    }else{
      header("Location: form_copiar_control_acceso.php?errordat");
      exit();
    }
}else{
  header("Location: form_copiar_control_acceso.php?errordat");
  exit();
}



?>
