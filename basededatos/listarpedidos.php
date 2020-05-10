<?php
require ("connectionbd.php");
if(empty($_GET)){
	$result=mysqli_query($conn,"SELECT ID_PEDIDO,plazo,fecha,exigencia,prNombre,segNombre,prApellido,segApellido FROM Pedido,Proveedor,PEDIDO_PROVEEDOR WHERE PEDIDO_PROVEEDOR.FK_ID_PEDIDO=ID_PEDIDO AND PEDIDO_PROVEEDOR.FK_ID_PROVEEDOR=ID_PROVEEDOR AND Pedido.estado=1;");
	$vertodo="False";
} else {
	$result=mysqli_query($conn,"SELECT ID_PEDIDO,plazo,fecha,exigencia,prNombre,segNombre,prApellido,segApellido FROM Pedido,Proveedor,PEDIDO_PROVEEDOR WHERE PEDIDO_PROVEEDOR.FK_ID_PEDIDO=ID_PEDIDO AND PEDIDO_PROVEEDOR.FK_ID_PROVEEDOR=ID_PROVEEDOR;");
	$vertodo="True";
}		
			while($fila=mysqli_fetch_array($result)){			
				$cod = $fila['ID_PEDIDO'];
				$fec = $fila['fecha'];
				$pla = $fila['plazo'];
				$exi = $fila['exigencia'];
				$pro = $fila['prNombre']." ".$fila['segNombre']." ".$fila['prApellido']." ".$fila['segApellido'];
				?>

		<tr align="center">
			<td><?php echo $cod; ?></td>
			<td><?php echo $nom; ?></td>
			<td><?php echo $can; ?></td>
			<td><?php echo $des; ?></td>
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
		<td><a class="btn btn-success" href="Materia_Modificar.php?id=<?php echo $cod; ?>&all=<?php echo $vertodo; ?>">Editar</a></td>
		<td><a class="btn btn-danger" href="../basededatos/cam_est_mp.php?id=<?php echo $cod; ?>&est=<?php echo $est; ?>&all=<?php echo $vertodo; ?>">Cambiar estado</a></td>
		</tr> <label></label>
<?php }?>