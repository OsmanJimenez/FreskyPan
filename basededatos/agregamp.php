<?php
session_start();
require ("connectionbd.php");
$cod= $_POST['cod'];	
$nom= $_POST['nom'];		
$pre= $_POST['pre'];	
$can= $_POST['can'];	
$est= $_POST['est'];
$iva= $_POST['iva'];
$udm= $_POST['udm'];
$tip= $_POST['tip'];
$des= $_POST['des'];	
$prov=$_POST['prov'];

$query="INSERT INTO MateriaPrima(ID_MATERIAPRIMA,nombre,cantidad,descripcion,precio,iva,stock,estado,FK_ID_MEDIDACANTIDAD,FK_ID_TIPOMATERIAPRIMA) VALUES ('$cod','$nom','$can','$des','$pre','$iva','0','$est','$udm','$tip')";
$result=mysqli_query($conn,$query);

$query4="SELECT nombre FROM MateriaPrima WHERE ID_MATERIAPRIMA='$cod'";
$result4=mysqli_query($conn,$query4);
$fila4=mysqli_fetch_array($result4);

$razon="Se agregó una nueva materia prima (".$fila4['nombre'].")";

if($prov!="0"){
	$query2="INSERT INTO PROVEEDOR_MATERIAPRIMA(`FK_ID_PROVEEDOR`, `FK_ID_MATERIAPRIMA`, `estado`) VALUES ('$prov','$cod','1')";
	$result2=mysqli_query($conn,$query2);

	$query3="SELECT prNombre,segNombre,prApellido,segApellido FROM Proveedor WHERE ID_PROVEEDOR='$prov'";
	$result3=mysqli_query($conn,$query3);
	$fila3=mysqli_fetch_array($result3);

	$razon .=" con proveedor (".$fila3['prNombre']." ".$fila3['segNombre']." ".$fila3['prApellido']." ".$fila3['segApellido'].")";
}

$razon.=".";

if(!$result){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
	//header('location:../backend/Insumo_Agregar.php'); 
}else{
	require ("reg_log.php");
  	header('location:../backend/Materia_Agregar.php'); 
}
?>