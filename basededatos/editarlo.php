<?php
require ("connectionbd.php");
$cod_pro= $_POST['id'];	
$st_prn= $_POST['st'];	
$fec=$_POST['fece'];	
$id=$_POST['idl'];

	

$query="UPDATE lote SET cod_pro='$cod_pro',st_prn='$st_prn' WHERE id_lot='$id' and fec='$fec' ";

$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo";

}else{
echo "registro insertado";
	header('location:../backend/');
}

?>