<?php
require ("connectionbd.php");
$cod= $_POST['cod'];
$fec= $_POST['fec'];	
$des= $_POST['des'];
		
		$actualizar = "UPDATE Devolucion SET fecha='$fec',descripcion='$des' WHERE ID_DEVOLUCION='$cod'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
	
		if($ejecutar){
			if($_GET['all']=="True"){
				$enlace='location:../backend/Devoluciones_Ver.php?all=True';
			}else{
				$enlace='location:../backend/Devoluciones_Ver.php';
			}
		header($enlace);
		}else{
			echo "error",mysqli_error($conn);
		}
		?>