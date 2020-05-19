<?php
require ("connectionbd.php");
	$result=mysqli_query($conn,"SELECT ID_TIPOMATERIAPRIMA,nombre FROM TipoMateriaPrima");

			while($fila=mysqli_fetch_array($result)){			
				$cod = $fila['ID_TIPOMATERIAPRIMA'];
				$nom = $fila['nombre'];
				?>

		<tr align="center">
			<td><input type="radio" name="tipo" class="radio" value="<?php echo $cod; ?>" id="tipo"></input></td>
			<td><?php echo $nom; ?></td>
		</tr> <label></label>
<?php }?>