<?php
session_start();
require ("connectionbd.php");
$id=$_GET['id'];
$estado=$_GET['est'];
             if($estado==0){
              $query="UPDATE Bodega SET estado='1' WHERE ID_BODEGA='$id'";
              $estado_act="Activo";

             } else {
             	$query="UPDATE Bodega SET estado='0' WHERE ID_BODEGA='$id'";
             	$estado_act="Inactivo";
             }
$res=mysqli_query($conn,$query);
if (!$res) {
echo "Error en la conexión",mysqli_error($conn);
}else{
	if($_GET['all']=="True"){
		$enlace='location:../backend/Bodegas_Ver.php?all=True';
	}else{
		$enlace='location:../backend/Bodegas_Ver.php';
	}

	$razon="Cambio de estado (".$estado_act.") de bodega (".$id.").";
	require ("reg_log.php");
	header($enlace);
}
?>   