<?php
session_start();
require ("connectionbd.php");
$cod_pro= $_POST['id'];	
$st_prn= $_POST['st'];	
$fec=$_POST['fece'];	
$id=$_POST['idl'];
$can=$_POST['can'];

$su=$st_prn-$can;
$query89="select catproducto.nombre from produccion,catproducto where ID_PRODUCCION='$id' and fechaProduccion='$fec' and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";

$result89=mysqli_query($conn,$query89);
     while ($fila20 = mysqli_fetch_array($result89)) {
              $nombr = $fila20['nombre'];
            }
$id90 = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha editado el lote del producto ".$nombr." nuevas unidades son ".$can;


$query="UPDATE produccion,catproducto SET produccion.FK_ID_CATPRODUCTO='$cod_pro',produccion.unidades='$st_prn',catproducto.stock=catproducto.stock+'$su' WHERE ID_PRODUCCION='$id' and fechaProduccion='$fec' and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";

$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
$query90="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id90')";
		$result90=mysqli_query($conn,$query90);
		if(!$result90){
          echo "error",mysqli_error($conn);
		}
	header('location:../backend/lotes_ver.php');

}

?>