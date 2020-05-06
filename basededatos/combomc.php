<?php
require ("connectionbd.php");
		$sql="SELECT ID_MEDIDACANTIDAD, nombre FROM MedidaCantidad";

	$result=mysqli_query($conn,$sql);

	$i = 0;			
			while($fila=mysqli_fetch_array($result)){			
				$cod = $fila['ID_MEDIDACANTIDAD'];
				$nom = $fila['nombre'];
				
				$i++;	
				?>
		<option value="<?php echo $cod ?>"><?php echo $nom?></option>
		
<?php }?>