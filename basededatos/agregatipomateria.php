<?php
require ("connectionbd.php");
$cod=$_POST['cod'];
$nom=$_POST['nom'];


$query="INSERT INTO TipoMateriaPrima(ID_TIPOMATERIAPRIMA,nombre)values('$cod','$nom')";
$result=mysqli_query($conn,$query);
if(!$result){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
	//header('location:../backend/Materia_Agregar.php'); 

}else{
  header('location:../backend/Materia_Agregar.php'); 
}
?>
