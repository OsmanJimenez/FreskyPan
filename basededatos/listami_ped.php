<?php
require ("connectionbd.php");
$prove = $_GET["p"];
$sql="SELECT ID_MATERIAPRIMA,MateriaPrima.nombre AS nommp,cantidad,descripcion,precio,iva,MedidaCantidad.nombre AS nommc FROM MateriaPrima, MedidaCantidad, PROVEEDOR_MATERIAPRIMA, Proveedor WHERE MedidaCantidad.ID_MEDIDACANTIDAD=MateriaPrima.FK_ID_MEDIDACANTIDAD AND MateriaPrima.ID_MATERIAPRIMA=PROVEEDOR_MATERIAPRIMA.FK_ID_MATERIAPRIMA AND PROVEEDOR_MATERIAPRIMA.FK_ID_PROVEEDOR=Proveedor.ID_PROVEEDOR AND PROVEEDOR_MATERIAPRIMA.estado='1' AND Proveedor.ID_PROVEEDOR=". $prove ." ORDER BY MateriaPrima.nombre ASC;";
$resultmp=mysqli_query($conn,$sql);
$sql2="SELECT ID_INSUMO,nombre,cantidad,descripcion,precio,iva FROM Insumo,Proveedor WHERE Insumo.estado='1' AND ID_PROVEEDOR=". $prove ." ORDER BY Insumo.nombre ASC;";
$resultin=mysqli_query($conn,$sql2);
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
			<td><input required="" type="checkbox" name="mat_c[]" value="<?php echo $codm; ?>"></input></td>
			<td><?php echo $nomm; ?></td>
			<td><?php echo $desm; ?></td>
			<td><?php echo $prem; ?></td>
			<td><?php echo $ivam; ?></td>
			<td><?php echo $canm." ".$nommc; ?></td>
			<td>Materia prima</td>
			<td><input type="text" name="cant" class="form-control" placeholder="" maxlength="10"></td>			
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
			<td><input type="checkbox" name="ins_c[]" value="<?php echo $codi; ?>"></input></td>
			<td><?php echo $nomi; ?></td>
			<td><?php echo $desi; ?></td>
			<td><?php echo "$".$prei; ?></td>
			<td><?php echo $ivai."%"; ?></td>
			<td><?php echo $cani." Unidades"; ?></td>
			<td>Insumo</td>
			<td><input type="text" name="cant" class="form-control" placeholder="" maxlength="10"></td>				
		</tr> <label></label>
<?php } ?>