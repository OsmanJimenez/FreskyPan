<?php
require ("connectionbd.php");
$cod= $_POST['cod'];
$des= $_POST['des'];		
		
		$actualizar = "UPDATE Bodega SET descripcion='$des' WHERE ID_BODEGA='$cod'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
	
		if($ejecutar){
			if($_GET['all']=="True"){
				$enlace='location:../backend/Bodegas_Ver.php?all=True';
			}else{
				$enlace='location:../backend/Bodegas_Ver.php';
			}
		header($enlace);
		}else{
			echo "error",mysqli_error($conn);
		}
		?>