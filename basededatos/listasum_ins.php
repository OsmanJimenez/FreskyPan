<?php
require ("connectionbd.php");
$sql="SELECT ID_INSUMO,Insumo.nombre AS ni,descripcion,precio,iva,TipoInsumo.nombre AS nti,cantidad FROM Insumo,TipoInsumo WHERE ID_TIPOINSUMO=FK_ID_TIPOINSUMO AND estado='1';";
$result=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_array($result)){
				$idins = $fila['ID_INSUMO'];
				$niins = $fila['ni'];
				$desins = $fila['descripcion'];
				$preins = $fila['precio'];
				$ivains = $fila['iva'];
				$ntiins = $fila['nti'];
				$canins = $fila['cantidad'];
				?>

		<tr align="center">
			<td><input required="" type="radio" name="ins_r" value="<?php echo $idins; ?>" id="ins_r"></input></td>
			<td><?php echo $idins; ?></td>
			<td><?php echo $niins; ?></td>
			<td><?php echo $ntiins; ?></td>
			<td><?php echo $desins; ?></td>	
			<td><?php echo $canins." u"; ?></td>	
			<td><?php echo "$".$preins; ?></td>	
			<td><?php echo $ivains."%"; ?></td>				
		</tr> <label></label>
<?php }?>