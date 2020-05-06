<?php
require ("connectionbd.php");
		$sql="SELECT ID_TIPOMATERIAPRIMA, nombre FROM TipoMateriaPrima";

	$result=mysqli_query($conn,$sql);
	
			while($fila=mysqli_fetch_array($result)){			
				$cod = $fila['ID_TIPOMATERIAPRIMA'];
				$nom = $fila['nombre'];
				?>
		<option value="<?php echo $cod ?>"><?php echo $nom?></option>
		
<?php }?>