<?php
require ("connectionbd.php");
	$result=mysqli_query($conn,"SELECT ID_FACTURA,Factura.fecha,ID_PEDIDO,prNombre,segNombre,prApellido,segApellido FROM Factura,Pedido,Proveedor,PEDIDO_PROVEEDOR WHERE PEDIDO_PROVEEDOR.FK_ID_PEDIDO=ID_PEDIDO AND ID_PROVEEDOR=PEDIDO_PROVEEDOR.FK_ID_PROVEEDOR;");
			while($fila=mysqli_fetch_array($result)){			
				$cod = $fila['ID_FACTURA'];
				$fec = $fila['fecha'];
				$prnom = $fila['prNombre'];
				$segnom = $fila['segNombre'];
				$prape = $fila['prApellido'];
				$segape = $fila['segApellido'];
				$fkcod = $fila['ID_PEDIDO'];

				$result2=mysqli_query($conn,"SELECT MateriaPrima.nombre AS nmp,unidades,MedidaCantidad.nombre AS nmc FROM Pedido,MateriaPrima,PEDIDO_MATERIAPRIMA,MedidaCantidad WHERE ID_PEDIDO=PEDIDO_MATERIAPRIMA.FK_ID_PEDIDO AND PEDIDO_MATERIAPRIMA.FK_ID_MATERIAPRIMA=ID_MATERIAPRIMA AND ID_PEDIDO=$fkcod AND cancelado='0' AND ID_MEDIDACANTIDAD=FK_ID_MEDIDACANTIDAD");
				$result3=mysqli_query($conn,"SELECT nombre,unidades FROM Pedido,Insumo,PEDIDO_INSUMO WHERE ID_PEDIDO=PEDIDO_INSUMO.FK_ID_PEDIDO AND PEDIDO_INSUMO.FK_ID_INSUMO=ID_INSUMO AND ID_PEDIDO=$fkcod AND cancelado='0'");
				?>

		<tr align="center">
			<td><?php echo $cod; ?></td>
			<td><?php echo $fec; ?></td>
			<td>
				<select class="form-control">
					<optgroup label="Materia Prima">
						<?php while($fila2=mysqli_fetch_array($result2)){
						$promat = $fila2['nmp']." (".$fila2['unidades']." ".$fila2['nmc'].")"; ?>
						<option><?php echo $promat ?></option>
						<?php }	?>
					</optgroup>
					<optgroup label="Insumo">
						<?php while($fila3=mysqli_fetch_array($result3)){
						$proins = $fila3['nombre']." (".$fila3['unidades']." u)"; ?>
						<option><?php echo $proins ?></option>
						<?php }	?>
					</optgroup>
				</select>
			</td>
			<td><?php echo $prnom." ".$segnom." ".$prape." ".$segape; ?></td>
			<td><?php echo $fkcod; ?></td>
		</tr> <label></label>
<?php }?>