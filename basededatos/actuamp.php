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

foreach ($_POST['pro'] as $key => $value) {
	echo $value;
}

		$actualizar = "UPDATE MateriaPrima SET nombre='$nom',precio='$pre',cantidad='$can',iva='$iva',descripcion='$des',FK_ID_TIPOMATERIAPRIMA='$tip' WHERE ID_MATERIAPRIMA='$cod'";
		$ejecutar = mysqli_query($conn, $actualizar);

	foreach ($_POST['pro'] as $s_prov){
		$query="SELECT count(*) FROM PROVEEDOR_MATERIAPRIMA WHERE FK_ID_MATERIAPRIMA='$cod' AND FK_ID_PROVEEDOR='$s_prov'";
		$result=mysqli_query($conn,$query);
		$cont=mysqli_num_rows($result);
		if($cont>0){
			if($s_prov!=0){
				$actualizar_prov = "UPDATE `PROVEEDOR_MATERIAPRIMA` SET `estado`='1' WHERE `FK_ID_MATERIAPRIMA`='$cod' AND `FK_ID_PROVEEDOR`='$s_prov'";
				$ejecutar_prov = mysqli_query($conn, $actualizar_prov);
			}else{
				$actualizar_prov = "UPDATE `PROVEEDOR_MATERIAPRIMA` SET `estado`='0' WHERE `FK_ID_MATERIAPRIMA`='$cod' AND `FK_ID_PROVEEDOR`='$s_prov'";
				$ejecutar_prov = mysqli_query($conn, $actualizar_prov);
			}
		}else{
			if($s_prov!=0){
				$actualizar_prov="INSERT INTO PROVEEDOR_MATERIAPRIMA(FK_ID_PROVEEDOR,FK_ID_MATERIAPRIMA,estado) VALUES ('$s_prov','$cod','1');";
				$ejecutar_prov=mysqli_query($conn,$actualizar_prov);
			}
		}

	}
		$razon="Se modificó la materia prima (".$nom.").";

		if($ejecutar_prov){
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