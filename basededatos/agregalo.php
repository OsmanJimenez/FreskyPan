<?php
require ("connectionbd.php");
$cod_pro= $_POST['id'];	
$canini= $_POST['ci'];	
$uni=$_POST['uni'];
$fec=$_POST['fecha'];	




$query="Insert into produccion (FK_ID_CALENDARIO,fechaProduccion,unidades,cantidadInicial,FK_ID_CATPRODUCTO)values                     ('1',            '$fec',         '$uni',   '$canini'         ,'$cod_pro')";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
$query="UPDATE catproducto SET stock=stock+'$canini' where ID_CATPRODUCTO='$cod_pro'";
$result=mysqli_query($conn,$query);	
echo "registro insertado";
	header('location:../backend/lotes_ver.php');
}

?>