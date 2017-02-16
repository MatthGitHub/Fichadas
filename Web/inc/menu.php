<!-- Bootstrap -->
<script src="../js/bootstrap.min.js"></script>

<div class="navbar navbar-default" role="navigation">
<div class="container-fluid">
  <div class="navbar-header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">Bienvenido </a>
  </div>
  <div class="navbar-collapse collapse">
  <ul class="nav navbar-nav">
    <li class="active"><a href="../inc/inicio.php">Inicio</a></li>
    <li><a href="../mod_mis_fichadas/form_mis_fichadas.php">Mis fichadas</a></li>
    <?php if($_SESSION['permiso'] == 0){ ?>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Usuarios<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="../mod_usuarios/usuarios.php">Listar</a></li>
              <li><a href="../mod_usuarios/nuevo_usuario.php">Nuevo</a></li>
            </ul>
      </li>
    <?php } ?>
    <?php if($_SESSION['permiso'] == 0){ ?>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Empleados<span class="caret"></span></a>
          <ul class="dropdown-menu">
              <li><a href="../mod_empleados/empleados.php">Listar</a></li>
              <li><a href="../mod_empleados/nuevo_empleado.php">Nuevo</a></li>
              <li><a href="../mod_empleados/form_seleccionar_legajo_tarjeta.php">Tarjetas</a></li>
            </ul>
      </li>
    <?php } ?>
  </ul>
  <ul class="nav navbar-nav navbar-right">
    <li><a href="../mod_configuraciones/configuraciones.php"> Configuraciones </a></li>
    <li><a href="../mod_seguridad/form_cambiar_clave.php"> Cambiar clave </a></li>
    <li><a href=""> <?php echo $_SESSION["s_nombre_usuario"]; ?> </a></li>
    <li><a href="">Fecha:
    <?php
    // Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
    date_default_timezone_set('UTC');
    //Imprimimos la fecha actual dandole un formato
    echo date("d / m / Y");
    ?></a></li>
    <!-- <li><a href="cerrar_sesion.php">Salir</a></li> -->
  </ul>
  </div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</div>