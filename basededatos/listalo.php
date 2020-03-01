<?php
require ("connectionbd.php");
$query="Select lote.est_lot,lote.id_lot,lote.fec,lote.cod_pro,lote.st_prn,productos.nom_pro from lote,productos where lote.cod_pro=productos.cod_pro ORDER BY `lote`.`fec` ASC";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$Nom = $fila['id_lot'];
				$cod = $fila['fec']; 
				$doc = $fila['cod_pro'];
				$tel = $fila['nom_pro'];
				$st=$fila['st_prn'];
				$est=$fila['est_lot'];
				$i++;	?>

		<tr align="center">
			
			
			<td><?php echo $Nom; ?></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $doc; ?></td>
			<td><?php echo $tel; ?></td>
			<td><?php echo $st; ?></td>
				<td>
				<?php
             if($est==1){

             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{

             	?><label class="btn btn-warning">Inactivo</label><?php
             }

              ?></td>
			<td><a class="btn btn-success" href="lotes_modificar.php?id=<?php echo $Nom; ?>&fec=<?php echo $cod; ?>">Editar</a></td>
			<td><a  class="btn btn-danger" href="../basededatos/cam_est6.php?idc=<?php echo $Nom; ?>&fec=<?php echo $cod; ?>">Cambiar estado</a></td>
		</tr> 
<?php }?>
