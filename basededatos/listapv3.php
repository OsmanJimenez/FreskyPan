
<?php
require ("connectionbd.php");
$query="Select * from productos";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){
				$code = $fila['cod_pro'];		
				$Nom = $fila['nom_pro'];
				
				
				$stock=$fila['cat_pro'];
				$est=$fila['est_pro'];
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
