<div class="container">
	<div class="col-sm-2">
    <nav class="nav-sidebar">
		<ul class="nav tabs">
					<li class=""><a href="#inicio" data-toggle="tab"><font color="white"> Configuraciones </font></a></li>
          <li class=""><a href="#tab1" data-toggle="tab"><font color="white"> Nacionalidades </font></a></li>
          <li class=""><a href="#tab2" data-toggle="tab"> <font color="white"> Lugar de trabajo </font></a></li>
          <li class=""><a href="#tab3" data-toggle="tab"> <font color="white"> Funciones </font></a></li>
          <li class=""><a href="#tab4" data-toggle="tab"> <font color="white"> Edificios </font></a></li>
		</ul>
	</nav>
</div>
<!-- tab content -->
<div class="tab-content">

<div class="tab-pane active text-style" id="inicio">
  <h2 class="text-center"><font color="white"> Configuraciones </font></h2>
         <p><font color="white"> Configuraciones generales del sistema. </font></p>
</div>

<div class="tab-pane text-style" id="tab1">
  <h2><font color="white"> Nacionalidades </font></h2>
         <?php include("nacionalidades.php"); ?>
</div>

<div class="tab-pane text-style" id="tab2">
  <h2><font color="white"> Lugar de Trabajo </font></h2>
		<?php include("lugartrabajo.php"); ?>
</div>
<div class="tab-pane text-style" id="tab3">
  <h2><font color="white"> Funciones </font></h2>
	<?php include("funciones.php"); ?>
</div>
<div class="tab-pane text-style" id="tab4">
  <h2><font color="white"> Edificios </font></h2>
         <?php include("edificios.php"); ?>
</div>
</div>


</div>
