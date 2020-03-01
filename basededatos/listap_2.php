<?php
require ("connectionbd.php");
$query="Select pedidos.Id_ped,
pedidos.Fec_ped,
clientes.nom_cl,
pedidos.can_ped,
pedidos.dir_ped,
pedidos.des_ped,
pedidos.cod_pro,
clientes.a1_cl,
pedidos.est_ped from pedidos,clientes,productos where pedidos.ced_cl=clientes.ced_cl and pedidos.cod_pro=productos.cod_pro";
$result=mysqli_query($conn,$query);
$i = 0;
			

			while($fila=mysqli_fetch_array($result)){			
				$des = $fila['Id_ped'];
				$cod = $fila['Fec_ped'];
				$fece=$fila['nom_cl'];
				$fecp=$fila['can_ped'];
				$dir_ped=$fila['dir_ped'];
                $des_ped=$fila['des_ped'];
                $cod_pro=$fila['cod_pro'];
                $ape=$fila['a1_cl'];
                $est=$fila['est_ped'];
				$i++;	

				?>

		<tr align="center">
			<td><?php echo $des; ?></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $fece; ?></td>
			<td><?php echo $ape; ?></td>
			
			<td><?php echo $dir_ped; ?></td>
			<td><?php echo $des_ped; ?></td>
			<td><?php echo $cod_pro; ?></td>
			<td><?php echo $fecp; ?></td>
			<td><?php
             if($est==1){

             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{

             	?><label class="btn btn-warning">Inactivo</label><?php
             }

              ?></td>
		<td><a  class="btn btn-success" href="Pedidos_Actualizar.php?id=<?php echo $des;?>">Editar</a></td>
			<td><a  class="btn btn-danger" href="../basededatos/cam_est3.php?idc=<?php echo $des; ?>">Cambiar estado</a></td> 
		</tr>
<?php }?>
