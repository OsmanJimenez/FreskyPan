<?php
require ("connectionbd.php");
$query="Select  * from productos";
$result=mysqli_query($conn,$query);
	$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$Nom = $fila['nom_pro'];
				$cod = $fila['pre_pro'];
				$fec=$fila['sab_pro'];
				$des = $fila['des_pro'];
				$est=$fila['est_pro'];
				$id=$fila['cod_pro'];
				$i++;	?>

		<tr align="center">
			<td><?php echo $Nom; ?></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $fec; ?></td>
			<td><?php echo $des; ?></td>
			<td><?php
             if($est==1){

             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{

             	?><label class="btn btn-warning">Inactivo</label><?php
             }

              ?></td>
		<td><a class="btn btn-success" href="Productos_Modificar.php?idc=<?php echo $id; ?>">Editar</a></td>
		<td><a class="btn btn-danger" href="../basededatos/cam_est.php?idc=<?php echo $id; ?>">Cambiar estado</a></td>
		</tr> <label></label>
<?php }?>