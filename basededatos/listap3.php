<?php
require ("connectionbd.php");
$query="Select * from pedidos";
$result=mysqli_query($conn,$query);
$i = 0;
			

			while($fila=mysqli_fetch_array($result)){			
				$des = $fila['Id_ped'];
				$cod = $fila['Fec_ped'];
				$fecp=$fila['can_ped'];
				$dir_ped=$fila['dir_ped'];
                $des_ped=$fila['des_ped'];
                $cod_pro=$fila['cod_pro'];
                $ced=$fila['ced_cl'];
				$i++;	

				?>

		<tr align="center">
			<td><input type="radio" name="r1" onclick="//cambia('<?php echo $des; ?>')" id="sd" class="pr"></input></td>
			<td><?php echo $des; ?></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $ced?></td>
			<td><?php echo $cod_pro; ?></td>
			<td><?php echo $fecp; ?></td>

			<td><a  class="btn btn-success" href="actuap.php?id=<?php echo $des; ?>">Editar</a></td>
			<td><a  class="btn btn-danger" href="basededatos/elimp.php?id=<?php echo $des; ?>">Borrar</a></td> 
		</tr>
<?php }?>
