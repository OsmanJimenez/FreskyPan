<?php
require ("connectionbd.php");
$query="Select * from tipoproducto";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
			
				$nomt = $fila['nombre'];
				$idt = $fila['ID_TIPOPRODUCTO']; 
				$i++;	?>

		<tr align="center">
			<td><?php echo $idt; ?></td>
			
			<td><?php echo $nomt; ?></td>
			<td><a class="btn btn-success" href="Tipo_Modificar.php?idc=<?php echo $idt; ?>">Editar</a></td>
		</tr> 
<?php }?>