<?php
require ("connectionbd.php");
$cod_pro= $_POST['cod'];	
$nom_pro= $_POST['nom'];	
$cat_pro= $_POST['cat'];	
$des_pro= $_POST['des'];	
$pre_pro= $_POST['pre'];	
$sab_pro= $_POST['sab'];	
$img_pro= $_FILES["img"]["name"];
$ruta=$_FILES["img"]["tmp_name"];
$destino="fotos/".$img_pro;
copy($ruta,$destino);

$query="Insert into productos (cod_pro,nom_pro,cat_pro,des_pro,pre_pro,sab_pro,img_pro,est_pro)values      ('$cod_pro','$nom_pro','$cat_pro','$des_pro','$pre_pro','$sab_pro','$destino','1')";
$result=mysqli_query($conn,$query);
if(!$result){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo id")</script> <?php  
	}


}else{
echo "registro insertado";
   header('location:../backend/'); 
}


?>