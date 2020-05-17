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

$query="INSERT INTO proveedor(ID_PROVEEDOR,prNombre,segNombre,prApellido, segApellido,correo, estado) VALUES                   ('$cod'      ,'$nom','$nom2','$a1','$a2','$cor','$est')";
$id90 = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha modificado al proveedor : ".$nom." con el id : ".$cod;

$result=mysqli_query($conn,$query);
$query2="INSERT INTO telefono(FK_ID_PROVEEDOR,ID_TELEFONO) VALUES ('$cod','$tel')";
$result2=mysqli_query($conn,$query2);
if(!$result || !$result2){
echo "no se pudo",mysqli_error($conn);

}else{
	$query90="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id90')";
			$result90=mysqli_query($conn,$query90);
		if(!$result90){
          echo "error",mysqli_error($conn);
		}
echo "registro insertado";
	header('location:../backend/Clientes_Ver.php');
}


?>
