<?php

require ("connectionbd.php");
$can_agr= $_POST['can_ins'];	
$fec_agr= $_POST['fec_ins'];		
$codm_agr= $_POST['ins_r'];	
$codb_agr= $_POST['bod_r'];	
$mDate = new DateTime('now', new DateTimeZone('America/Bogota'));
$hoy=$mDate->format("H:i");
$fecha=date("Y-n-j",new DateTimeZone('America/Bogota'));
echo $fecha;

$sql_ins="SELECT nombre FROM Insumo WHERE ID_INSUMO='$codm_agr';";
$res_ins = mysqli_query($conn, $sql_ins);
$fila_ins=mysqli_fetch_array($res_ins);
$noins=$fila_ins['nombre'];

$sql_bod="SELECT descripcion FROM Bodega WHERE ID_BODEGA='$codb_agr';";
$res_bod = mysqli_query($conn, $sql_bod);
$fila_bod=mysqli_fetch_array($res_bod);

$sql_bm="INSERT INTO BODEGA_INSUMO(FK_ID_INSUMO,FK_ID_BODEGA,unidades) VALUES ('$codm_agr','$codb_agr','$can_agr');";

$res_bm=mysqli_query($conn,$sql_bm);
if(!$res_bm ){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
	//header('location:../backend/Materia_Agregar.php'); 

}else{
		$sql_bm2="UPDATE `insumo` SET stock=stock+'$can_agr' WHERE ID_INSUMO=$codm_agr";
var_dump($sql_bm2);
$res_bm2=mysqli_query($conn,$sql_bm2);
$razon="Se ha agregado un insumo con el id".$codm_agr." registrada a la bodega ".$codb_agr;
require ("connectionbd.php");
echo "registro insertado";
  header('location:../backend/Suministro_Agregar.php'); 
}
?>