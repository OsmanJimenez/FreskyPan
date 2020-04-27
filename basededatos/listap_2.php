<?php
require ("connectionbd.php");
$query="Select venta_produccion.FK_ID_PRODUCCION,
venta_produccion.FK_ID_VENTA,
venta_produccion.cantidad,
catproducto.nombre,
venta.fecha 
from venta,produccion,venta_produccion,catproducto where venta_produccion.FK_ID_VENTA=venta.ID_venta and 
    venta_produccion.FK_ID_PRODUCCION=produccion.ID_PRODUCCION and
    produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";
$result=mysqli_query($conn,$query);
$i = 0;
			

			while($fila=mysqli_fetch_array($result)){			
				$idv = $fila['FK_ID_VENTA'];
				$fec = $fila['fecha'];
				$idp=$fila['FK_ID_PRODUCCION'];
				$can=$fila['cantidad'];
                $nom=$fila['nombre'];
				$i++;	

				?>

		<tr align="center">
			<td><?php echo $nom; ?></td>
			<td><?php echo $idv; ?></td>
			<td><?php echo $fec; ?></td>
			<td><?php echo $idp; ?></td>
			<td><?php echo $can; ?></td>
			

		<td><a  class="btn btn-success" href="Ventas_Modificar.php?id=<?php echo $idv;?>">Editar</a></td>
		</tr>
<?php }?>
