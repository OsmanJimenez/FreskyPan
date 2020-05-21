<?php
session_start();
require ("connectionbd.php");
$id=$_GET['id'];
$estado=$_GET['est'];
             if($estado==0){
              $query="UPDATE Devolucion SET estado='1' WHERE ID_DEVOLUCION='$id'";
              $razon="Cambio de estado (Activo) devolución (".$id.").";
             } else {
             	$query="UPDATE Devolucion SET estado='0' WHERE ID_DEVOLUCION='$id'";
             	$razon="Cambio de estado (Inactivo) devolución (".$id.").";
             }
$res=mysqli_query($conn,$query);
if (!$res) {
echo "Error en la conexión",mysqli_error($conn);
}else{
	if($_GET['all']=="True"){
		$enlace='location:../backend/Devoluciones_Ver.php?all=True';
	}else{
		$enlace='location:../backend/Devoluciones_Ver.php';
	}
	require ("reg_log.php");
	header($enlace);
}
?>   


				?>