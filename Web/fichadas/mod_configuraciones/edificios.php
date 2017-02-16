<?php
include('../inc/config.php');
include('../inc/validar.php');

  //Busco las nacionalidades
  $sql = "SELECT idEdificio, Descripcion FROM edificio";
  $stmt = mssql_query($sql,$conn);


?>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
$(document).ready(function() {
  $('#edificio').DataTable( {
      "scrollY": "500px",
      "scrollCollapse": true
  } );

  $('#edificio tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
              $('#edificio').DataTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );



  $('.btn').click(function(){
       //Recogemos la id del contenedor padre
       var legajo = $(this).attr('legajo');
       //Recogemos el valor del servicio
       var usuario = "<?php echo $legajo; ?>";

       var dataString = 'legajo='+legajo+"&usuario="+usuario;
       console.log(dataString);

       $.ajax({
           type: "POST",
           url: "quitar.php",
           data: dataString,
           success: function() {
              var row = $(this).closest('tr').attr('id');
              //var nRow = row[0];
              $('#edificio').DataTable().row('.selected').remove().draw( false );
           }
       });
   });

});

</script>

  <style type="text/css">

     .media
    {
        /*box-shadow:0px 0px 4px -2px #000;*/
        margin: 10px 0;
        padding:15px;
    }
    .dp
    {
        border:10px solid #eee;
        transition: all 0.2s ease-in-out;
    }
    .dp:hover
    {
        border:2px solid #eee;
        transform:rotate(360deg);
        -ms-transform:rotate(360deg);
        -webkit-transform:rotate(360deg);
        /*-webkit-font-smoothing:antialiased;*/
    }


.alert-purple { border-color: #694D9F;background: #694D9F;color: #fff; }
.alert-info-alt { border-color: #B4E1E4;background: #81c7e1;color: #fff; }
.alert-danger-alt { border-color: #B63E5A;background: #E26868;color: #fff; }
.alert-warning-alt { border-color: #F3F3EB;background: #E9CEAC;color: #fff; }
.alert-success-alt { border-color: #19B99A;background: #20A286;color: #fff; }
.glyphicon { margin-right:10px; }
.alert a {color: gold;}

.input-group-addon
{
    background-color: rgb(50, 118, 177);
    border-color: rgb(40, 94, 142);
    color: rgb(255, 255, 255);
}
.form-control:focus
{
    background-color: rgb(50, 118, 177);
    border-color: rgb(40, 94, 142);
    color: rgb(255, 255, 255);
}

  </style>



<div class="container">
	<form name="form1" method="post" action="agregar_permiso.php">
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body"
                <form class="form form-signup" role="form">
      						<div class="form-group">
      							<div class="input-group">
      								<span class="input-group-addon"><h5 class="text-center"> Edificio:</h5><span class="glyphicon glyphicon-user"><?php echo $usuario; ?></span> </span>
                    </div>
                      <input name="legajo" type="text" id="legajo" class="form-control" placeholder="Edificio a agregar" />
      						</div>
					        <input type="submit" name="Submit" value="Agregar"  class="btn btn-sm btn-primary btn-block">
    					</form>
            </div>

 <?php
if(isset($_GET['success'])){
echo "
<div class='alert alert-success-alt alert-dismissable'>
                <span class='glyphicon glyphicon-certificate'></span>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>Listo! Legajo agregado satisfactoriamente.</div>
";
}else{
echo "";
}
?>
<?php
if(isset($_GET['errordat'])){
echo "
<div class='alert alert-warning-alt alert-dismissable'>
                <span class='glyphicon glyphicon-certificate'></span>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>El legajo no existe o ya se encuentra en la tabla.</div>
";
}else{
echo "";
}
?>
<?php
if(isset($_GET['errordb'])){
echo "
<div class='alert alert-danger-alt alert-dismissable'>
                <span class='glyphicon glyphicon-certificate'></span>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                    ×</button>Error, no ha introducido todos los datos.</div>
";
}else{
echo "";
}
?>
        </div>
    </div>
</div>
</form>

      <div class="jumbotron">
        <div class="row">
              <table id="edificio" class="display" cellspacing="0" width="100%">
                  <thead>
                      <th> ID </th>
                      <th> Descripcion </th>
                      <th> Quitar </th>
                  </thead>
                    <tbody>
                      <?php while($edificios = mssql_fetch_array( $stmt)){ ?>
                        <tr >
                            <td> <?php echo $edificios['idEdificio']; ?> </td>
                            <td> <?php echo $edificios['Descripcion']; ?> </td>
                            <td> <a class="btn btn-primary btn-danger" role="button" legajo="<?php echo $edificios['idEdificio'];?>" > quitar </a> </td>
                        </tr>
                        <?php } ?>
                    </tbody>
        </table>
        </div>
        </div>

</div>
