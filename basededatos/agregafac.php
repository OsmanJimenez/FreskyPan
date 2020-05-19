<?php
session_start();
require ("connectionbd.php");
$cod_fac= $_POST['codfac_txt'];	
$cod_ped= $_POST['codped_txt'];		
$fecha= $_POST['fecha'];

$query="INSERT INTO Factura(ID_FACTURA,fecha,FK_ID_PEDIDO) VALUES ('$cod_fac','$fecha','$cod_ped')";
$actualizar="UPDATE Pedido SET estado='0' WHERE ID_PEDIDO='$cod_ped'";
$result=mysqli_query($conn,$query);
$result2=mysqli_query($conn, $actualizar);
if(!$result || !$result2){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
}else{
	$razon="Se agregó una nueva factura (".$cod_fac.") de pedido (".$cod_ped.") y se sumó al suministro.";
	require ("reg_log.php");
   header('location:../backend/Facturas_Agregar.php'); 
}
?>