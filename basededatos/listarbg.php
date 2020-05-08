<?php
require ("connectionbd.php");
if(empty($_GET)){
	$result=mysqli_query($conn,"SELECT * FROM Bodega WHERE estado='1'");
	$vertodo="False";
} else {
	$result=mysqli_query($conn,"SELECT * FROM Bodega");
	$vertodo="True";
}	
			while($fila=mysqli_fetch_array($result)){			
				$cod = $fila['ID_BODEGA'];
				$des = $fila['descripcion'];
				$est = $fila['estado'];
				?>

		<tr align="center">
			<td><?php echo $cod; ?></td>
			<td><?php echo $des; ?></td>
			<td><?php
             if($est==1){
             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{
             	?><label class="btn btn-warning">Inactivo</label><?php
             }
              ?></td>
		<td><a class="btn btn-success" href="Bodegas_Modificar.php?id=<?php echo $cod; ?>&all=<?php echo $vertodo; ?>">Editar</a></td>
		<td><a class="btn btn-danger" href="../basededatos/cam_est_bg.php?id=<?php echo $cod; ?>&est=<?php echo $est; ?>&all=<?php echo $vertodo; ?>">Cambiar estado</a></td>
		</tr> <label></label>
<?php }?>