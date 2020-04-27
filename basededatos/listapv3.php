<?php
require ("connectionbd.php");
$query="Select * from catproducto";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){
				$code = $fila['ID_CATPRODUCTO'];		
				$Nom = $fila['nombre'];
				
				
				$stock=$fila['descripcion'];
				$est=$fila['estado'];
				$i++;	?>

		<tr align="center">
			<td><input required="" type="radio" name="r1" onclick="cambia('<?php echo $code; ?>')" id="sd"></input></td>
			<td><?php echo $Nom; ?></td>
			<td><?php echo $code; ?></td>
			<td><?php echo $stock; ?></td>
			
			
		
			 <td><?php
             if($est==1){

             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{

             	?><label class="btn btn-warning">Inactivo</label><?php
             }

              ?></td>
		
		<td><a class="btn btn-danger" href="../basededatos/cam_est.php?idc=<?php echo $code; ?>">Cambiar estado</a></td>
		</tr>
<?php }?>
