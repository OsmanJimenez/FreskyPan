<?php
require ("connectionbd.php");
if(empty($_GET)){
	$result=mysqli_query($conn,"SELECT ID_PEDIDO,plazo,fecha,exigencia,prNombre,segNombre,prApellido,segApellido,Pedido.estado FROM Pedido,Proveedor,PEDIDO_PROVEEDOR WHERE PEDIDO_PROVEEDOR.FK_ID_PEDIDO=ID_PEDIDO AND PEDIDO_PROVEEDOR.FK_ID_PROVEEDOR=ID_PROVEEDOR AND Pedido.estado=1;");
	$vertodo="False";
} else {
	$result=mysqli_query($conn,"SELECT ID_PEDIDO,plazo,fecha,exigencia,prNombre,segNombre,prApellido,segApellido,Pedido.estado FROM Pedido,Proveedor,PEDIDO_PROVEEDOR WHERE PEDIDO_PROVEEDOR.FK_ID_PEDIDO=ID_PEDIDO AND PEDIDO_PROVEEDOR.FK_ID_PROVEEDOR=ID_PROVEEDOR;");
	$vertodo="True";
}		
			while($fila=mysqli_fetch_array($result)){			
				$cod = $fila['ID_PEDIDO'];
				$fec = $fila['fecha'];
				$pla = $fila['plazo'];
				$exi = $fila['exigencia'];
				$est = $fila['estado'];
				$pro = $fila['prNombre']." ".$fila['segNombre']." ".$fila['prApellido']." ".$fila['segApellido'];
				$result2=mysqli_query($conn,"SELECT MateriaPrima.nombre AS nmp,unidades,MedidaCantidad.nombre AS nmc,cancelado FROM Pedido,MateriaPrima,PEDIDO_MATERIAPRIMA,MedidaCantidad WHERE ID_PEDIDO=PEDIDO_MATERIAPRIMA.FK_ID_PEDIDO AND PEDIDO_MATERIAPRIMA.FK_ID_MATERIAPRIMA=ID_MATERIAPRIMA AND ID_PEDIDO=$cod AND ID_MEDIDACANTIDAD=FK_ID_MEDIDACANTIDAD;");
				$result3=mysqli_query($conn,"SELECT nombre,unidades,cancelado FROM Pedido,Insumo,PEDIDO_INSUMO WHERE ID_PEDIDO=PEDIDO_INSUMO.FK_ID_PEDIDO AND PEDIDO_INSUMO.FK_ID_INSUMO=ID_INSUMO AND ID_PEDIDO=$cod;");
					$contm=0; $conti=0;
				?>

		<tr align="center">
			<td><?php echo $cod; ?></td>
			<td><?php echo $fec; ?></td>
			<td><?php echo $pla; ?></td>
			<td><?php echo $exi; ?></td>
			<td>
				<select class="form-control">
					<optgroup label="Materia Prima">
						<?php while($fila2=mysqli_fetch_array($result2)){
						$promat = $fila2['nmp']." (".$fila2['unidades']." ".$fila2['nmc'].")"; 
						if($fila2['cancelado']=='1'){$promat.=" Cancelado.";}else{$contm++;}
						?>
						<option><?php echo $promat ?></option>
						<?php }	?>
					</optgroup>
					<optgroup label="Insumo">
						<?php while($fila3=mysqli_fetch_array($result3)){
						$proins = $fila3['nombre']." (".$fila3['unidades']." u)"; 
						if($fila3['cancelado']=='1'){$proins.=" Cancelado.";}else{$conti++;}
						?>
						<option><?php echo $proins ?></option>
						<?php }	?>
					</optgroup>
				</select>
			</td>
			<td><?php echo $pro;?></td>
			<td><?php
             if($est==1){
             	 ?><label class="btn btn-primary">Activo</label><?php
             	 $enlace="../basededatos/can_ped.php?id=".$cod."&all=".$vertodo;
             }else{
             	if($contm==0 && $conti==0){
             	?><label class="btn btn-warning">Cancelado</label><?php
             	}else{
             	?><label class="btn btn-warning">Inactivo</label><?php
             	}
             	$enlace="#";
             }
              ?>
          	</td>
			<td><a class="btn btn-danger" href="../basededatos/cam_est_ped.php?id=<?php echo $cod; ?>&est=<?php echo $est; ?>&all=<?php echo $vertodo; ?>">Cambiar estado</a></td>
			<td><a class="btn btn-danger" href="<?php echo $enlace; ?>">Cancelar</a></td>
		</tr> <label></label>
<?php }?>