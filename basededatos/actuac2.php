<?php
require ("connectionbd.php");
$ced_cl= $_POST['ced'];	
$nom_cl= $_POST['pas'];	
	




$query="UPDATE clientes SET pas_cl='$nom_cl' where ced_cl='$ced_cl'";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo";

}else{
echo "registro insertado";
	header('location:../login');
}


?>