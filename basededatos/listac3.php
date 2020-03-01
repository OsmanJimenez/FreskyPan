<?php
require ("connectionbd.php");
$query="Select clientes.nom_cl, clientes.a1_cl, clientes.ced_cl, telcl.tel_cl, clientes.dir_cl, clientes.est_cl from clientes,telcl where telcl.ced_cl=clientes.ced_cl";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$doc = $fila['ced_cl'];
				$Nom = $fila['nom_cl'];
				$cod = $fila['a1_cl']; 
				
				$tel = $fila['tel_cl'];
				$dir = $fila['dir_cl'];
				$est=$fila['est_cl'];
				$i++;	?>

		<tr align="center">
			<td><input type="radio" class="pr"></td>
			<td><?php echo $doc; ?></td>
			<td><?php echo $Nom; ?></td>
			<td><?php echo $cod; ?></td>
			
			
			<td><?php echo $tel; ?></td>
			<td><?php echo $dir; ?></td>
				
		</tr> 
<?php }?>
