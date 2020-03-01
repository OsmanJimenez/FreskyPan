<?php
require ("connectionbd.php");
			$editar_id = $_GET['id']; 
			
			$consulta = "SELECT * FROM user WHERE Id_u='$editar_id'";
			$ejecutar = mysqli_query($conn, $consulta); 
			
			$fila=mysqli_fetch_array($ejecutar);
				$Nom = $fila['Nom_u'];
				$Ape = $fila['Ape_u']; 
				$Id = $fila['Id_u']; 
				$Con = $fila['Con_u'];
				$Tip = $fila['Tipo'];

            ?>
<input type="text" name="nom" value="<?php echo $Nom ?>">
<input type="text" name="ape" value="<?php echo $Ape?>">
<input type="text" name="id" value="<?php echo $Id ?>">
<input type="text" name="con" value="<?php echo $Con ?>">
<input type="text" name="tip" value="<?php echo $Tip ?>">
