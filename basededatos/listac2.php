<?php
require ("connectionbd.php");
$query="Select * from clientes";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$doc = $fila['ced_cl'];
				$Nom = $fila['nom_cl'];
				$cod = $fila['a1_cl']; 
				$code = $fila['a2_cl'];
				$tel = $fila['tel_cl'];
				$dir = $fila['dir_cl'];
				$i++;	?>

		<tr align="center">
			<td><input type="radio" name="r2" onclick="cambia2('<?php echo $doc; ?>')" id="sd"></input></td>
			<td><?php echo $doc; ?></td>
			<td><?php echo $Nom; ?></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $code; ?></td>
			<td><?php echo $tel; ?></td>
			<td><?php echo $dir; ?></td>
	        <td><a class="btn btn-success" href="actuc.php?id=<?php echo $cod; ?>">Editar</a></td>
			<td><a class="btn btn-danger" href="basededatos/elimuc.php?id=<?php echo $cod; ?>">Borrar</a></td>
	</tr> <br>
<?php }?>
