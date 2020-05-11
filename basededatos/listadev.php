<?php
require ("connectionbd.php");
if(empty($_GET)){
	$result=mysqli_query($conn,"SELECT ID_DEVOLUCION,ID_PEDIDO,Devolucion.fecha,Devolucion.descripcion,prNombre,segNombre,prApellido,segApellido,Devolucion.estado FROM Devolucion,Pedido,PEDIDO_PROVEEDOR,Proveedor WHERE ID_PEDIDO=Devolucion.FK_ID_PEDIDO AND ID_PEDIDO=PEDIDO_PROVEEDOR.FK_ID_PEDIDO AND FK_ID_PROVEEDOR=ID_PROVEEDOR AND Devolucion.estado='1';");
	$vertodo="False";
} else {
	$result=mysqli_query($conn,"SELECT ID_DEVOLUCION,ID_PEDIDO,Devolucion.fecha,Devolucion.descripcion,prNombre,segNombre,prApellido,segApellido,Devolucion.estado FROM Devolucion,Pedido,PEDIDO_PROVEEDOR,Proveedor WHERE ID_PEDIDO=Devolucion.FK_ID_PEDIDO AND ID_PEDIDO=PEDIDO_PROVEEDOR.FK_ID_PEDIDO AND FK_ID_PROVEEDOR=ID_PROVEEDOR;");
	$vertodo="True";
}	
			while($fila=mysqli_fetch_array($result)){			
				$idd_dev=$fila['ID_DEVOLUCION'];
				$idp_dev=$fila['ID_PEDIDO'];
				$fec_dev=$fila['fecha'];
				$des_dev=$fila['descripcion'];
				$pro_dev=$fila['prNombre']." ".$fila['segNombre']." ".$fila['prApellido']." ".$fila['segApellido'];
                $est_dev=$fila['estado']; 	
				?>

		<tr align="center">
			<td><?php echo $idd_dev; ?></td>
			<td><?php echo $fec_dev; ?></td>
			<td><?php echo $des_dev; ?></td>
			<td><?php echo $pro_dev; ?></td>
			<td><?php echo $idp_dev; ?></td>
			<td><?php echo $est_dev; ?></td>
			<td><?php
             if($est_dev==1){

             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{

             	?><label class="btn btn-warning">Inactivo</label><?php
             }

              ?></td>
			<td><a class="btn btn-success" href="Devoluciones_Modificar.php?id=<?php echo $idd_dev; ?>&all=<?php echo $vertodo; ?>">Editar</a></td>
			<td><a class="btn btn-danger" href="../basededatos/cam_est_dev.php?id=<?php echo $idd_dev; ?>&est=<?php echo $est_dev; ?>&all=<?php echo $vertodo; ?>">Cambiar estado</a></td>
		</tr>
<?php }?>