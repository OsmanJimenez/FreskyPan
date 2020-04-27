<?php
require ("connectionbd.php");
$id=$_GET['id'];
$estado=$_GET['est'];
             if($estado==0){
              $query="UPDATE Insumo SET estado='1' WHERE ID_INSUMO='$id'";
             } else {
             	$query="UPDATE Insumo SET estado='0' WHERE ID_INSUMO='$id'";
             }
$res=mysqli_query($conn,$query);
if (!$res) {
echo "Error en la conexión",mysqli_error($conn);
}else{
	if($_GET['all']=="True"){
		$enlace='location:../backend/Insumo_Ver.php?all=True';
	}else{
		$enlace='location:../backend/Insumo_Ver.php';
	}
	header($enlace);
}
?>   