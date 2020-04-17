<?php
require ("connectionbd.php");
$cod_pro= $_POST['cod'];	
$nom_pro= $_POST['nom'];		
$cat_pro= $_POST['cat'];	
$des_pro= $_POST['des'];	
$pre_pro= $_POST['pre'];	
$sab_pro= $_POST['sab'];	
$est=$_POST['esta'];
if(strcasecmp($sab_pro,'1')==0){
	$sab_pro='Dulce';
}elseif (strcasecmp($sab_pro,'2')==0) {
	$sab_pro='Salado';
}elseif (strcasecmp($sab_pro,'3')==0) {
	$sab_pro='Agridulce';
}


		
		$actualizar = "UPDATE catproducto SET nombre='$nom_pro',FK_ID_SUBTIPOPRODUCTO='$cat_pro',descripcion='$des_pro',precio='$pre_pro',sabor='$sab_pro',estado='$est' where ID_CATPRODUCTO='$cod_pro'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
	
		if($ejecutar){
	
		header('location:../backend/Productos_Ver.php');
		}else{

			echo "error",mysqli_error($conn);
		}
		?>