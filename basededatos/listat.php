<?php
require ("connectionbd.php");
$query="Select subtipoproducto.nombre as nom1,tipoproducto.nombre as nom2,subtipoproducto.ID_SUBTIPOPRODUCTO from subtipoproducto,tipoproducto where subtipoproducto.FK_ID_TIPOPRODUCTO=tipoproducto.ID_TIPOPRODUCTO ";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
			
				$nomt = $fila['nom1'];
				$idt = $fila['ID_SUBTIPOPRODUCTO']; 
				$ctg=$fila['nom2'];
				$i++;	?>

		<tr align="center">
			<td width="auto"><?php echo $idt;?></td>
			
			<td><?php echo $nomt;?></td>
			<td><?php echo $ctg; ?></td>
			<td><a class="btn btn-success" href="TipoP_Modificar.php?idc=<?php echo $idt; ?>">Editar</a></td>
		</tr> 
<?php }?>