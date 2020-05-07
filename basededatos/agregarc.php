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

$query="INSERT INTO proveedor(ID_PROVEEDOR,prNombre,segNombre,prApellido, segApellido,correo, estado) VALUES                   ('$cod'      ,'$nom','$nom2','$a1','$a2','$cor','$est')";

$result=mysqli_query($conn,$query);
$query2="INSERT INTO telefono(FK_ID_PROVEEDOR,ID_TELEFONO) VALUES ('$cod','$tel')";
$result2=mysqli_query($conn,$query2);
if(!$result || !$result2){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
	header('location:../backend/');
}


?>
