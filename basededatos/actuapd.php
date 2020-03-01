<?php
        require ("connectionbd.php");
$cod_pro= $_POST['cod'];	
$nom_pro= $_POST['nom'];	
$can_pro= $_POST['can'];	
$cat_pro= $_POST['cat'];	
$des_pro= $_POST['des'];	
$pre_pro= $_POST['pre'];	
$sab_pro= $_POST['sab'];	
$est=$_POST['esta'];


		
		$actualizar = "UPDATE productos SET nom_pro='$nom_pro',can_pro='$can_pro',cat_pro='$cat_pro',des_pro='$des_pro',pre_pro='$pre_pro',sab_pro='$sab_pro',est_pro='$est' where cod_pro='$cod_pro'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
	
		if($ejecutar){
	
		header('location:../backend');
		}else{

			echo "error",mysqli_error($conn);
		}
		?>