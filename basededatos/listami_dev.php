<?php
require ("connectionbd.php");
if(!empty($_GET)){
$ped = $_GET["ped"];
$sqlmp="SELECT PEDIDO_MATERIAPRIMA.FK_ID_MATERIAPRIMA AS idmp,MateriaPrima.nombre AS nommp,cantidad,PEDIDO_MATERIAPRIMA.precio AS precio,MedidaCantidad.nombre AS nommc,unidades FROM MateriaPrima, MedidaCantidad, PEDIDO_MATERIAPRIMA WHERE MedidaCantidad.ID_MEDIDACANTIDAD=MateriaPrima.FK_ID_MEDIDACANTIDAD AND MateriaPrima.ID_MATERIAPRIMA=PEDIDO_MATERIAPRIMA.FK_ID_MATERIAPRIMA AND PEDIDO_MATERIAPRIMA.cancelado='0' AND PEDIDO_MATERIAPRIMA.FK_ID_PEDIDO='$ped' AND NOT EXISTS(SELECT NULL FROM DEVOLUCION_MATERIAPRIMA,Devolucion WHERE DEVOLUCION_MATERIAPRIMA.FK_ID_DEVOLUCION=Devolucion.ID_DEVOLUCION AND Devolucion.FK_ID_PEDIDO=PEDIDO_MATERIAPRIMA.FK_ID_PEDIDO AND DEVOLUCION_MATERIAPRIMA.FK_ID_MATERIAPRIMA=PEDIDO_MATERIAPRIMA.FK_ID_MATERIAPRIMA AND DEVOLUCION_MATERIAPRIMA.cancelado='0') ORDER BY MateriaPrima.nombre ASC;";
$resultmp=mysqli_query($conn,$sqlmp);
$sqlin="SELECT PEDIDO_INSUMO.FK_ID_INSUMO AS idin,nombre,cantidad,unidades,PEDIDO_INSUMO.precio AS precio FROM Insumo,PEDIDO_INSUMO WHERE PEDIDO_INSUMO.cancelado='0' AND PEDIDO_INSUMO.FK_ID_PEDIDO='$ped' AND Insumo.ID_INSUMO=PEDIDO_INSUMO.FK_ID_INSUMO AND NOT EXISTS(SELECT NULL FROM DEVOLUCION_INSUMO,Devolucion WHERE DEVOLUCION_INSUMO.FK_ID_DEVOLUCION=Devolucion.ID_DEVOLUCION AND Devolucion.FK_ID_PEDIDO=PEDIDO_INSUMO.FK_ID_PEDIDO AND DEVOLUCION_INSUMO.FK_ID_INSUMO=PEDIDO_INSUMO.FK_ID_INSUMO AND DEVOLUCION_INSUMO.cancelado='0') ORDER BY Insumo.nombre ASC;";
$resultin=mysqli_query($conn,$sqlin);
			while($fila=mysqli_fetch_array($resultmp)){
				$idm = $fila['idmp'];
				$nomm = $fila['nommp'];
				$canm = $fila['cantidad'];
				$unim = $fila['unidades'];
				$prem = $fila['precio'];
				$nomcm = $fila['nommc'];
				?>
		<tr align="center">
			<td width="50"><input type="checkbox" name="check_mi[]" id="check_mi" class="check" value="<?php echo $idm; ?>"></input></td>
			<td><?php echo $nomm; ?></td>
			<td>Materia prima<input type="hidden" name="tip[]" value="Materia" disabled=""></td>
			<td><?php echo $canm." ".$nomcm; ?></td>
			<td><?php echo $unim; ?></td>
			<td><?php echo $prem; ?></td>
		</tr> <label></label>
<?php }
			while($fila2=mysqli_fetch_array($resultin)){
				$idi = $fila2['idin'];
				$nomi = $fila2['nombre'];
				$cani = $fila2['cantidad'];
				$unii = $fila2['unidades'];
				$prei = $fila2['precio'];
				?>

		<tr align="center">
			<td width="50"><input type="checkbox" name="check_mi[]" id="check_mi" class="check" value="<?php echo $idi; ?>"></input></td>
			<td><?php echo $nomi; ?></td>
			<td>Insumo<input type="hidden" name="tip[]" value="Insumo" disabled=""></td>
			<td><?php echo $cani." unid."; ?></td>
			<td><?php echo $unii; ?></td>
			<td><?php echo $prei; ?></td>			
		</tr> <label></label>
<?php }} ?>
