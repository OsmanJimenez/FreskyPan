<?php
require ("connectionbd.php");
$query="Select * from clientes";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$Nom = $fila['nom_cl'];
				$cod = $fila['a1_cl']; 
				$doc = $fila['ced_cl'];
				$tel = $fila['tel_cl'];
				$dir = $fila['dir_cl'];
				$est=$fila['est_cl'];
				$i++;	?>

		<tr align="center">
			
			<td><?php echo $cod; ?></td>
			<td><?php echo $Nom; ?></td>
			<td><?php echo $doc; ?></td>
			<td><?php echo $tel; ?></td>
			<td><?php echo $dir; ?></td>
				
		</tr> 
<?php }?>
