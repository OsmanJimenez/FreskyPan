<?php
require ("connectionbd.php");
$sql="SELECT ID_PEDIDO,plazo,fecha,exigencia FROM Pedido WHERE estado='1';";
$result=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_array($result)){
				$id = $fila['ID_PEDIDO'];
				$plazo = $fila['plazo'];
				$fecha = $fila['fecha'];
				$exi = $fila['exigencia'];
				?>

		<tr align="center">
			<td><input required="" type="radio" name="cod_ped" value="<?php echo $id; ?>" id="cod_ped" onclick="llenar('<?php echo $id; ?>')"></input></td>
			<td><?php echo $id; ?></td>
			<td><?php echo $plazo; ?></td>
			<td><?php echo $fecha; ?></td>
			<td><?php echo $exi; ?></td>			
		</tr> <label></label>
<?php }?>