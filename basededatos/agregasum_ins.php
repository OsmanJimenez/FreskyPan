<?php

require ("connectionbd.php");
$can_agr= $_POST['can_ins'];	
$fec_agr= $_POST['fec_ins'];		
$codm_agr= $_POST['ins_r'];	
$codb_agr= $_POST['bod_r'];	
$mDate = new DateTime('now', new DateTimeZone('America/Bogota'));
$hoy=$mDate->format("H:i");

$sql_ins="SELECT nombre FROM Insumo WHERE ID_INSUMO='$codm_agr';";
$res_ins = mysqli_query($conn, $sql_ins);
$fila_ins=mysqli_fetch_array($res_ins);

$sql_bod="SELECT descripcion FROM Bodega WHERE ID_BODEGA='$codb_agr';";
$res_bod = mysqli_query($conn, $sql_bod);
$fila_bod=mysqli_fetch_array($res_bod);

$sql_lastc = "SELECT MAX(ID_CALENDARIO) AS idc FROM Calendario";
$res_lastc = mysqli_query($conn, $sql_lastc);
$fila_lastc = mysqli_fetch_array($res_lastc);
$last=$fila_lastc['idc']+1;

$sql_cal="INSERT INTO Calendario(ID_CALENDARIO,nombre,hora,detalles)VALUES('$last','Vencimiento de ".$fila_ins['nombre']."','$hoy','Ubicado en bodega ".$codb_agr.": ".$fila_bod['descripcion']."');";

$res_cal=mysqli_query($conn,$sql_cal);

$sql_bm="INSERT INTO BODEGA_INSUMO(FK_ID_INSUMO,FK_ID_BODEGA,fechaRegistro,unidades,transaccion,FK_ID_CALENDARIO) VALUES ('$codm_agr','$codb_agr','$fec_agr','$can_agr','1','$last');";

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