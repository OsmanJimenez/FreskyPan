<?php
require ("connectionbd.php");
$Fec_ped=$_POST['fec'];		
$can_ped=$_POST['can'];	
$dir_ped=$_POST['dire'];	
$des_ped=$_POST['des'];	
$cod_pro=$_POST['cod'];
$ced=$_POST['ced'];
var_dump($dir_ped);
$query="Insert into pedidos (Fec_ped,can_ped,dir_ped,des_ped,cod_pro,ced_cl,est_ped )values('$Fec_ped','$can_ped','$dir_ped','$des_ped','$cod_pro','$ced','1')";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo";

}else{
header('location:../backend');
    
}


?>