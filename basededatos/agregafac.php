<?php

require ("connectionbd.php");
$cod_fac= $_POST['codfac_txt'];	
$cod_ped= $_POST['codped_txt'];		
$fecha= $_POST['fecha'];
$query="INSERT INTO Factura(ID_FACTURA,fecha,FK_ID_PEDIDO) VALUES ('$cod_fac','$fecha','$cod_ped')";
$actualizar="UPDATE Pedido SET estado='0' WHERE ID_PEDIDO='$cod_ped'";
$result=mysqli_query($conn,$query);
mysqli_query($conn, $actualizar);
if(!$result){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}

}else{
echo "registro insertado";
   header('location:../backend/Facturas_Ver.php'); 
}
?>