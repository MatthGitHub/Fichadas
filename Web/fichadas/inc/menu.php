<!-- Bootstrap -->
<script src="../js/bootstrap.min.js"></script>
<link href="../css/font-awesome.css" rel="stylesheet">
<link href="../css/font-awesome.min.css" rel="stylesheet">
<link href="../css/bootstrap.css" rel="stylesheet">

<div class="navbar navbar-default" role="navigation">
<div class="container-fluid">
  <div class="navbar-header">
	  <a class="navbar-brand" href="#"><p><img src="../images/escudobrc.gif" alt="Municipalidad Bariloche" align="middle" style="margin:0px 0px 0px 20px"></p></a>
  </div>
  <div class="navbar-collapse collapse">
	<ul class="nav navbar-nav">

		<li><a href="../inc/inicio.php"><i class="fa fa-home fa-fw"></i>Inicio</a></li>
		<li><a href="../mod_mis_fichadas/form_mis_fichadas.php"><i class="fa fa-clock-o fa-fw"></i>Mis fichadas</a></li>

		<?php if(($_SESSION['permiso'] == 0)||($_SESSION['permiso'] == 1)){ ?>
		  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-id-badge fa-fw"></i>Jefe a cargo <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="../mod_consulta_diaria/form_consulta_diaria.php">Parte diario</a></li>
				<li><a href="../mod_consulta_general/form_consulta_general.php">Consulta general de fichadas</a></li>
			  </ul>
		  </li>
		  <?php } ?>

		<?php if($_SESSION['permiso'] == 0){ ?>
		  <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-users fa-fw"></i>Usuarios <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				  <li><a href="../mod_usuarios/usuarios.php">Listar</a></li>
				  <li><a href="../mod_usuarios/nuevo_usuario.php">Nuevo</a></li>
				  <li><a href="../mod_usuarios/modificar_usuario.php">Modificar</a></li>
          <li><a href="../mod_usuarios/frm_reiniciar_clave.php">Reiniciar clave</a></li>
				</ul>
		  </li>
		  <?php } ?>
		  <?php if(($_SESSION['permiso'] == 0)||($_SESSION['permiso'] == 3)){ ?>
			<li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-pencil fa-fw"></i>Actualizaciones <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="../mod_empleados/empleados.php">Padron empleados</a></li>
					<li><a href="../mod_empleados/nuevo_empleado.php">Editar empleado</a></li>
					<li><a href="../mod_tipo_licencias/tipo_licencias.php">Tipo de licencias</a></li>
					<li><a href="../mod_ausencias/tipo_ausencias.php">Tipo de ausencias</a></li>
					<li><a href="../mod_nacionalidades/nacionalidades.php">Nacionalidades</a></li>
					<li><a href="../mod_funciones/funciones.php">Funciones</a></li>
					<li><a href="../mod_edificios/edificios.php">Edificios</a></li>
					<li><a href="../mod_lugares_trabajo/lugares_trabajo.php">Lugares de Trabajo</a></li>
					<li><a href="../mod_tipo_empleado/tipos_empleado.php">Tipo de empleados</a></li>
					<li><a href="../mod_ubicacion_reloj/ubicaciones_reloj.php">Ubicacion Relojes</a></li>
					<li><a href="../mod_motivos/motivos.php">Motivos entrega tarjeta</a></li>
				  </ul>
			</li>
		  <?php } ?>
		  <?php if(($_SESSION['permiso'] == 0)||($_SESSION['permiso'] == 3)){ ?>
			<li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-list-alt fa-fw"></i>Operaciones Frecuentes <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="../mod_control_acceso/form_seleccionar_legajo_control_acceso.php">Control de acceso a fichadas</a></li>
					<li><a href="../mod_control_acceso/form_copiar_control_acceso.php">Copiar control de acceso de usuario</a></li>
					<li><a href="../mod_consulta_general/form_consulta_general.php">Consulta general de fichadas</a></li>
					<li><a href="../mod_empleados/form_seleccionar_legajo_tarjeta.php">Asignar tarjeta a empleado</a></li>
					<li><a href="../mod_control_fichada_fuera_hora/form_consulta_salidas.php">Control salidas</a></li>
          <li><a href="../mod_control_llegada_tarde/form_control_tarde.php">Control llegadas tarde</a></li>
					<li><a href="../mod_empleados/form_seleccionar_legajo_modalidades.php">Asignar modalidades individualmente</a></li>
					<li><a href="#">Empleados por lugar de trabajo</a></li>
				  </ul>
			</li>
		  <?php } ?>
		  <?php if(($_SESSION['permiso'] == 0)||($_SESSION['permiso'] == 3)){ ?>
			<li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-list-alt fa-fw"></i>Listados <span class="caret"></span></a>
				<ul class="dropdown-menu">
					<li><a href="../mod_listados/form_listado_tipo_licencia.php">Tipo de Licencia / Mujeres</a></li>
          <li><a href="../mod_listados/form_listado_licencias.php">Listado de licencias</a></li>
        </ul>
			</li>
		  <?php } ?>
      <?php if(($_SESSION['permiso'] == 0)||($_SESSION['permiso'] == 3)){ ?>
			<li class="dropdown">
			  <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-telegram fa-fw"></i>Licencias <span class="caret"></span></a>
				<ul class="dropdown-menu">
          <?php if(($_SESSION['permiso'] == 0)||($_SESSION['permiso'] == 3)){ ?>
					<li><a href="../mod_licencias/form_seleccionar_legajo_licencia.php">Registrar Licencia</a></li>
          <?php } ?>
          <?php if(($_SESSION['permiso'] == 5)||($_SESSION['permiso'] == 6)){ ?>
					<li><a href="../mod_licencias/form_seleccionar_legajo_consulta_licencia.php">Consultar estado de licencias</a></li>
          <?php } else {?>
					<li><a href="../mod_licencias/form_consulta_licencia.php">Consultar estado de licencias</a></li>
          <?php }} ?>
				  </ul>
			</li>

    </ul>
	  <ul class="nav navbar-nav navbar-right">
		<li><a href="../mod_seguridad/form_cambiar_clave.php"><i class="fa fa-key fa-fw"></i> Cambiar clave</a></li>
		<li><a><i class="fa fa-user-circle-o fa-fw"></i> <?php echo $_SESSION["s_nombre_usuario"]; ?> </a></li>
		<li><a><i class="fa fa-calendar-o fa-fw"></i>
		<?php
		// Establecer la zona horaria predeterminada a usar. Disponible desde PHP 5.1
		date_default_timezone_set('UTC');
		//Imprimimos la fecha actual dandole un formato
		echo date("d / m / Y");
		?></a></li>
		<li><a href="../mod_seguridad/cerrar_sesion.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a></li>
	  </ul>
  </div><!--/.nav-collapse -->
</div><!--/.container-fluid -->
</div>
