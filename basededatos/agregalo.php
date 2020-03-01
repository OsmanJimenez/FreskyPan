<?php
require ("connectionbd.php");
$cod_pro= $_POST['id'];	
$st_prn= $_POST['st'];	
$fec=$_POST['fecha'];	


	

$query="Insert into lote (fec,cod_pro,st_prn,est_lot)values('$fec','$cod_pro','$st_prn','1')";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
	header('location:../backend/');
}

?>