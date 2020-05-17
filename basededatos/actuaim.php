<?php
session_start();
require ("connectionbd.php");
$cod= $_POST['cod'];
$nom= $_POST['nom'];	
$pre= $_POST['pre'];
$can= $_POST['can'];
$iva= $_POST['iva'];
$des= $_POST['des'];	
$tip=$_POST['tip'];
$prov=$_POST['prov'];

		$actualizar = "UPDATE Insumo SET nombre='$nom',precio='$pre',cantidad='$can',iva='$iva',descripcion='$des' WHERE ID_INSUMO='$cod'";
		$ejecutar = mysqli_query($conn, $actualizar);

		$query="SELECT * FROM PROVEEDOR_INSUMO WHERE FK_ID_INSUMO='$cod' AND FK_ID_PROVEEDOR='$prov'";
		$result=mysqli_query($conn,$query);
		$razon="Se modificó el insumo (".$nom.")";

		if(mysql_num_rows($result2)!=0){
			if($prov!=0){
				$actualizar_prov = "UPDATE `PROVEEDOR_INSUMO` SET `estado`='1' WHERE `FK_ID_INSUMO`='$cod' AND `FK_ID_PROVEEDOR`='$prov'";
				$ejecutar_prov = mysqli_query($conn, $actualizar_prov);
			}else{
				$actualizar_prov = "UPDATE `PROVEEDOR_INSUMO` SET `estado`='0' WHERE `FK_ID_INSUMO`='$cod' AND `FK_ID_PROVEEDOR`='$prov'";
				$ejecutar_prov = mysqli_query($conn, $actualizar_prov);
			}
			$query2="SELECT prNombre,segNombre,prApellido,segApellido FROM Proveedor WHERE ID_PROVEEDOR='$prov'";
			$result2=mysqli_query($conn,$query2);
			$fila2=mysqli_fetch_array($result2);
			$razon.=" con proveedor (".$fila3['prNombre'];." ".$fila3['segNombre']." ".$fila3['prApellido']." ".$fila3['segApellido'].")";
		}else{
			if($prov!=0){
				$actualizar_prov="INSERT INTO PROVEEDOR_INSUMO(FK_ID_PROVEEDOR,FK_ID_INSUMO,estado) VALUES ('$prov','$cod','1');";
				$ejecutar_prov=mysqli_query($conn,$actualizar_prov);
				
				$query2="SELECT prNombre,segNombre,prApellido,segApellido FROM Proveedor WHERE ID_PROVEEDOR='$prov'";
				$result2=mysqli_query($conn,$query2);
				$fila2=mysqli_fetch_array($result2);
				$razon.=" con proveedor (".$fila3['prNombre'];." ".$fila3['segNombre']." ".$fila3['prApellido']." ".$fila3['segApellido'].")";
			}
		}
		$razon.=".";
	
	
		if($ejecutar_prov){
			if($_GET['all']=="True"){
				$enlace='location:../backend/Insumo_Ver.php?all=True';
			}else{
				$enlace='location:../backend/Insumo_Ver.php';
			}
			require ("reg_log.php");
			header($enlace);
		}else{
			echo "error",mysqli_error($conn);
		}
		?>