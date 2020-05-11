<?php
require ("connectionbd.php");
$sql="SELECT ID_BODEGA, descripcion FROM Bodega WHERE estado='1';";
$result=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_array($result)){
				$cod = $fila['ID_BODEGA'];
				$des = $fila['descripcion'];
				?>

		<tr align="center">
			<td><input required="" type="radio" name="bod_r" value="<?php echo $cod; ?>" id="bod_r"></input></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $des; ?></td>				
		</tr> <label></label>
<?php }?>