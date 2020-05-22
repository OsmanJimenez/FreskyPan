<?php
 
require ("connectionbd.php");
$nbg=$_POST['nbg'];
$nins=$_POST['ninm'];
$reg=$_POST['ref'];
$can_agr= $_POST['can_ins'];	
$stock= $_POST['can_ins2'];
$res=$stock-$can_agr;

$sql_bs="UPDATE insumo,bodega_insumo,bodega SET insumo.stock=insumo.stock-'$res',bodega_insumo.unidades='$can_agr' WHERE bodega_insumo.FK_ID_BODEGA='$nbg' and bodega_insumo.FK_ID_INSUMO='$nins' and bodega_insumo.registro='$reg' and bodega_insumo.FK_ID_INSUMO=insumo.ID_INSUMO and bodega_insumo.FK_ID_BODEGA=bodega.ID_BODEGA;";

$res_bs=mysqli_query($conn,$sql_bs);
if(!$res_bs){

		echo "error",mysqli_error($conn);
	}else{
echo "registro insertado";
 header('location:../backend/Suministro_Ver.php'); 
}
?>