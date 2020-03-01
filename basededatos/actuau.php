<?php
        require ("connectionbd.php");
$id = $_POST['id'];
$us=$_POST['nom'];
$ape=$_POST['ape'];

$con=$_POST['con'];
$tip=$_POST['tip'];


		
		$actualizar = "UPDATE user SET nom_u='$us', Ape_u='$ape',Con_u='$con',Tipo='$tip' WHERE Id_u='$id'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
	
		if($ejecutar){
		
		header('location:../welcome.php');
		}
		?>