<?php
require ("connectionbd.php");
			$editar_id = $_GET['id']; 
			
			$consulta = "SELECT * FROM insumos WHERE cod='$editar_id'";
			$ejecutar = mysqli_query($conn, $consulta); 
			
			$fila=mysqli_fetch_array($ejecutar);
				$nom = $fila['nom'];
				$fec = $fila['fec'];  
				$con = $fila['cod'];

            ?>
<input type="text" name="nom" value="<?php echo $nom ?>">
<input type="number" name="id" value="<?php echo $con?>">
<input type="text" name="fec" value="<?php echo $fec ?>">
