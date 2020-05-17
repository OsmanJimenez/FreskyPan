<?php
session_start();
require ("connectionbd.php");
$id = $_POST['cod'];
$us=$_POST['nom'];
$ape=$_POST['ape'];
$rol=$_POST['rol'];
$id90 = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha modificado al usuario : ".$nom." con el id : ".$idu." ,su rol actual es : ".$rol;
	$query90="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id90')";
	

	
		$actualizar = "UPDATE usuario SET prNombre='$us',prApellido='$ape',rol='$rol' WHERE ID_USUARIO='$id'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
	
		if($ejecutar){
		$result90=mysqli_query($conn,$query90);
		if(!$result90){
          echo "error",mysqli_error($conn);
		}
		header('location:../backend/Configuracion_Ver.php');
		}
		?>