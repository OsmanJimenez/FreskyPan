<?php
require ("connectionbd.php");
$cod=$_POST['cd'];
$nom=$_POST['nom'];
$cat=$_POST['cate'];


$query="UPDATE subtipoproducto SET nombre='$nom',`FK_ID_TIPOPRODUCTO`='$cat' WHERE ID_SUBTIPOPRODUCTO='$cod'";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
	header('location:../backend/TipoP_ver.php');
}


?>
