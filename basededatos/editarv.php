<?php
session_start();
require ("connectionbd.php");
$cod_ven=$_POST['cod'];
$cod_pro= $_POST['pro'];	
$st_prn= $_POST['st'];	
$fec=$_POST['fec'];	
$can=$_POST['can'];

$su=$st_prn-$can;
$query89="select catproducto.nombre from produccion,catproducto where ID_PRODUCCION='$cod_pro' and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";

$result89=mysqli_query($conn,$query89);
     while ($fila20 = mysqli_fetch_array($result89)) {
              $nombr = $fila20['nombre'];
            }
$id90 = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha modificado una venta del producto ".$nombr." las unidades ahora son ".$can;
$query="UPDATE venta,produccion,catproducto,venta_produccion SET venta_produccion.cantidad='$can',produccion.unidades=produccion.unidades+'$su',catproducto.stock=catproducto.stock+'$su' WHERE venta_produccion.FK_ID_VENTA='$cod_ven' 
    and venta.ID_VENTA=venta_produccion.FK_ID_VENTA
    and venta_produccion.FK_ID_PRODUCCION=produccion.ID_PRODUCCION
    and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";

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
header('location:../backend/Ventas_ver.php');
}

?>