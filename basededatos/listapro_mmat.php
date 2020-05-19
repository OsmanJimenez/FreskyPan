<?php
require ("connectionbd.php");
$sql_matpro="SELECT ID_PROVEEDOR, prNombre, segNombre, prApellido, segApellido FROM Proveedor,PROVEEDOR_MATERIAPRIMA WHERE Proveedor.estado='1' AND PROVEEDOR_MATERIAPRIMA.FK_ID_PROVEEDOR=Proveedor.ID_PROVEEDOR AND PROVEEDOR_MATERIAPRIMA.FK_ID_MATERIAPRIMA='$id' AND PROVEEDOR_MATERIAPRIMA.estado='1' ORDER BY prNombre ASC";
$result_matpro=mysqli_query($conn,$sql_matpro);
			while($fila_matpro=mysqli_fetch_array($result_matpro)){
				$idmatpro = $fila_matpro['ID_PROVEEDOR'];
				$prnommatpro = $fila_matpro['prNombre'];
				$segnommatpro = $fila_matpro['segNombre'];
				$prapematpro = $fila_matpro['prApellido'];
				$segapematpro = $fila_matpro['segApellido'];
				?>

		<tr align="center">
			<td><input type="checkbox" name="pro[]" value="<?php echo $idmatpro; ?>" id="pro" checked ></input></td>
			<td><?php echo $prnommatpro." ".$segnommatpro." ".$prapematpro." ".$segapematpro; ?></td>			
		</tr><label></label>
<?php }

$sql_pro="SELECT ID_PROVEEDOR, prNombre, segNombre, prApellido, segApellido FROM Proveedor WHERE estado='1' AND NOT EXISTS(SELECT NULL FROM PROVEEDOR_MATERIAPRIMA WHERE PROVEEDOR_MATERIAPRIMA.FK_ID_PROVEEDOR=Proveedor.ID_PROVEEDOR AND PROVEEDOR_MATERIAPRIMA.FK_ID_MATERIAPRIMA='$id' AND PROVEEDOR_MATERIAPRIMA.estado='1') ORDER BY prNombre ASC";
$result_pro=mysqli_query($conn,$sql_pro);
			while($fila_pro=mysqli_fetch_array($result_pro)){
				$idpro = $fila_pro['ID_PROVEEDOR'];
				$prnompro = $fila_pro['prNombre'];
				$segnompro = $fila_pro['segNombre'];
				$prapepro = $fila_pro['prApellido'];
				$segapepro = $fila_pro['segApellido'];
				?>

		<tr align="center">
			<td><input type="checkbox" name="pro[]" value="<?php echo $idpro; ?>" id="pro"></input></td>
			<td><?php echo $prnompro." ".$segnompro." ".$prapepro." ".$segapepro; ?></td>			
		</tr> <label></label>
<?php } ?>