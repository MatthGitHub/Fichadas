<?php

include('../inc/config.php');
include('../inc/validar.php');

//--------PDF---------------
require_once("../lib/pdf/class.ezpdf.php");


//Configuración de página-----------------

$pdf =& new Cezpdf('a4');

$pdf->selectFont('../lib/pdf/fonts/courier.afm');

$pdf->ezSetCmMargins(1,1,1.5,1.5);

//Fin configuración de página-----------------

//----------------------



//$legajo = $_SESSION['legajo'];
$legajo = 12275;
//echo "Desde: ".$_POST['txtFechaDesde']." Hasta: ".$_POST['txtFechaHasta'];
//exit();

//if(($_POST['txtFechaDesde'])&&($_POST['txtFechaHasta'])){

//$desde = $_POST['txtFechaDesde'];
$desde = "2017/03/01";

//$hasta = $_POST['txtFechaHasta'];
$hasta = "2017/03/20";

$sql = "SELECT CONVERT(VARCHAR(12),fecha,3) as fechaN,CONVERT(VARCHAR(8),hora,108) AS hora,entradasalida,tipo, ubicacionreloj+'('+CAST(numeroreloj as VARCHAR(2))+')' AS reloj FROM fichada f JOIN empleados e 	ON e.idempleado = f.idempleado JOIN ubicacionreloj u ON u.idReloj = f.idreloj WHERE legajo = $legajo AND fecha >= '$desde' AND fecha <= '$hasta' ORDER BY fecha DESC";

$stmt = sqlsrv_query($conn,$sql);

//Armado de las matrices-------------------------------------
$ixx = 0;
while($datatmp = sqlsrv_fetch_array($stmt)) {
	$ixx = $ixx+1;

    $data[] = array_merge($datatmp, array('num'=>$ixx));

}


$titles = array(

                //'num'=>'<b>Num</b>',

               	'fechaN'=>'<b>Fecha</b>',
              	'hora'=>' <b>Hora</b>',
				'entradasalida'=>' <b>ES</b>',
				'reloj'=>' <b>Reloj</b>',
				
            );


$pdf->ezText($txttit, 12);


$pdf->ezTable($data,$titles ,'' , $options);

$pdf->ezText("\n\n\n", 10);

$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);

$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();

