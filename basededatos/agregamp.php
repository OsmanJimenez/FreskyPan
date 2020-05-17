<?php
session_start();
require ("connectionbd.php");
$cod= $_POST['cod'];	
$nom= $_POST['nom'];		
$pre= $_POST['pre'];	
$can= $_POST['can'];	
$est= $_POST['est'];
$iva= $_POST['iva'];
$udm= $_POST['udm'];
$tip= $_POST['tip'];
$des= $_POST['des'];	
$prv=$_POST['prv'];
$id90 = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha añadido la Materia Prima : ".$nom." con el id : ".$cod;
	

$query="INSERT INTO MateriaPrima(ID_MATERIAPRIMA,nombre,cantidad,descripcion,precio,iva,stock,estado,FK_ID_MEDIDACANTIDAD,FK_ID_TIPOMATERIAPRIMA) VALUES ('$cod','$nom','$can','$des','$pre','$iva','0','$est','$udm','$tip')";
$result=mysqli_query($conn,$query);
$query2="INSERT INTO `proveedor_materiaprima`(`FK_ID_MATERIAPRIMA`, `FK_ID_PROVEEDOR`, `estado`) VALUES ('$cod','$prv','1')";
$result2=mysqli_query($conn,$query2);
if(!$result){
	if(mysqli_errno($conn)==1062){
?><script type="text/javascript">alert("Error ya se encuentra un registro con el mismo código")</script> <?php  
	}else {
		echo "error",mysqli_error($conn);
	}
	//header('location:../backend/Materia_Agregar.php'); 

}else{
echo "registro insertado";
$query90="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id90')";
		$result90=mysqli_query($conn,$query90);
		if(!$result90){
          echo "error",mysqli_error($conn);
		}
  header('location:../backend/Materia_Ver.php'); 
}
?>