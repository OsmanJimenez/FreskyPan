<?php
require ("connectionbd.php");
$sql="SELECT ID_MATERIAPRIMA,MateriaPrima.nombre AS nm,descripcion,precio,iva,TipoMateriaPrima.nombre AS ntm,MedidaCantidad.nombre AS nmc,cantidad FROM MateriaPrima,TipoMateriaPrima,MedidaCantidad WHERE ID_TIPOMATERIAPRIMA=FK_ID_TIPOMATERIAPRIMA AND ID_MEDIDACANTIDAD=FK_ID_MEDIDACANTIDAD AND estado='1';";
$result=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_array($result)){
				$idmat = $fila['ID_MATERIAPRIMA'];
				$nimat = $fila['nm'];
				$desmat = $fila['descripcion'];
				$premat = $fila['precio'];
				$ivamat = $fila['iva'];
				$ntimat = $fila['ntm'];
				$nmedmat = $fila['nmc'];
				$canmat = $fila['cantidad'];
				?>

		<tr align="center">
			<td><input required="" type="radio" name="mat_r" value="<?php echo $idmat; ?>" id="mat_r"></input></td>
			<td><?php echo $idmat; ?></td>
			<td><?php echo $nimat; ?></td>
			<td><?php echo $ntimat; ?></td>
			<td><?php echo $desmat; ?></td>	
			<td><?php echo $canmat." ".$nmedmat; ?></td>	
			<td><?php echo "$".$premat; ?></td>	
			<td><?php echo $ivamat."%"; ?></td>				
		</tr> <label></label>
<?php }?>