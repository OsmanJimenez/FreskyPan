<?php
require ("connectionbd.php");
$idu= $_POST['cod'];	
$nom= $_POST['nom'];	
$ape= $_POST['ape'];	
$rol=$_POST['rol'];	
$pass=$_POST['pas'];



$query="Insert into usuario (ID_USUARIO,prNombre,prApellido,contrasena,rol)values('$idu','$nom','$ape','$pass','$rol')";
$result=mysqli_query($conn,$query);
/*$query2="Insert into telcl (ced_cl,tel_cl) values('$ced_cl','$tel_cl')";
$result2=mysqli_query($conn,$query2);*/
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
	header('location:../backend/');
}


?>
