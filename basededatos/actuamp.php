<?php
require ("connectionbd.php");
$cod= $_POST['cod'];
$nom= $_POST['nom'];	
$pre= $_POST['pre'];
$can= $_POST['can'];
$iva= $_POST['iva'];
$des= $_POST['des'];	
$prv= $_POST['prv'];
$tip= $_POST['tip'];
		$actualizar = "UPDATE MateriaPrima SET nombre='$nom',precio='$pre',cantidad='$can',iva='$iva',descripcion='$des',FK_ID_TIPOMATERIAPRIMA='$tip' WHERE ID_MATERIAPRIMA='$cod'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
	    $quer="UPDATE `proveedor_materiaprima` SET `FK_ID_PROVEEDOR`='$prv' WHERE `FK_ID_MATERIAPRIMA`='$cod'";
	    $ejecutar2 = mysqli_query($conn, $quer);
		if($ejecutar){
			//if($_GET['all']=="True"){
			//	$enlace='location:../backend/Materia_Ver.php';
		//	}else{
				$enlace='location:../backend/Materia_Ver.php';
		//	}
		header($enlace);
		}else{
			echo "error",mysqli_error($conn);
		}
		?>