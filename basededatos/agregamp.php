<?php

require ("connectionbd.php");
$cod= $_POST['cod'];	
$nom= $_POST['nom'];		
$pre= $_POST['pre'];	
$can= $_POST['can'];	
$est= $_POST['est'];
$iva= $_POST['iva'];
$des= $_POST['des'];	
$query="INSERT INTO MateriaPrima(ID_MATERIAPRIMA,nombre,cantidad,descripcion,precio,iva,stock,estado,FK_ID_MEDIDACANTIDAD,FK_ID_TIPOMATERIAPRIMA) VALUES ('$cod','$nom','$can','$des','$pre','$iva','0','$est','1','1')";
$result=mysqli_query($conn,$query);
if(!$result){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo Código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
	header('location:../backend/Materia_Agregar.php'); 

}else{
echo "registro insertado";
   header('location:../backend/Materia_Ver.php'); 
}
?>