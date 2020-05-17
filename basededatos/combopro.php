<?php
require ("connectionbd.php");
		$sql_comboprov="SELECT ID_PROVEEDOR,prNombre,segNombre,prApellido,segApellido FROM Proveedor WHERE estado='1';";

	$result_comboprov=mysqli_query($conn,$sql_comboprov);
	
			while($fila_comboprov=mysqli_fetch_array($result_comboprov)){			
				$cod = $fila_comboprov['ID_PROVEEDOR'];
				$prnom = $fila_comboprov['prNombre'];
				$segnom = $fila_comboprov['segNombre'];
				$prape = $fila_comboprov['prApellido'];
				$segape = $fila_comboprov['segApellido'];
				?>
					<option value="<?php echo $cod; ?>"><?php echo $prnom." ".$segnom." ".$prape." ".$segape; ?></option>
				<?php 
				}
				?>