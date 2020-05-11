<?php
require ("connectionbd.php");
if(empty($_GET)){
	$result=mysqli_query($conn,"SELECT ID_INSUMO,Insumo.nombre,cantidad,descripcion,precio,iva,estado,TipoInsumo.nombre AS TI FROM Insumo,TipoInsumo WHERE estado='1' AND FK_ID_TIPOINSUMO=ID_TIPOINSUMO");
	$vertodo="False";
} else {
	$result=mysqli_query($conn,"SELECT ID_INSUMO,Insumo.nombre,cantidad,descripcion,precio,iva,estado,TipoInsumo.nombre AS TI FROM Insumo,TipoInsumo WHERE FK_ID_TIPOINSUMO=ID_TIPOINSUMO");
	$vertodo="True";
}		
			while($fila=mysqli_fetch_array($result)){			
				$cod = $fila['ID_INSUMO'];
				$nom = $fila['nombre'];
				$can = $fila['cantidad'];
				$des = $fila['descripcion'];
				$pre = $fila['precio'];
				$iva = $fila['iva'];
				$est = $fila['estado'];
				$ti = $fila['TI'];
				?>

		<tr align="center">
			<td><?php echo $cod; ?></td>
			<td><?php echo $nom; ?></td>
			<td><?php echo $des; ?></td>
			<td><?php echo $ti; ?></td>
			<td><?php echo $can." Unidades"; ?></td>
			<td><?php echo "$".$pre; ?></td>
			<td><?php echo $iva."%"; ?></td>
			<td><?php
             if($est==1){
             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{
             	?><label class="btn btn-warning">Inactivo</label><?php
             }
              ?></td>
               <?php if($rol=='Administrador'){?>
		<td><a class="btn btn-success" href="Insumo_Modificar.php?id=<?php echo $cod; ?>&all=<?php echo $vertodo; ?>">Editar</a></td>
		<td><a class="btn btn-danger" href="../basededatos/cam_est_im.php?id=<?php echo $cod; ?>&est=<?php echo $est; ?>&all=<?php echo $vertodo; ?>">Cambiar estado</a></td>
	<?php }?>
		</tr> <label></label>
<?php  }?>