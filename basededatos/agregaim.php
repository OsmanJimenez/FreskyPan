<?php

require ("connectionbd.php");
$cod= $_POST['cod'];	
$nom= $_POST['nom'];		
$pre= $_POST['pre'];	
$can= $_POST['can'];	
$est= $_POST['est'];
$iva= $_POST['iva'];
$tip= $_POST['tip'];
$des= $_POST['des'];
$pvr=$_POST['prv'];
$query="INSERT INTO Insumo(ID_INSUMO,nombre,cantidad,descripcion,precio,iva,stock,estado,FK_ID_TIPOINSUMO) VALUES ('$cod','$nom','$can','$des','$pre','$iva','0','$est','$tip')";
$query2="INSERT INTO `proveedor_insumo`(`FK_ID_PROVEEDOR`, `FK_ID_INSUMO`, `estado`) VALUES ('$pvr','$cod','1')";
echo $pvr;
$result=mysqli_query($conn,$query);
$result2=mysqli_query($conn,$query2);
if(!$result2){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
	header('location:../backend/Insumo_Agregar.php'); 

}else{
echo "registro insertado";
  header('location:../backend/Insumo_Ver.php'); 
}
?>