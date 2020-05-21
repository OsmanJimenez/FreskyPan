<?php
session_start();
require ("connectionbd.php");
$cod= $_POST['cod'];
$nom= $_POST['nom'];	
$pre= $_POST['pre'];
$can= $_POST['can'];
$iva= $_POST['iva'];
$des= $_POST['des'];	
$tip= $_POST['tip'];

		$actualizar = "UPDATE MateriaPrima SET nombre='$nom',precio='$pre',cantidad='$can',iva='$iva',descripcion='$des',FK_ID_TIPOMATERIAPRIMA='$tip' WHERE ID_MATERIAPRIMA='$cod'";
		$ejecutar = mysqli_query($conn, $actualizar);

		$razon="Se modificó la materia prima (".$nom.").";

		if($ejecutar){
			if($_GET['all']=="True"){
				$enlace='location:../backend/Materia_Ver.php';
			}else{
				$enlace='location:../backend/Materia_Ver.php';
			}

			require ("reg_log.php");
			header($enlace);
		}else{
			echo "error",mysqli_error($conn);
		}
		?>