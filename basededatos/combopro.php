<?php
require ("connectionbd.php");
		$sql2="SELECT ID_PROVEEDOR, prNombre,prApellido,estado FROM proveedor";

	$result2=mysqli_query($conn,$sql2);
	
			while($fila2=mysqli_fetch_array($result2)){			
				$cod = $fila2['ID_PROVEEDOR'];
				$nom = $fila2['prNombre'];
				$nom2=$fila2['prApellido'];
				$esta=$fila2['estado'];
				if($esta==1){
				?>
		
		<option value="<?php echo $cod; ?>  "><?php echo $nom?> <?php echo $nom2; ?></option>
	
<?php 
}
}?>