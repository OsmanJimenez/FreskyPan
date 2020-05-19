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
                $result2=mysqli_query($conn,"SELECT MateriaPrima.nombre AS nmp,MedidaCantidad.nombre AS nmc,cantidad,unidades,DEVOLUCION_MATERIAPRIMA.cancelado AS can FROM Devolucion,MateriaPrima,DEVOLUCION_MATERIAPRIMA,MedidaCantidad,Pedido,PEDIDO_MATERIAPRIMA WHERE ID_DEVOLUCION=DEVOLUCION_MATERIAPRIMA.FK_ID_DEVOLUCION AND DEVOLUCION_MATERIAPRIMA.FK_ID_MATERIAPRIMA=ID_MATERIAPRIMA AND MateriaPrima.FK_ID_MEDIDACANTIDAD=MedidaCantidad.ID_MEDIDACANTIDAD AND Devolucion.FK_ID_PEDIDO=ID_PEDIDO AND PEDIDO_MATERIAPRIMA.FK_ID_PEDIDO=ID_PEDIDO AND DEVOLUCION_MATERIAPRIMA.FK_ID_DEVOLUCION='$idd_dev';");
                $result3=mysqli_query($conn,"SELECT Insumo.nombre AS nin,cantidad,DEVOLUCION_INSUMO.cancelado AS can,unidades FROM DEVOLUCION_INSUMO,Devolucion,Pedido,PEDIDO_INSUMO,Insumo WHERE ID_DEVOLUCION=DEVOLUCION_INSUMO.FK_ID_DEVOLUCION AND ID_PEDIDO=Devolucion.FK_ID_PEDIDO AND ID_PEDIDO=PEDIDO_INSUMO.FK_ID_PEDIDO AND DEVOLUCION_INSUMO.FK_ID_INSUMO=ID_INSUMO AND DEVOLUCION_INSUMO.FK_ID_DEVOLUCION='$idd_dev';");
                $contm=0; $conti=0;
				?>

		<tr align="center">
			<td><?php echo $idd_dev; ?></td>
			<td><?php echo $fec_dev; ?></td>
			<td><?php echo $des_dev; ?></td>
			<td><?php echo $pro_dev; ?></td>
			<td><?php echo $idp_dev; ?></td>
			<td>
				<select class="form-control">
					<optgroup label="Materia Prima">
						<?php 
						$promat="";
						while($fila2=mysqli_fetch_array($result2)){
						if($fila2['can']=='0'){
							$contm++; 
							$promat = $fila2['nmp']." ".$fila2['unidades']." ".$fila2['nmc']." (".$fila2['cantidad'].")";
						}
						?>
						<option><?php echo $promat ?></option>
						<?php }	?>
					</optgroup>
					<optgroup label="Insumo">
						<?php 
						$proins="";
						while($fila3=mysqli_fetch_array($result3)){
						if($fila3['can']=='0'){
							$conti++;
							$proins = $fila3['nin']." ".$fila3['unidades']." u. (".$fila3['cantidad'].")"; 
						}
						?>
						<option><?php echo $proins ?></option>
						<?php }	?>
					</optgroup>
				</select>
			</td>
			<td><?php
			$enlace_cam="../basededatos/cam_est_dev.php?id=".$idd_dev."&est=".$est_dev."&all=".$vertodo;
             if($est_dev==1){
             	 ?><label class="btn btn-primary">Activo</label><?php
             	 $enlace="../basededatos/can_dev.php?id=".$idd_dev."&all=".$vertodo;
             }else{
             	if($contm==0 && $conti==0){
             	?><label class="btn btn-warning">Cancelado</label><?php
             	$enlace_cam="#";
             	}else{
             	?><label class="btn btn-warning">Completado</label><?php
             	}
             	$enlace="#";
             }
              ?>
          	</td>
			<td><a class="btn btn-danger" href="<?php echo $enlace_cam; ?>">Cambiar estado</a></td>
			<td><a class="btn btn-danger" href="<?php echo $enlace; ?>">Cancelar</a></td>
		</tr>
<?php }?>