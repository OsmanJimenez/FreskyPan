<?php
        require ("connectionbd.php");
$id = $_POST['id'];
$us=$_POST['nom'];
$fe=$_POST['fec'];



		
		$actualizar = "UPDATE insumos SET nom='$us', fec='$fe' WHERE cod='$id'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
	
		if($ejecutar){
		
		header('location:../welcome.php');
		}
		?>