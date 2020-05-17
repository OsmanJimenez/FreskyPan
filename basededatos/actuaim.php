<?php
session_start();
require ("connectionbd.php");
$cod= $_POST['cod'];
$nom= $_POST['nom'];	
$pre= $_POST['pre'];
$can= $_POST['can'];
$iva= $_POST['iva'];
$des= $_POST['des'];	
$tip=$_POST['tip'];
$prv=$_POST['prv'];
		$id90 = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha editado el insumo : ".$nom." con el id : ".$cod;
$query90="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id90')";

		$actualizar = "UPDATE Insumo SET nombre='$nom',precio='$pre',cantidad='$can',iva='$iva',descripcion='$des' WHERE ID_INSUMO='$cod'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
	$quer="UPDATE `proveedor_insumo` SET `FK_ID_PROVEEDOR`='$prv' WHERE `FK_ID_INSUMO`='$cod'";
	$ejecutar2 = mysqli_query($conn, $quer);
		if($ejecutar){
				$result90=mysqli_query($conn,$query90);
		if(!$result90){
          echo "error",mysqli_error($conn);
		}
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