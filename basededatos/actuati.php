<?php
require ("connectionbd.php");
$cod=$_POST['cd'];
$nom=$_POST['nom'];



$query="UPDATE tipoproducto SET nombre='$nom' WHERE ID_TIPOPRODUCTO='$cod'";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
	header('location:../backend/Tipo_ver.php');
}


?>
