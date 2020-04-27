<?php
require ("connectionbd.php");
$cod= $_POST['cod'];
$nom= $_POST['nom'];	
$pre= $_POST['pre'];
$can= $_POST['can'];
$iva= $_POST['iva'];
$des= $_POST['des'];	
		
		$actualizar = "UPDATE Insumo SET nombre='$nom',precio='$pre',cantidad='$can',iva='$iva',descripcion='$des' WHERE ID_INSUMO='$cod'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
	
		if($ejecutar){
			if($_GET['all']=="True"){
				$enlace='location:../backend/Insumo_Ver.php?all=True';
			}else{
				$enlace='location:../backend/Insumo_Ver.php';
			}
		header($enlace);
		}else{
			echo "error",mysqli_error($conn);
		}
		?>