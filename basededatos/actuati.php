<?php
session_start();
require ("connectionbd.php");
$cod=$_POST['cd'];
$nom=$_POST['nom'];
$cat=$_POST['cate'];
$id = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha modificado el tipo de producto ".$nom." con el id ".$cod;

$query="UPDATE subtipoproducto SET nombre='$nom',`FK_ID_TIPOPRODUCTO`='$cat' WHERE ID_SUBTIPOPRODUCTO='$cod'";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{

$query2="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id')";
		$result2=mysqli_query($conn,$query2);
		if(!$result2){
          echo "error",mysqli_error($conn);
		}
	header('location:../backend/TipoP_ver.php');
}


?>
