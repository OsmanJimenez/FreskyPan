<?php
require ("connectionbd.php");
$query="Select devolucion.est_dev,devolucion.cod_dev,devolucion.des_dev,productos.nom_pro,clientes.nom_cl,clientes.ced_cl,devolucion.fec_dev from devolucion,productos,clientes,pedidos WHERE devolucion.cod_con=pedidos.Id_ped AND pedidos.ced_cl=clientes.ced_cl AND pedidos.cod_pro=productos.cod_pro ";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$tip = $fila['cod_dev'];
				$cod = $fila['des_dev'];
				$fec=$fila['nom_pro'];
				$ced_cl=$fila['nom_cl'];
                $hor_ent=$fila['ced_cl']; 	
                $fec_ent=$fila['fec_dev'];
                $est=$fila['est_dev'];
								$i++;	
				?>

		<tr align="center">
			<td><?php echo $tip; ?></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $fec; ?></td>
			<td><?php echo $ced_cl; ?></td>
			<td><?php echo $hor_ent; ?></td>
			<td><?php echo $fec_ent; ?></td>
			<td><?php
             if($est==1){

             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{

             	?><label class="btn btn-warning">Inactivo</label><?php
             }

              ?></td>
			<td><a class="btn btn-success" href="Devoluciones_Modificar.php?id4=<?php echo $tip; ?>">Editar</a></td>
			<td><a class="btn btn-danger" href="../basededatos/cam_est5.php?id3=<?php echo $tip; ?>">Cambiar estado</a></td>
		</tr>
<?php }?>