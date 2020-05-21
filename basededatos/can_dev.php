<?php
session_start();
require ("connectionbd.php");
$id=$_GET['id'];
              $query="UPDATE PEDIDO_MATERIAPRIMA SET cancelado='1' WHERE FK_ID_PEDIDO='$id'";
              $query2="UPDATE PEDIDO_INSUMO SET cancelado='1' WHERE FK_ID_PEDIDO='$id'";
              $query3="UPDATE Pedido SET estado='0' WHERE ID_PEDIDO='$id'";
$res=mysqli_query($conn,$query);
$res2=mysqli_query($conn,$query2);
$res3=mysqli_query($conn,$query3);

			$query4="SELECT ID_DEVOLUCION FROM Devolucion,Pedido WHERE Devolucion.FK_ID_PEDIDO='$id'";
			$res4=mysqli_query($conn,$query4);
			if(mysqli_num_rows($res4)!=0){
				$query5="UPDATE Devolucion SET estado='0' WHERE FK_ID_PEDIDO='$id'";
				mysqli_query($conn,$query5);
				$fila=mysqli_fetch_array($res4);
				$dev=$fila['ID_DEVOLUCION'];
				$query6="UPDATE DEVOLUCION_MATERIAPRIMA SET estado='0' WHERE FK_ID_DEVOLUCION='$dev'";
				mysqli_fetch_array($query6);
				$query7="UPDATE DEVOLUCION_INSUMO SET estado='0' WHERE FK_ID_DEVOLUCION='$dev'";
				mysqli_fetch_array($query7);
			}

if (!$res) {
echo "Error en la conexión",mysqli_error($conn);
}else if(!$res2){
echo "Error en la conexión",mysqli_error($conn);
}else if(!$res3){
echo "Error en la conexión",mysqli_error($conn);
}else{
	if($_GET['all']=="True"){
		$enlace='location:../backend/Devoluciones_Ver.php?all=True';
	}else{
		$enlace='location:../backend/Devoluciones_Ver.php';
	}

	$razon="Se canceló un devolución (".$id.").";
	require ("reg_log.php");
	header($enlace);
}
?>   