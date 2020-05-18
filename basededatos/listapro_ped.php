<?php
require ("connectionbd.php");
$sql="SELECT ID_PROVEEDOR, prNombre, segNombre, prApellido, segApellido, estado, correo FROM Proveedor WHERE estado='1' ORDER BY prNombre ASC";
$result=mysqli_query($conn,$sql);
			while($fila=mysqli_fetch_array($result)){
				$id = $fila['ID_PROVEEDOR'];
				$result2=mysqli_query($conn,"SELECT ID_TELEFONO FROM Telefono WHERE FK_ID_PROVEEDOR=$id;");
				$prnom = $fila['prNombre'];
				$segnom = $fila['segNombre'];
				$prape = $fila['prApellido'];
				$segape = $fila['segApellido'];
				$cor = $fila['correo']; 
				?>

		<tr align="center">
			<td><input required="" type="radio" name="pro_r" value="<?php echo $id; ?>" id="prov" onclick="location.href='Pedidos_Agregar.php?prov=<?php echo $id ?>';" <?php if(!empty($_GET)){if($id==$_GET['prov']){ ?> checked <?php }} ?> ></input></td>
			<td><?php echo $prnom." ".$segnom; ?></td>
			<td><?php echo $prape." ".$segape; ?></td>
			<td><select id="inputState" class="form-control">
				<?php while($fila2=mysqli_fetch_array($result2)){
						$tel = $fila2['ID_TELEFONO']; ?>
						<option><?php echo $tel ?></option>
						<?php }	?>
				</select>
			</td>
			<td><?php echo $cor; ?></td>				
		</tr> <label></label>
<?php }?>