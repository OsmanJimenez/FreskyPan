<?php
require ("connectionbd.php");
		$sql2="SELECT * FROM `tipoproducto`";

	$result2=mysqli_query($conn,$sql2);
	
			while($fila2=mysqli_fetch_array($result2)){			
				$cod = $fila2['ID_TIPOPRODUCTO'];
				$nom = $fila2['nombre'];
		
				
				?>
		
		<option value="<?php echo $cod; ?>  "><?php echo $nom?> </option>
	
<?php 

}?>