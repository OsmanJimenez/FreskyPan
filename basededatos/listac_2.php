<?php
require ("connectionbd.php");
$query="Select clientes.nom_cl, clientes.a1_cl, clientes.ced_cl, telcl.tel_cl, clientes.dir_cl, clientes.est_cl from clientes,telcl where telcl.ced_cl=clientes.ced_cl";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$Nom = $fila['nom_cl'];
				$cod = $fila['a1_cl']; 
				$doc = $fila['ced_cl'];
				$tel = $fila['tel_cl'];
				$dir = $fila['dir_cl'];
				$est=$fila['est_cl'];
				$i++;	?>

		<tr align="center">
			<td><?php echo $doc; ?></td>
			
			<td><?php echo $Nom; ?></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $tel; ?></td>
			<td><?php echo $dir; ?></td>
				<td><?php
             if($est==1){

             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{

             	?><label class="btn btn-warning">Inactivo</label><?php
             }

              ?></td>
			<td><a class="btn btn-success" href="Clientes_Modificar.php?id=<?php echo $doc; ?>">Editar</a></td>
			<td><a  class="btn btn-danger" href="../basededatos/cam_est2.php?idc=<?php echo $doc; ?>">Cambiar estado</a></td>
		</tr> 
<?php }?>
