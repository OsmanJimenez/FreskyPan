<?php
require ("connectionbd.php");
			$editar_id = $_GET['id']; 
			
			$consulta = "SELECT * FROM productos WHERE cod='$editar_id'";
			$ejecutar = mysqli_query($conn, $consulta); 
			
			$fila=mysqli_fetch_array($ejecutar);
				$Nom = $fila['nom'];
			    $pre = $fila['precio'];


            ?>
<input type="text" name="nom" value="<?php echo $Nom ?>">
<input type="text" name="pre" value="<?php echo $pre ?>">
<input type="text" name="id" value="<?php echo $editar_id ?>">