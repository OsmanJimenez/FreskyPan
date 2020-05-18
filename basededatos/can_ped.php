<?php
session_start();
require ("connectionbd.php");
$id=$_GET['id'];
$estado=$_GET['est'];
              $query="UPDATE PEDIDO_MATERIAPRIMA SET cancelado='1' WHERE FK_ID_PEDIDO='$id'";
              $query2="UPDATE PEDIDO_INSUMO SET cancelado='1' WHERE FK_ID_PEDIDO='$id'";
              $query3="UPDATE Pedido SET estado='0' WHERE ID_PEDIDO='$id'";
$res=mysqli_query($conn,$query);
$res2=mysqli_query($conn,$query2);
$res3=mysqli_query($conn,$query3);
if (!$res) {
echo "Error en la conexión",mysqli_error($conn);
}else if(!$res2){
echo "Error en la conexión",mysqli_error($conn);
}else if(!$res3){
echo "Error en la conexión",mysqli_error($conn);
}else{
	if($_GET['all']=="True"){
		$enlace='location:../backend/Materia_Ver.php?all=True';
	}else{
		$enlace='location:../backend/Materia_Ver.php';
	}

	$razon="Se canceló un pedido (".$id.").";
	require ("reg_log.php");
	header($enlace);
}
?>   