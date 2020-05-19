<?php
require ("connectionbd.php");
		$sql_comboprov="SELECT * FROM BODEGA;";

	$result_comboprov=mysqli_query($conn,$sql_comboprov);
	
			while($fila_comboprov=mysqli_fetch_array($result_comboprov)){			
				$cod = $fila_comboprov['ID_BODEGA'];

				?>
					<option value="<?php echo $cod; ?>">Bodega : <?php echo $cod; ?></option>
				<?php 
				}
				?>