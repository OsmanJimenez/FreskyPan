<?php
require ("connectionbd.php");
$ced_cl= $_POST['ced'];	
$nom_cl= $_POST['nom'];	
$tel_cl= $_POST['tel'];	
$des_cl= $_POST['des'];	
$dir_cl= $_POST['dir'];	
$a1_cl= $_POST['a1'];	
$a2_cl= $_POST['a2'];	




$query="UPDATE clientes SET nom_cl='$nom_cl',des_cl='$des_cl',dir_cl='$dir_cl',a1_cl='$a1_cl',a2_cl='$a2_cl' where ced_cl='$ced_cl'";
$query2="UPDATE telcl set tel_cl='$tel_cl' where ced_cl='$ced_cl'";
$result=mysqli_query($conn,$query);
$result2=mysqli_query($conn,$query2);
if(!$result){
echo "no se pudo";

}else{
echo "registro insertado";
	header('location:../backend/');
}


?>
