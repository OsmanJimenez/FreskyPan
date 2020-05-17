<?php
session_start();
require ("connectionbd.php");
$cod= $_POST['cod'];
$nom= $_POST['nom'];	
$pre= $_POST['pre'];
$can= $_POST['can'];
$iva= $_POST['iva'];
$des= $_POST['des'];	
$prv= $_POST['prv'];
$tip= $_POST['tip'];
$id90 = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha modificado la Materia Prima : ".$nom." con el id : ".$cod;
$query90="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id90')";
	

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
					$result90=mysqli_query($conn,$query90);
		if(!$result90){
          echo "error",mysqli_error($conn);
		}
		header($enlace);
		}else{
			echo "error",mysqli_error($conn);
		}
		?>