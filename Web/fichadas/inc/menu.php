

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
    <li class="active"><a href="inicio.php">Inicio</a></li>
    <li><a href="mis_fichadas.php">Mis fichadas</a></li>
    <?php if($_SESSION['permiso'] == 0){ ?>
    <li><a href="usuarios.php">Usuarios</a></li>
    <?php } ?>
  </ul>
  <ul class="nav navbar-nav navbar-right">

    <li><a href="form_cambiar_clave.php"> Cambiar clave </a></li>
    <li><a href=""> <?php echo $_SESSION["s_nombre_usuario"]; ?> </a></li>
    <li><a href="">Fecha:
    <?php
    // Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
    date_default_timezone_set('UTC');
    //Imprimimos la fecha actual dandole un formato
    echo date("d / m / Y");
    ?></a></li>
    <li><a href="inc/cerrar_sesion.php">Salir</a></li>
  </ul>
  </div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</div>
