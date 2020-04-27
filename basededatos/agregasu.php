<?php
require ("connectionbd.php");
$cod=$_POST['cd'];
$nom=$_POST['nom'];
$id=$_POST['id'];


$query="Insert into subtipoproducto (ID_SUBTIPOPRODUCTO,nombre,FK_ID_TIPOPRODUCTO)values('$cod','$nom','$id')";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
	header('location:../backend/');
}


?>
