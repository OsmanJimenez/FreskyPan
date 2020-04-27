<?php
require ("connectionbd.php");
$query="Select tipoproducto.nombre as nom1,subtipoproducto.nombre as nom2,
ID_TIPOPRODUCTO from subtipoproducto,tipoproducto where subtipoproducto.FK_ID_TIPOPRODUCTO=tipoproducto.ID_TIPOPRODUCTO";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$noms = $fila['nom1'];
				$nomt = $fila['nom2'];
				$idt = $fila['ID_TIPOPRODUCTO']; 
				$i++;	?>

		<tr align="center">
			<td><?php echo $idt; ?></td>
			<td><?php echo $noms; ?></td>
			<td><?php echo $nomt; ?></td>
			<td><a class="btn btn-success" href="Subtipo_Modificar.php?idc=<?php echo $idt; ?>">Editar</a></td>
		</tr> 
<?php }?>