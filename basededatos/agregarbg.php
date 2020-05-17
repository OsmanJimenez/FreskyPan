<?php
session_start();
require ("connectionbd.php");
$cod_bg= $_POST['cod'];		
$des_bg= $_POST['des'];
$est_bg= $_POST['est'];
$query="INSERT INTO Bodega(ID_BODEGA,descripcion,estado) VALUES ('$cod_bg','$des_bg','$est_bg');";
$result=mysqli_query($conn,$query);
if(!$result){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo Código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}

}else{
	$razon="Se agregó una nueva bodega (".$cod_bg.").";
	require ("reg_log.php");
   header('location:../backend/Bodegas_Agregar.php'); 
}


?>