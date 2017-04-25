<?php
//--------------------------------Inicio de sesion------------------------
include("../../lib/sesion.php"); 
if ($_SESSION['permiso'] != 'autorizado'){
	$mensaje="Usuario sin permisos";
	$destino="../index.php";
	header("location:../mensaje_error.php?mensaje=$mensaje&destino=$destino");
}
//--------------------------------Fin inicio de sesion------------------------

include("../../lib/funciones.php");
require_once("class.ezpdf.php");


//Configuración de página-----------------

$pdf =& new Cezpdf('a4');

$pdf->selectFont('../fonts/courier.afm');

$pdf->ezSetCmMargins(1,1,1.5,1.5);

//Fin configuración de página-----------------


//---------------Querys-----------------------------



$link=conectarse_mysql();


$usuario=$_SESSION['id'];

$fecha_desde_mysql=$_POST['pdf_fecha_desde'];
$fecha_hasta_mysql=$_POST['pdf_fecha_hasta'];

$oficina_personal=$_POST['pdf_oficina_personal'];

$motivo=$_POST['pdf_motivo'];

$legajo=$_POST['pdf_legajo'];


$fecha_desde=fecha_mysql_normal($fecha_desde_mysql);
$fecha_hasta=fecha_mysql_normal($fecha_hasta_mysql);					  


//-------Si legajo es vacio trae todos entre fechas----------------------
if ($legajo==""){


$query_certificados="select abierto,c.id_certificado as certificado,fecha_recibido,legajo,apellido,nombre,m.descripcion as motivo,fecha_inicio,fecha_fin,estado,ce.descripcion as ce_descripcion,descripcion_organigrama_original,descripcion_organigrama from 
certificados c inner join motivos m
on c.id_motivo=m.id_motivo
inner join historico_areas ha
on c.id_certificado=ha.id_certificado
inner join cert_estados ce
on c.estado=ce.id_estado
where 
((fecha_fin >= '$fecha_desde_mysql' and fecha_fin <= '$fecha_hasta_mysql') or 
(fecha_inicio >= '$fecha_desde_mysql' and fecha_inicio <= '$fecha_hasta_mysql') or
(fecha_inicio <= '$fecha_desde_mysql' and fecha_fin >= '$fecha_hasta_mysql') or
(fecha_inicio >= '$fecha_desde_mysql' and fecha_inicio <= '$fecha_hasta_mysql' and fecha_fin >= '$fecha_desde_mysql' and fecha_fin <= '$fecha_hasta_mysql'))
and personal like'$oficina_personal'
and c.id_motivo like '$motivo'
order by apellido";
}
else
{

if (strlen($legajo) < 8 and $legajo !="") {
		$repeticion=8-strlen($legajo);
		$relleno = str_repeat('0',$repeticion);
        $legajo = $relleno.$legajo;
    }

$query_certificados="select abierto,c.id_certificado as certificado,fecha_recibido,legajo,apellido,nombre,m.descripcion as motivo,fecha_inicio,fecha_fin,estado,ce.descripcion as ce_descripcion,descripcion_organigrama_original,descripcion_organigrama from 
certificados c inner join motivos m
on c.id_motivo=m.id_motivo
inner join historico_areas ha
on c.id_certificado=ha.id_certificado
inner join cert_estados ce
on c.estado=ce.id_estado
where 
((fecha_fin >= '$fecha_desde_mysql' and fecha_fin <= '$fecha_hasta_mysql') or 
(fecha_inicio >= '$fecha_desde_mysql' and fecha_inicio <= '$fecha_hasta_mysql') or
(fecha_inicio <= '$fecha_desde_mysql' and fecha_fin >= '$fecha_hasta_mysql') or
(fecha_inicio >= '$fecha_desde_mysql' and fecha_inicio <= '$fecha_hasta_mysql' and fecha_fin >= '$fecha_desde_mysql' and fecha_fin <= '$fecha_hasta_mysql'))
and legajo='$legajo'
and personal like '$oficina_personal'
and c.id_motivo like '$motivo'
order by apellido";
}
//-------FIN Si legajo es vacio trae todos entre fechas----------------------


$record_certificados=mysql_query($query_certificados,$link);

//--------------Fin querys----------------------------









//Armado de las matrices-------------------------------------
$ixx = 0;
while($datatmp = mysql_fetch_assoc($record_certificados)) {
	$ixx = $ixx+1;
	 $datatmp["legajo"]=(int)$datatmp["legajo"];
	$datatmp["fecha_recibido"]=fecha_mysql_normal($datatmp["fecha_recibido"]);
	$datatmp["fecha_inicio"]=fecha_mysql_normal($datatmp["fecha_inicio"]);
	
	if ($datatmp["abierto"]==1){
		$datatmp["fecha_fin"]="Abierto";
	}
	else
	{
		$datatmp["fecha_fin"]=fecha_mysql_normal($datatmp["fecha_fin"]);
	}
	
	if($datatmp["descripcion_organigrama"]==""){
			$datatmp["descripcion_organigrama"]=$datatmp["descripcion_organigrama_original"];
			}
			else
			{
			$datatmp["descripcion_organigrama"]=$datatmp["descripcion_organigrama"];
			}
	
	
    $data[] = array_merge($datatmp, array('num'=>$ixx));

}


$titles = array(

                //'num'=>'<b>Num</b>',

               	'legajo'=>'<b>legajo</b>',
              	'apellido'=>' <b>Apellido</b>',
				'nombre'=>' <b>Nombre</b>',
				'motivo'=>' <b>Motivo</b>',
				'fecha_recibido'=>' <b>Recibido</b>',
				'fecha_inicio'=>' <b>Inicio</b>',
				'fecha_fin'=>' <b>Fin</b>',
				'ce_descripcion'=>' <b>Estado</b>',
				'descripcion_organigrama'=>' <b>Area</b>',

            

            );


$options = array(

              	
'fontSize' => 7,
'rowGap' => 1,
                'xOrientation'=>'center',

                'width'=>600,
				
				'cols'=>array( 
'legajo' => array('justification'=>'left', 'width' => '30'), 
'apellido' => array('justification'=>'left', 'width' => '66'), 
'nombre' => array('justification'=>'left', 'width' => '60'), 
'motivo' => array('justification'=>'left', 'width' => '50'), 
'fecha_recibido' => array('justification'=>'left', 'width' => '50'), 
'fecha_inicio'=> array('justification'=>'left', 'width' => '50'), 
'fecha_fin' => array('justification'=>'left', 'width' => '50'), 
'ce_descripcion' => array('justification'=>'left', 'width' => '50'),
'descripcion_organigrama' => array('justification'=>'left', 'width' => '130'))

            );


// Fin armado de matrices-----------------------------------

switch ($oficina_personal) {
    case 1:
        $oficina="Oficina Centro Cívico";
        break;
    case 2:
        $oficina="Oficina Corralón";
        break;
    default:
       $oficina="Todas las oficinas";
};

if ($legajo==""){
	$txttit= "Listado de ausentes entre el día ".$fecha_desde." y el ".$fecha_hasta." - ".$oficina."\n";
}
else
{
	$txttit= "Ausentes del legajo ".$legajo." entre el día ".$fecha_desde." y el ".$fecha_hasta." - ".$oficina."\n";
}

 


$pdf->ezText($txttit, 12);


$pdf->ezTable($data,$titles ,'' , $options);

$pdf->ezText("\n\n\n", 10);

$pdf->ezText("<b>Fecha:</b> ".date("d/m/Y"), 10);

$pdf->ezText("<b>Hora:</b> ".date("H:i:s")."\n\n", 10);
$pdf->ezStream();

?>