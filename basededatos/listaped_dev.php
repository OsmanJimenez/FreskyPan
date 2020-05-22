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
			<td width="5%"><input type="radio" name="rcod_ped" value="<?php echo $codped; ?>" onclick="location.href='Devoluciones_Agregar.php?ped=<?php echo $codped ?>';" id="rcod_ped" required <?php if(!empty($_GET)){if($codped==$_GET['ped']){ ?> checked <?php }} ?>></input></td>
			<td width="16%"><?php echo $codped; ?></td>
			<td width="16%"><?php echo $fecped; ?></td>
			<td width="16%"><?php echo $plaped; ?></td>
			<td width="16%"><?php echo $exiped; ?></td>
			<td width="27%"><?php echo $nomped; ?></td>
		</tr>
<?php }?>
