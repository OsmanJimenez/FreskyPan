<?php
require ("connectionbd.php");
if(empty($_GET)){
	$result=mysqli_query($conn,"SELECT ID_MATERIAPRIMA,MateriaPrima.nombre,cantidad,descripcion,precio,iva,estado,TipoMateriaPrima.nombre AS TMP,MedidaCantidad.nombre AS MC FROM MateriaPrima,TipoMateriaPrima,MedidaCantidad WHERE estado='1' AND FK_ID_MEDIDACANTIDAD=ID_MEDIDACANTIDAD AND FK_ID_TIPOMATERIAPRIMA=ID_TIPOMATERIAPRIMA");
	$vertodo="False";
} else {
	$result=mysqli_query($conn,"SELECT ID_MATERIAPRIMA,MateriaPrima.nombre,cantidad,descripcion,precio,iva,estado,TipoMateriaPrima.nombre AS TMP,MedidaCantidad.nombre AS MC FROM MateriaPrima,TipoMateriaPrima,MedidaCantidad WHERE FK_ID_MEDIDACANTIDAD=ID_MEDIDACANTIDAD AND FK_ID_TIPOMATERIAPRIMA=ID_TIPOMATERIAPRIMA");
	$vertodo="True";
}		
			while($fila=mysqli_fetch_array($result)){			
				$cod = $fila['ID_MATERIAPRIMA'];
				$nom = $fila['nombre'];
				$can = $fila['cantidad'];
				$des = $fila['descripcion'];
				$pre = $fila['precio'];
				$iva = $fila['iva'];
				$est = $fila['estado'];
				$tm = $fila['TMP'];
				$mc = $fila['MC'];
				?>

		<tr align="center">
			<td><?php echo $cod; ?></td>
			<td><?php echo $nom; ?></td>
			<td><?php echo $des; ?></td>
			<td><?php echo $tm; ?></td>
			<td><?php echo $can." ".$mc; ?></td>
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
		<td><a class="btn btn-success" href="Materia_Modificar.php?id=<?php echo $cod; ?>&all=<?php echo $vertodo; ?>">Editar</a></td>
		<td><a class="btn btn-danger" href="../basededatos/cam_est_mp.php?id=<?php echo $cod; ?>&est=<?php echo $est; ?>&all=<?php echo $vertodo; ?>">Cambiar estado</a></td>
		</tr> <label></label>
	<?php } ?>
<?php }?>