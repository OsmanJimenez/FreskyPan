<?php
require ("connectionbd.php");
$query="SELECT * FROM Pedido,PEDIDO_PROVEEDOR,Proveedor WHERE ID_PEDIDO=FK_ID_PEDIDO AND ID_PROVEEDOR=FK_ID_PROVEEDOR AND Pedido.estado='1';";
$result=mysqli_query($conn,$query);
			
			while($fila=mysqli_fetch_array($result)){			
				$codped = $fila['ID_PEDIDO'];
				$fecped = $fila['fecha'];
				$plaped=$fila['plazo'];
				$exiped=$fila['exigencia'];
                $nomped=$fila['prNombre']." ".$fila['segNombre']." ".$fila['prApellido']." ".$fila['segApellido'];
				?>

		<tr align="center">
			<td><input type="radio" name="rcod_ped" value="<?php echo $codped; ?>" id="rcod_ped" class="pr"></input></td>
			<td><?php echo $codped; ?></td>
			<td><?php echo $fecped; ?></td>
			<td><?php echo $plaped; ?></td>
			<td><?php echo $exiped; ?></td>
			<td><?php echo $nomped; ?></td>
		</tr>
<?php }?>
