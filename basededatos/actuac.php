<?php
session_start();
require ("connectionbd.php");
$cod=$_POST['ced'];
$tel=$_POST['tel'];
$nom=$_POST['nom'];
$a1=$_POST['a1'];
$a2 =$_POST['a2'];
$nom2=$_POST['nom2'];
$cor=$_POST['cor'];
$est=$_POST['est'];




$query="UPDATE proveedor SET prNombre='$nom',segNombre='$nom2',prApellido='$a1',segApellido='$a2',correo='$cor',estado='$est' WHERE ID_PROVEEDOR='$cod'";
$query2="UPDATE telefono set ID_TELEFONO='$tel' where FK_ID_PROVEEDOR='$cod'";
$id90 = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha modificado al modificado al proveedor : ".$nom." con el id : ".$cod;
	$query90="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id90')";
		
$result=mysqli_query($conn,$query);
$result2=mysqli_query($conn,$query2);
if(!$result){
echo "no se pudo";

}else{
		$result90=mysqli_query($conn,$query90);
		if(!$result90){
          echo "error",mysqli_error($conn);
		}
echo "registro insertado";
	header('location:../backend/Clientes_Ver.php');
}


?>
