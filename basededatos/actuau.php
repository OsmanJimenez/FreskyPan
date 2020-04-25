<?php
        require ("connectionbd.php");
$id = $_POST['cod'];
$us=$_POST['nom'];
$ape=$_POST['ape'];
$rol=$_POST['rol'];
		$actualizar = "UPDATE usuario SET prNombre='$us',prApellido='$ape',rol='$rol' WHERE ID_USUARIO='$id'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
	
		if($ejecutar){
		
		header('location:../backend/Configuracion_Ver.php');
		}
		?>