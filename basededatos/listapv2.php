
<?php
require ("connectionbd.php");
$query="Select sum(lote.st_prn) as sum,productos.nom_pro,
productos.pre_pro,
productos.sab_pro,
productos.des_pro,
productos.est_pro,
productos.cod_pro  from lote,productos where productos.cod_pro=lote.cod_pro group by productos.nom_pro having count(*)>0 ";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){
				$code = $fila['cod_pro'];		
				$Nom = $fila['nom_pro'];
				$cod = $fila['pre_pro'];
				$fec=$fila['sab_pro'];
				$des = $fila['des_pro'];
				$stock=$fila['sum'];
				$est=$fila['est_pro'];
				$i++;	?>

		<tr align="center">
			<td><input type="radio" name="r3" class="pr2" id="sd"></input></td>
			<td><?php echo $code?></td>
			<td><?php echo $Nom; ?></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $fec; ?></td>
			<td><?php echo $des; ?></td>
			<td><?php echo $stock; ?></td>
			 
		</tr>
<?php }?>


