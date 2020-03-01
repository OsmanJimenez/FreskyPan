<?php
require ("connectionbd.php");
$code=$_POST['idp'];
$Fec_ped=$_POST['fec'];		
$can_ped=$_POST['can'];	
$dir_ped=$_POST['dire'];	
$des_ped=$_POST['des'];	
$cod_pro=$_POST['cod'];
$ced=$_POST['ced'];
var_dump($dir_ped);
$query="UPDATE pedidos SET Fec_ped='$Fec_ped',can_ped='$can_ped',dir_ped='$dir_ped',des_ped='$des_ped',cod_pro='$cod_pro',ced_cl='$ced' where Id_ped='$code' ";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo";

}else{
header('location:../backend');
    
}

?>