<?php
session_start();
require ("connectionbd.php");
$cod= $_POST['cod'];
$fec= $_POST['fec'];	
$des= $_POST['des'];		
$cod_ped= $_POST['rcod_ped'];

$s_tip=$_POST['tip'];

$query_dev="INSERT INTO Devolucion(ID_DEVOLUCION,descripcion,fecha,estado,FK_ID_PEDIDO) VALUES ('$cod','$des','$fec','1','$cod_ped')";
$result_dev=mysqli_query($conn,$query_dev);

foreach ($_POST['check_mi'] as $index => $s_prod) {
	if($s_tip[$index]=="Materia"){
	$query_com="INSERT INTO DEVOLUCION_MATERIAPRIMA(FK_ID_DEVOLUCION,FK_ID_MATERIAPRIMA,cancelado) VALUES ('$cod','$s_prod','0');";
		$result_com=mysqli_query($conn, $query_com);
	}else{
		$query_com="INSERT INTO DEVOLUCION_INSUMO(FK_ID_DEVOLUCION,FK_ID_INSUMO,cancelado,estado) VALUES ('$cod','$s_prod','0');";
		$result_com=mysqli_query($conn, $query_com);
	}
}
if(!$result_dev || !$result_com){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
}else{
	$razon="Se agregó una devolución (".$cod.").";
	require ("reg_log.php");
   header('location:../backend/Devoluciones_Agregar.php'); 
}
?>
