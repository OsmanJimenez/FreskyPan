<?php
require ("connectionbd.php");
$cod=$_POST['cd'];
$nom=$_POST['nom'];
$query="Insert into tipoproducto (ID_TIPOPRODUCTO,nombre)values('$cod','$nom')";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);
}else{
echo "registro insertado";
	header('location:../backend/');
}


?>
