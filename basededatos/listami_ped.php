<?php
require ("connectionbd.php");
if(!empty($_GET)){
$prove = $_GET["prov"];
$sqlmp="SELECT ID_MATERIAPRIMA,MateriaPrima.nombre AS nommp,cantidad,descripcion,precio,iva,MedidaCantidad.nombre AS nommc FROM MateriaPrima, MedidaCantidad, PROVEEDOR_MATERIAPRIMA, Proveedor WHERE MedidaCantidad.ID_MEDIDACANTIDAD=MateriaPrima.FK_ID_MEDIDACANTIDAD AND MateriaPrima.ID_MATERIAPRIMA=PROVEEDOR_MATERIAPRIMA.FK_ID_MATERIAPRIMA AND PROVEEDOR_MATERIAPRIMA.FK_ID_PROVEEDOR=Proveedor.ID_PROVEEDOR AND PROVEEDOR_MATERIAPRIMA.estado='1' AND Proveedor.ID_PROVEEDOR=". $prove ." ORDER BY MateriaPrima.nombre ASC;";
$resultmp=mysqli_query($conn,$sqlmp);
$sqlin="SELECT ID_INSUMO,nombre,cantidad,descripcion,precio,iva FROM Insumo,Proveedor WHERE Insumo.estado='1' AND Proveedor.ID_PROVEEDOR=". $prove ." ORDER BY Insumo.nombre ASC;";
$resultin=mysqli_query($conn,$sqlin);
			while($fila=mysqli_fetch_array($resultmp)){
				$codm = $fila['ID_MATERIAPRIMA'];
				$nomm = $fila['nommp'];
				$desm = $fila['descripcion'];
				$prem = $fila['precio'];
				$ivam = $fila['iva'];
				$canm = $fila['cantidad']; 
				$nommc = $fila['nommc']; 
				?>
		<tr align="center">
			<td><input type="checkbox" name="check_mi[]" id="check_mi" class="check" value="<?php echo $codm; ?>"></input></td>
			<td><?php echo $nomm; ?></td>
			<td><?php echo $desm; ?></td>
			<td><?php echo $prem; ?><input type="hidden" name="pre[]" value="<?php echo $prem ?>" disabled=""></input></td>
			<td><?php echo $ivam; ?></td>
			<td><?php echo $canm." ".$nommc; ?></td>
			<td>Materia prima<input type="hidden" name="tip[]" value="Materia" disabled=""></input></td>
			<td><input type="number" name="cant[]" id="cant" class="form-control" maxlength="3" oninput="maxlengthNumber(this)" onpaste="return false" onkeypress="return validanumericos(event)" disabled="" required=""></td>			
		</tr> <label></label>
<?php }
			while($fila2=mysqli_fetch_array($resultin)){
				$codi = $fila2['ID_INSUMO'];
				$nomi = $fila2['nombre'];
				$desi = $fila2['descripcion'];
				$prei = $fila2['precio'];
				$ivai = $fila2['iva'];
				$cani = $fila2['cantidad']; 
				?>

		<tr align="center">
			<td><input type="checkbox" name="check_mi[]" id="check_mi" class="check" value="<?php echo $codi; ?>"></input></td>
			<td><?php echo $nomi; ?></td>
			<td><?php echo $desi; ?></td>
			<td><?php echo $prei; ?><input type="hidden" name="pre[]" value="<?php echo $prei ?>" disabled=""></input></td>
			<td><?php echo $ivai."%"; ?></td>
			<td><?php echo $cani." Unidades"; ?></td>
			<td>Insumo<input type="hidden" name="tip[]" value="Insumo" disabled=""></input></td>
			<td><input type="number" name="cant[]" id="cant" class="form-control" maxlength="3" oninput="maxlengthNumber(this)" onpaste="return false" onkeypress="return validanumericos(event)" disabled="" required=""></td>				
		</tr> <label></label>
<?php }} ?>
