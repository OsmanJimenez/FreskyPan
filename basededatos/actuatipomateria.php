<?php
session_start();
require ("connectionbd.php");
$cod=$_POST['cod'];
$nom=$_POST['nom'];


$query="UPDATE TipoMateriaPrima SET nombre='$nom' WHERE ID_TIPOMATERIAPRIMA='$cod'";
$result=mysqli_query($conn,$query);
if(!$result){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}

}else{
	$razon="Se modificó un tipo de materia prima (".$nom.").";
	require ("reg_log.php");
  header('location:../backend/Materia_Agregar.php'); 
}
?>
