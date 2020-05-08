<?php
require ("connectionbd.php");
$sql="SELECT ID_MATERIAPRIMA,MateriaPrima.nombre AS nommp,cantidad,descripcion,precio,iva,MedidaCantidad.nombre AS nommc FROM MateriaPrima, MedidaCantidad WHERE ID_MEDIDACANTIDAD=FK_ID_MEDIDACANTIDAD AND estado='1' ORDER BY MateriaPrima.nombre ASC";
$resultmp=mysqli_query($conn,$sql);
$sql2="SELECT ID_INSUMO,nombre,cantidad,descripcion,precio,iva FROM Insumo WHERE estado='1' ORDER BY nombre ASC";
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
			<td><input required="" type="radio" name="r1" onclick="cambia('<?php echo $codm; ?>')" id="sd"></input></td>
			<td><?php echo $nomm; ?></td>
			<td><?php echo $desm; ?></td>
			<td><?php echo $prem; ?></td>
			<td><?php echo $ivam; ?></td>
			<td><?php echo $canm." ".$nommc; ?></td>
			<td>Materia prima</td>			
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
			<td><input required="" type="radio" name="r1" onclick="cambia('<?php echo $codi; ?>')" id="sd"></input></td>
			<td><?php echo $nomi; ?></td>
			<td><?php echo $desi; ?></td>
			<td><?php echo $prei; ?></td>
			<td><?php echo $ivai; ?></td>
			<td><?php echo $cani." Unidades"; ?></td>
			<td>Insumo</td>				
		</tr> <label></label>
<?php } ?>