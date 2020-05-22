<?php
 
require ("connectionbd.php");
$nbg=$_POST['nbg2'];
$nm=$_POST['nimt'];
$ag=$_POST['age'];
$can_agr= $_POST['can_mat'];	
$stock= $_POST['can_mat2'];
$res=$stock-$can_agr;

$sql_bs="UPDATE materiaprima,bodega_materiaprima SET materiaprima.stock=materiaprima.stock-'$res',bodega_materiaprima.unidades='$can_agr' WHERE bodega_materiaprima.FK_ID_BODEGA='$nbg' and bodega_materiaprima.FK_ID_MATERIAPRIMA='$nm' and bodega_materiaprima.FK_ID_MATERIAPRIMA=MATERIAPRIMA.ID_MATERIAPRIMA and bodega_materiaprima.FK_ID_AGENDA='$ag';";

$res_bs=mysqli_query($conn,$sql_bs);
if(!$res_bs){

		echo "error",mysqli_error($conn);
	}else{
echo "registro insertado";
  header('location:../backend/Suministro_Ver.php'); 
}
?>