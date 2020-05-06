<?php
require ("connectionbd.php");
		$sql="SELECT ID_TIPOINSUMO, nombre FROM TipoInsumo";

	$result=mysqli_query($conn,$sql);
		
			while($fila=mysqli_fetch_array($result)){			
				$cod = $fila['ID_TIPOINSUMO'];
				$nom = $fila['nombre'];
				?>
		<option value="<?php echo $cod ?>"><?php echo $nom?></option> 
<?php }?>