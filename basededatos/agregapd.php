<?php

require ("connectionbd.php");
$cod_pro= $_POST['cod'];	
$nom_pro= $_POST['nom'];	
$cat_pro= $_POST['cat'];	
$des_pro= $_POST['des'];	
$pre_pro= $_POST['pre'];	
$dur_pro= $_POST['dur'];
$sab_pro= $_POST['sab'];
$est_pro= $_POST['est'];	
$img_pro= $_FILES["img"]["name"];
$ruta=$_FILES["img"]["tmp_name"];
$destino="fotos/".$img_pro;
copy($ruta,$destino);
echo $cat_pro;
$query="Insert into CATPRODUCTO (ID_CATPRODUCTO,nombre,FK_ID_SUBTIPOPRODUCTO,descripcion,precio,sabor,imagen,estado,duracion,stock)values      ('$cod_pro','$nom_pro','$cat_pro','$des_pro','$pre_pro','$sab_pro','$destino','$est_pro','$dur_pro','1')";
$result=mysqli_query($conn,$query);
if(!$result){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo id")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}


}else{
echo "registro insertado";
   header('location:../backend/Productos_Ver.php'); 
}


?>