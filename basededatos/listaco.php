<?php
require ("connectionbd.php");
$query="Select contratos.est_con,contratos.cod_con,contratos.tip_con,productos.nom_pro,clientes.nom_cl,pedidos.ced_cl,contratos.hor_ent,contratos.fec_ent from contratos,productos,clientes,pedidos where contratos.id_ped=pedidos.Id_ped AND pedidos.ced_cl=clientes.ced_cl AND pedidos.cod_pro=productos.cod_pro ";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){
			    $code=$fila['cod_con'];			
				$tip = $fila['tip_con'];
				$cod = $fila['nom_pro'];
				$fec=$fila['nom_cl'];
				$ced_cl=$fila['ced_cl'];
                $hor_ent=$fila['hor_ent']; 	
                $fec_ent=$fila['fec_ent'];
                $est=$fila['est_con'];
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
			<td><a class="btn btn-success" href="Contratos_Modificar.php?id3=<?php echo $code; ?>">Editar</a></td>
			<td><a class="btn btn-danger" href="../basededatos/cam_est4.php?id3=<?php echo $code; ?>">Cambiar de estado</a></td>
		</tr>
<?php }?>