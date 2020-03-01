<?php
require ("connectionbd.php");

$cod_dev=$_POST['cd'] ;	
$cod_con=$_POST['cod']; 	
$can_dev=$_POST['can']; 	
$des_dev=$_POST['des']; 	
$fec_dev=$_POST['fec']; 




$query="Insert into devolucion(cod_dev,cod_con,can_dev,des_dev,fec_dev,est_dev) values('$cod_dev','$cod_con','$can_dev','$des_dev','$fec_dev','1')";
$result=mysqli_query($conn,$query);

$cod_pro=$_POST['id'];	
$st_prn=$_POST['can'];	
$fec=$_POST['fecha'];	
$opt=$_POST['opt'];
	
if($opt=='Si'){
$query2="Insert into lote (fec,cod_pro,st_prn,est_lot)values('$fec','$cod_pro','$st_prn','1')";
$result2=mysqli_query($conn,$query2);
 if(!$result || !$result2){
echo "no se pudo 2",mysqli_error($conn);

}
}
if(!$result){
echo "no se pudo",mysqli_error($conn);

} else{
echo "registro insertado";
	header('location:../backend/');
}


?>
