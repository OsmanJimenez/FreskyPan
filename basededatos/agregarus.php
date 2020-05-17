<?php
session_start();
require ("connectionbd.php");
$idu= $_POST['cod'];	
$nom= $_POST['nom'];	
$ape= $_POST['ape'];	
$rol=$_POST['rol'];	
$pass=$_POST['pas'];

$id90 = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha añadido al usuario : ".$nom." con el id : ".$idu." con el rol ".$rol;
	$query90="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id90')";
	

$query="Insert into usuario (ID_USUARIO,prNombre,prApellido,contrasena,rol)values('$idu','$nom','$ape','$pass','$rol')";
$result=mysqli_query($conn,$query);
/*$query2="Insert into telcl (ced_cl,tel_cl) values('$ced_cl','$tel_cl')";
$result2=mysqli_query($conn,$query2);*/
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
	$result90=mysqli_query($conn,$query90);
		if(!$result90){
          echo "error",mysqli_error($conn);
		}
echo "registro insertado";
	header('location:../backend/Configuracion_Ver.php');
}


?>
