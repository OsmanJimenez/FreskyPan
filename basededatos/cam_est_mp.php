<?php
require ("connectionbd.php");
$id=$_GET['id'];
$estado=$_GET['est'];
             if($estado==0){
              $query="UPDATE MateriaPrima SET estado='1' WHERE ID_MATERIAPRIMA='$id'";
             } else {
             	$query="UPDATE MateriaPrima SET estado='0' WHERE ID_MATERIAPRIMA='$id'";
             }
$res=mysqli_query($conn,$query);
if (!$res) {
echo "Error en la conexión",mysqli_error($conn);
}else{
	if($_GET['all']=="True"){
		$enlace='location:../backend/Materia_Ver.php?all=True';
	}else{
		$enlace='location:../backend/Materia_Ver.php';
	}
	header($enlace);
}
?>   