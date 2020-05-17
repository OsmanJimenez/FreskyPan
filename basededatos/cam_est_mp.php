<?php
session_start();
require ("connectionbd.php");
$id=$_GET['id'];
$estado=$_GET['est'];
             if($estado==0){
              $query="UPDATE MateriaPrima SET estado='1' WHERE ID_MATERIAPRIMA='$id'";
              $estado_act="Activo";
             } else {
             	$query="UPDATE MateriaPrima SET estado='0' WHERE ID_MATERIAPRIMA='$id'";
             	$estado_act="Inactivo";
             }
$res=mysqli_query($conn,$query);

$query2="SELECT nombre FROM MateriaPrima WHERE ID_MATERIAPRIMA='$id'";
$result2=mysqli_query($conn,$query2);
$fila2=mysqli_fetch_array($result2);

if (!$res) {
echo "Error en la conexión",mysqli_error($conn);
}else{
	if($_GET['all']=="True"){
		$enlace='location:../backend/Materia_Ver.php?all=True';
	}else{
		$enlace='location:../backend/Materia_Ver.php';
	}
	$razon="Cambio de estado (".$estado_act.") materia prima (".$fila2['nombre'].").";
	require ("reg_log.php");
	header($enlace);
}
?>   