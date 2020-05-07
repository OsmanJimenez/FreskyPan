<?php
require ("connectionbd.php");
$query="Select * from proveedor,telefono where telefono.FK_ID_PROVEEDOR=proveedor.ID_PROVEEDOR";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$doc = $fila['ID_PROVEEDOR'];
				$Nom = $fila['prNombre'];
				$Nom2 = $fila['segNombre']; 
				$code = $fila['prApellido'];
				$tel = $fila['ID_TELEFONO'];
				$cor = $fila['correo'];
				$est=$fila['estado'];
				$i++;	?>

		<tr align="center">
		
			<td><?php echo $doc; ?></td>
			<td><?php echo $Nom; ?></td>
			<td><?php echo $Nom2; ?></td>
			<td><?php echo $code; ?></td>
			<td><?php echo $tel; ?></td>
			<td><?php echo $cor; ?></td>
						<td><?php
             if($est==1){

             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{

             	?><label class="btn btn-warning">Inactivo</label><?php
             }

              ?></td>
	        <td><a class="btn btn-success" href="Clientes_Modificar.php?id=<?php echo $doc; ?>">Editar</a></td>

	</tr> <br>
<?php }?>
