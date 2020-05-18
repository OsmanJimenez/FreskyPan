<?php
session_start();
require ("connectionbd.php");
$cod= $_POST['cod_ped'];
$fecha= $_POST['fec'];	
$plazo= $_POST['pla'];		
$exig= $_POST['ex'];
$s_cant=$_POST['cant'];
$s_tip=$_POST['tip'];
$s_pre=$_POST['pre'];
$pro=$_POST['pro_r'];

$query_ped="INSERT INTO Pedido(ID_PEDIDO,plazo,fecha,exigencia,estado,FK_ID_AGENDA) VALUES ('$cod','$plazo','$fecha','$exig','1','90')";
$result_ped=mysqli_query($conn,$query_ped);

$query_pro="INSERT INTO PEDIDO_PROVEEDOR(FK_ID_PEDIDO,FK_ID_PROVEEDOR) VALUES ('$cod','$pro')";
$result_pro=mysqli_query($conn,$query_pro);

foreach ($_POST['check_mi'] as $index => $s_prod) {
	if($s_tip[$index]=="Materia prima"){
	$query_com="INSERT INTO PEDIDO_MATERIAPRIMA(FK_ID_PEDIDO,FK_ID_MATERIAPRIMA,precio,unidades,cancelado) VALUES ('$cod','$s_prod','$s_pre[$index]','$s_cant[$index]','0');";
		mysqli_query($conn, $query_com);
	}else{
		$query_com="INSERT INTO PEDIDO_INSUMO(FK_ID_PEDIDO,FK_ID_INSUMO,precio,unidades,cancelado) VALUES ('$cod','$s_prod','$s_pre[$index]','$s_cant[$index]','0');";
		mysqli_query($conn, $query_com);
	}
}

if(!$result_ped || !$result_pro){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
}else{
	$razon="Se agregó un pedido (".$cod.").";
	require ("reg_log.php");
   header('location:../backend/Pedidos_Agregar.php'); 
}
?>