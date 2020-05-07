<?php
require ("connectionbd.php");
$cod=$_POST['ced'];
$tel=$_POST['tel'];
$nom=$_POST['nom'];
$a1=$_POST['a1'];
$a2 =$_POST['a2'];
$nom2=$_POST['nom2'];
$cor=$_POST['cor'];
$est=$_POST['est'];



$query="UPDATE proveedor SET prNombre='$nom',segNombre='$nom2',prApellido='$a1',segApellido='$a2',correo='$cor',estado='est' WHERE ID_PROVEEDOR='$cod'";
$query2="UPDATE telefono set ID_TELEFONO='$tel' where FK_ID_PROVEEDOR='$cod'";
$result=mysqli_query($conn,$query);
$result2=mysqli_query($conn,$query2);
if(!$result){
echo "no se pudo";

}else{
echo "registro insertado";
	header('location:../backend/');
}


?>
