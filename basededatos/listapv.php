<?php
require ("connectionbd.php");
/*$query="Select sum(lote.st_prn) as sum,productos.nom_pro,
productos.pre_pro,
productos.sab_pro,
productos.des_pro,
productos.est_pro,
productos.cod_pro  from lote,productos where productos.cod_pro=lote.cod_pro group by productos.nom_pro having count(*)>0 ";*/
$query="Select * from catproducto";
$result=mysqli_query($conn,$query);

	$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$Nom = $fila['nombre'];
				$cod = $fila['precio'];
				$fec=$fila['sabor'];
				$des = $fila['descripcion'];
				$stock=$fila['stock'];
				$est=$fila['estado'];
				$id=$fila['ID_CATPRODUCTO'];
				$i++;	?>

		<tr align="center">
			<td><?php echo $Nom; ?></td>
			<td><?php echo $cod; ?></td>
			<td><?php echo $fec; ?></td>
			<td><?php echo $des; ?></td>
			<td><?php echo $stock; ?></td>
			<td><?php
             if($est==1){

             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{

             	?><label class="btn btn-warning">Suspendido</label><?php
             }

              ?></td>
		<td><a class="btn btn-success" href="Productos_Modificar.php?idc=<?php echo $id; ?>">Editar</a></td>
		<td><a class="btn btn-danger" href="../basededatos/cam_est.php?idc=<?php echo $id; ?>">Cambiar estado</a></td>
		</tr> <label></label>
<?php }?>