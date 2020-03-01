<?php
require ("connectionbd.php");
$query="Select * from pedidos";
$result=mysqli_query($conn,$query);
$i = 0;
			

			while($fila=mysqli_fetch_array($result)){			
				$des = $fila['Id_ped'];
				$cod = $fila['Fec_ped'];
				$fece=$fila['Nom_cl'];
				$fecp=$fila['can_ped'];
				$dir_ped=$fila['dir_ped'];
                $des_ped=$fila['des_ped'];
                $cod_pro=$fila['cod_pro'];
                $ape=$fila['a1_cl'];
                $est=$fila['est_ped'];
				$i++;	

				?>

		<tr align="center">
			<td><?php echo $des; ?></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $fece; ?></td>
			
			
			
			<td><?php echo $cod_pro; ?></td>
			<td><?php echo $fecp; ?></td>
			
		
		</tr>
<?php }?>
