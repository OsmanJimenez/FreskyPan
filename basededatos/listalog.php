<?php
require ("connectionbd.php");
$query="SELECT log.ID_LOG,log.fecha,log.hora,log.descripcion,log.FK_ID_USUARIO,usuario.prNombre FROM log,usuario WHERE log.FK_ID_USUARIO=usuario.ID_USUARIO ";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$id = $fila['ID_LOG'];
				$fec = $fila['fecha']; 
				$hora = $fila['hora'];
				$des = $fila['descripcion'];
				$us=$fila['FK_ID_USUARIO'];
				$nom=$fila['prNombre'];
				$i++;	?>

		<tr align="center">
			<td><?php echo $id; ?></td>
			<td><?php echo $fec; ?></td>
			<td><?php echo $hora; ?></td>
			<td><?php echo $des; ?></td>
			<td><?php echo $us; ?></td>
			<td><?php echo $nom; ?></td>
		</tr> 
<?php }?>
