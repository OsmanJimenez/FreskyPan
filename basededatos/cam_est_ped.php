<?php
require ("connectionbd.php");
$id=$_GET['id'];
$estado=$_GET['est'];
             if($estado==0){
              $query="UPDATE Pedido SET estado='1' WHERE ID_PEDIDO='$id'";
             } else {
             	$query="UPDATE Pedido SET estado='0' WHERE ID_PEDIDO='$id'";
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
	header($enlace);
}
?>   