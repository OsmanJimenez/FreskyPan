<?php
session_start();
$id = $_SESSION['cl']['id_u'];
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
echo $est_pro;
$fecha=date("Y-m-d");
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');

$desc="Se ha añadido el producto ".$nom_pro." con el id ".$cod_pro;
$query="Insert into CATPRODUCTO (ID_CATPRODUCTO,nombre,FK_ID_SUBTIPOPRODUCTO,descripcion,precio,sabor,imagen,estado,duracion,stock)values      ('$cod_pro','$nom_pro','$cat_pro','$des_pro','$pre_pro','$sab_pro','$destino','$est_pro','$dur_pro','0')";
$result=mysqli_query($conn,$query);
if(!$result){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo id")</script> <?php  
	}else {
        echo "error",mysqli_error($conn);

	}


}else{
			$query2="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id')";
		$result2=mysqli_query($conn,$query2);
		if(!$result2){
          echo "error",mysqli_error($conn);
		}
		else{
echo "registro insertado";
   header('location:../backend/Productos_Ver.php'); 
}}



?>