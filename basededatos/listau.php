<?php
require ("connectionbd.php");
$query="Select * from usuario";
$result=mysqli_query($conn,$query);
$i = 0;
			
//ID_USUARIO 	prNombre 	prApellido 	contrasena 	rol 
			while($fila=mysqli_fetch_array($result)){			
				$id = $fila['ID_USUARIO'];
				$pnom = $fila['prNombre'];
				$pape=$fila['prApellido'];
				$rol=$fila['rol'];
				$i++;	
							?>

		<tr align="center">
			<td><?php echo $id; ?></td>
			<td><?php echo $pnom; ?></td>
			<td><?php echo $pape; ?></td>
			<td><?php echo $rol; ?></td>
			<td><a class="btn btn-success" href="Configuracion_Modificar.php?id=<?php echo $id; ?>">Editar</a></td>
			
			
		
		</tr>
<?php }?>
