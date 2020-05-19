<?php
session_start();
require ("connectionbd.php");
$cod_pro= $_POST['cod'];	
$nom_pro= $_POST['nom'];		
$cat_pro= $_POST['cat'];	
$des_pro= $_POST['des'];	
$pre_pro= $_POST['pre'];	
$sab_pro= $_POST['sab'];	
$est=$_POST['esta']; 
$img_pro= $_FILES["img"]["name"];
$ruta=$_FILES["img"]["tmp_name"];
$destino="fotos/".$img_pro;
copy($ruta,$destino);

$id = $_SESSION['cl']['id_u'];
$fecha=date("Y-m-d");
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha modificado el producto ".$nom_pro." con el id ".$cod_pro;
if(strcasecmp($sab_pro,'1')==0){
	$sab_pro='Dulce';
}elseif (strcasecmp($sab_pro,'2')==0) {
	$sab_pro='Salado';
}elseif (strcasecmp($sab_pro,'3')==0) {
	$sab_pro='Agridulce';
}
if(empty(($img_pro))){
$actualizar1 = "UPDATE catproducto SET nombre='$nom_pro',FK_ID_SUBTIPOPRODUCTO='$cat_pro',descripcion='$des_pro',precio='$pre_pro',sabor='$sab_pro',estado='$est' where ID_CATPRODUCTO='$cod_pro'";
		
$ejecutar1 = mysqli_query($conn, $actualizar1);
	
if($ejecutar1){
	
header('location:../backend/Productos_Ver.php');
}else{

			echo "error",mysqli_error($conn);
		}
}else if(!(empty(($img_pro)))) {
	$actualizar = "UPDATE catproducto SET nombre='$nom_pro',FK_ID_SUBTIPOPRODUCTO='$cat_pro',descripcion='$des_pro',precio='$pre_pro',sabor='$sab_pro',estado='$est',imagen='$destino' where ID_CATPRODUCTO='$cod_pro'";
		
$ejecutar = mysqli_query($conn, $actualizar);
	
if($ejecutar){

				

}else{

			echo "error",mysqli_error($conn);
		}
}
$query2="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id')";
		$result2=mysqli_query($conn,$query2);
		header('location:../backend/Productos_Ver.php');
		if(!$result2){
          echo "error",mysqli_error($conn);
          
		}
		?>