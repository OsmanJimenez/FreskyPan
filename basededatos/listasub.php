<?php
require ("connectionbd.php");
$query="Select * from tipoproducto";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$Nom = $fila['nombre'];
				$cod = $fila['ID_TIPOPRODUCTO']; 
				$i++;	?>

		<tr align="center">
			<td><input required="" type="radio" name="r1" onclick="cambia('<?php echo $cod; ?>')" id="sd"></input></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $Nom; ?></td>
		</tr> 
<?php }?>