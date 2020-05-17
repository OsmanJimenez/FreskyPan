<?php
$idusu = $_SESSION['cl']['id_u'];
date_default_timezone_set('America/Bogota');
			$hora_nof = new DateTime('now');
			$hora=$hora_nof->format("H:i");
			$fecha=date("Y-n-j");

			$query_inlog="INSERT INTO Log(fecha,hora,descripcion,FK_ID_USUARIO) VALUES ('$fecha','$hora','$razon','$idusu');";
			mysqli_query($conn,$query_inlog);
?>