<?php
session_start();
require ("connectionbd.php");
$id=$_GET['id'];
$estado=$_GET['est'];
$sql_com_dev="SELECT FK_ID_PEDIDO FROM Devolucion WHERE ID_PEDIDO=FK_ID_PEDIDO AND Devolucion.estado='1'";
$res_com_dev=mysqli_query($conn,$sql_com_dev);
             if($estado==0){
              $query="UPDATE Pedido SET estado='1' WHERE ID_PEDIDO='$id'";
              $razon="Cambio de estado (Activo) pedido (".$id.").";
             } else {
             	$query="UPDATE Pedido SET estado='0' WHERE ID_PEDIDO='$id'";
             	$razon="Cambio de estado (Inactivo) pedido (".$id.").";
             }
			$res=mysqli_query($conn,$query);
if (!$res) {
echo "Error en la conexión",mysqli_error($conn);
}else{
	if($_GET['all']=="True"){
		$enlace='location:../backend/Pedidos_Ver.php?all=True';
	}else{
		$enlace='location:../backend/Pedidos_Ver.php';
	}
	require ("reg_log.php");
	header($enlace);
}
?>   