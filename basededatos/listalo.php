<?php
require ("connectionbd.php");
$query="Select produccion.ID_PRODUCCION,produccion.fechaProduccion,produccion.FK_ID_CATPRODUCTO,catproducto.nombre,produccion.cantidadInicial,produccion.unidades from produccion,catproducto where produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO ORDER BY `produccion`.`fechaProduccion` ASC";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$Nom = $fila['nombre'];
				$fec = $fila['fechaProduccion']; 
				$nump = $fila['FK_ID_CATPRODUCTO'];
				$numl = $fila['ID_PRODUCCION'];
				$ca=$fila['cantidadInicial'];
				$canr=$fila['unidades'];
				$i++;	?>

		<tr align="center">
			
			
			<td><?php echo $numl; ?></td>
			<td><?php echo $fec; ?></td>
			<td><?php echo $nump; ?></td>
			<td><?php echo $Nom; ?></td>
			<td><?php echo $ca; ?></td>
			<td><?php echo $canr; ?></td>
			<!--<td>
				<?php
            /* if($est==1){

             	 ?><label class="btn btn-primary">Activo</label><?php
             }else{

             	?><label class="btn btn-warning">Inactivo</label><?php
             }*/

              ?></td>-->
			<td><a class="btn btn-success" href="lotes_modificar.php?id=<?php echo $numl; ?>&fec=<?php echo $fec; ?>&ca=<?php echo $ca?>">Editar</a></td>
		<!--	<td><a  class="btn btn-danger" href="../basededatos/cam_est6.php?idc=<?php echo $Nom; ?>&fec=<?php /* echo */$cod; ?>">Cambiar estado</a></td> -->
		</tr> 
<?php }?>
