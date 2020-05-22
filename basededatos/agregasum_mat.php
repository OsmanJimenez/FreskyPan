<?php

require ("connectionbd.php");



$can_agr= $_POST['can_mat'];	
$fec_agr= $_POST['fec_mat'];		
$fecv_agr= $_POST['fecv_mat'];	
$codm_agr= $_POST['mat_r'];	
$codb_agr= $_POST['bod_r'];	


$sql_mat="SELECT nombre FROM MateriaPrima WHERE ID_MATERIAPRIMA='$codm_agr';";
$res_mat = mysqli_query($conn, $sql_mat);
$fila_mat=mysqli_fetch_array($res_mat);
$nmt=$fila_mat['nombre'];
$tit="Duracion de la materia prima".$nmt;
$bod="Duracion de la materia prima".$nmt." del dia".$fec_agr;
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$dura=$fecv_agr;

  $Datein                    = date('d/m/Y H:i:s', strtotime($fec_agr));
    $Datefi                    = date('d/m/Y H:i:s', strtotime($fecv_agr));
    $inicio = _formatear($Datein);
    // y la formateamos con la funcion _formatear
function _formatear($fecha)
{
	return strtotime(substr($fecha, 6, 4)."-".substr($fecha, 3, 2)."-".substr($fecha, 0, 2)." " .substr($fecha, 10, 6)) * 1000;
}
    $final  = _formatear($Datefi);

$query_last = "SELECT MAX(id) AS id FROM Agenda";
$result_last = mysqli_query($conn, $query_last);
$fila_last = mysqli_fetch_array($result_last);
if(empty($fila_last)){$last_age=1;}else{$last_age=$fila_last['id']+1;}

$query_age="INSERT INTO `Agenda`( `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`)VALUES('$tit','$bod','http://localhost/linea/backend/Calendario/descripcion_evento.php?id=$last_age','event-success','$inicio','$final','$fec_agr','$fecv_agr')";
$rs4=mysqli_query($conn,$query_age);
if(!$rs4){
echo "error",mysqli_error($conn);
}
$sql_bod="SELECT descripcion FROM Bodega WHERE ID_BODEGA='$codb_agr';";
$res_bod = mysqli_query($conn, $sql_bod);
$fila_bod=mysqli_fetch_array($res_bod);
 

$sql_bm="INSERT INTO BODEGA_MATERIAPRIMA(FK_ID_MATERIAPRIMA,FK_ID_BODEGA,fechaVencimiento,unidades,FK_ID_AGENDA) VALUES
    ('$codm_agr',     '$codb_agr',  '$fecv_agr',    '$can_agr','$last_age');";
var_dump($sql_bm);
$res_bm=mysqli_query($conn,$sql_bm);
if(!$res_bm ){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
	//header('location:../backend/Materia_Agregar.php'); 

}else{
	$sql_bm2="UPDATE `materiaprima` SET stock=stock+'$can_agr' WHERE ID_MATERIAPRIMA=$codm_agr";
var_dump($sql_bm2);
$res_bm2=mysqli_query($conn,$sql_bm2);
$razon="Se ha agregado una nueva materia prima con el id".$codm_agr." registrada a la bodega ".$codb_agr;
require ("connectionbd.php");
echo "registro insertado";
  header('location:../backend/Suministro_Ver.php'); 
}
?>