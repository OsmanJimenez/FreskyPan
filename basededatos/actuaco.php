<?php
require ("connectionbd.php");
$cod_con=$_POST['cod'];
$tip_con=$_POST['tip'];
$id_cl=$_POST['id2'];
$id_ped=$_POST['id'];
$fec_ent =$_POST['fec'];
$hor_ent=$_POST['hor'];



$query="UPDATE contratos SET tip_con='$tip_con',id_cl='$id_cl',id_ped='$id_ped',fec_ent='$fec_ent' ,hor_ent='$hor_ent'";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
	header('location:../backend/');
}


?>
