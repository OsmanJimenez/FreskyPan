<?php
require ("connectionbd.php");

$cod_dev=$_POST['cd'] ;	
$cod_con=$_POST['cod']; 	
$can_dev=$_POST['can']; 	
$des_dev=$_POST['des']; 	
$fec_dev=$_POST['fec']; 

$query="UPDATE devolucion set cod_con='$cod_con',can_dev='$can_dev',des_dev='$des_dev',          fec_dev='$fec_dev' where cod_dev='$cod_dev' ";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
	header('location:../backend/');
}


?>
