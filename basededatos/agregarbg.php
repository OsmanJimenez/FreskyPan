<?php

require ("connectionbd.php");
$cod_pro= $_POST['cod'];		
$des_pro= $_POST['des'];
$est_pro= $_POST['est'];
$query="INSERT INTO Bodega(ID_BODEGA,descripcion,estado) VALUES ('$cod_pro','$des_pro','$est_pro');";
$result=mysqli_query($conn,$query);
if(!$result){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo Código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
	header('location:../backend/Bodegas_Agregar_Ver.php'); 

}else{
echo "registro insertado";
   header('location:../backend/Bodegas_Ver.php'); 
}


?>