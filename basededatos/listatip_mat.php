<?php
require ("connectionbd.php");
$query="SELECT * FROM TipoMateriaPrima";
$result=mysqli_query($conn,$query);
			
			while($fila=mysqli_fetch_array($result)){			
				$nom = $fila['nombre'];
				$id = $fila['ID_TIPOMATERIAPRIMA']; 
			?>

		<tr align="center">
			<td><?php echo $id; ?></td>
			<td><?php echo $nom; ?></td>
		</tr> 
<?php } ?>