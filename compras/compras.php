<?php
session_start();
require ("../basededatos/connectionbd.php");
		$arreglo=$_SESSION['carrito'];
		$cl=$_SESSION['cl'];

	$todayh=getdate();
$d=$todayh['mday'];
		$m=$todayh['mon'];
		$y=$todayh['year'];

		$fec=$y."-".$m."-".$d;
		for($i=0; $i<count($arreglo);$i++){
			mysqli_query($conn,"insert into pedidos (Fec_ped,Nom_cl,a1_cl,a2_cl,can_ped,dir_ped,des_ped,cod_pro,ced_cl,est_ped) values(
				'".$fec."',
				'".$cl['nomcl']."',
				'".$cl['ape1']."',
				'".$cl['ape2']."',
				'".$arreglo[$i]['Cantidad']."',
				'".$cl['dircl']."',
				'".$cl['descl']."',
				'".$arreglo[$i]['Id']."',
				'".$cl['cedcl']."','1'
				)")or die(mysqli_error($conn));
			$ids=$arreglo[$i]['Id'];
			$can=$arreglo[$i]['Cantidad'];
			
			$actualizar = "UPDATE productos SET can_pro=can_pro-'$can' where cod_pro='$ids'";
		
		$ejecutar = mysqli_query($conn, $actualizar);
		}
		
		   
	
	
		
		unset($_SESSION['carrito']);
	

?>