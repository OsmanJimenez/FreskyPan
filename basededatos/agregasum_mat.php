<?php

require ("connectionbd.php");
$can_agr= $_POST['can_mat'];	
$fec_agr= $_POST['fec_mat'];		
$fecv_agr= $_POST['fecv_mat'];	
$codm_agr= $_POST['mat_r'];	
$codb_agr= $_POST['bod_r'];	
$mDate = new DateTime('now', new DateTimeZone('America/Bogota'));
$hoy=$mDate->format("H:i");

$sql_mat="SELECT nombre FROM MateriaPrima WHERE ID_MATERIAPRIMA='$codm_agr';";
$res_mat = mysqli_query($conn, $sql_mat);
$fila_mat=mysqli_fetch_array($res_mat);

$sql_bod="SELECT descripcion FROM Bodega WHERE ID_BODEGA='$codb_agr';";
$res_bod = mysqli_query($conn, $sql_bod);
$fila_bod=mysqli_fetch_array($res_bod);

$sql_lastc = "SELECT MAX(ID_CALENDARIO) AS idc FROM Calendario";
$res_lastc = mysqli_query($conn, $sql_lastc);
$fila_lastc = mysqli_fetch_array($res_lastc);
$last=$fila_lastc['idc']+1;

$sql_cal="INSERT INTO Calendario(ID_CALENDARIO,nombre,hora,detalles)VALUES('$last','Vencimiento de ".$fila_mat['nombre']."','$hoy','Ubicado en bodega ".$codb_agr.": ".$fila_bod['descripcion']."');";

$res_cal=mysqli_query($conn,$sql_cal);

$sql_bm="INSERT INTO BODEGA_MATERIAPRIMA(FK_ID_MATERIAPRIMA,FK_ID_BODEGA,fechaVencimiento,fechaRegistro,unidades,transaccion,FK_ID_CALENDARIO) VALUES ('$codm_agr','$codb_agr','$fecv_agr','$fec_agr','$can_agr','1','$last');";

$res_bm=mysqli_query($conn,$sql_bm);
if(!$res_cal || !$res_bm || !$res_mat || !$res_bod){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
	//header('location:../backend/Materia_Agregar.php'); 

}else{
echo "registro insertado";
  header('location:../backend/Suministro_Agregar.php'); 
}
?>