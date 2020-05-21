<?php
require ("connectionbd.php");
$query="Select produccion.ID_PRODUCCION,catproducto.nombre,produccion.fechaProduccion,produccion.unidades from produccion,catproducto where produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO ORDER BY `produccion`.`fechaProduccion` ASC ";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$num = $fila['ID_PRODUCCION'];
				$Nom = $fila['nombre'];
				$stock = $fila['unidades']; 
				$fec=$fila['fechaProduccion'];
				$i++;	?>

		<tr align="center">
			<td><input required="" type="radio" name="r1" onclick="cambia('<?php echo $num; ?>')" id="sd"></input></td>
			<td><?php echo $num; ?></td>
			<td><?php echo $Nom; ?></td>
			<td><?php echo $stock; ?></td>
			<td><?php echo $fec; ?></td>				
		</tr> 
<?php }?>