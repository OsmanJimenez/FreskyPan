<?php
require ("connectionbd.php");
$cod_ven=$_POST['cod'];
$cod_pro= $_POST['pro'];	
$st_prn= $_POST['st'];	
$fec=$_POST['fec'];	
$can=$_POST['can'];

$su=$st_prn-$can;
echo $st_prn;
echo $can;
echo $su;
echo $cod_ven;
$query="UPDATE venta,produccion,catproducto,venta_produccion SET venta_produccion.cantidad='$can',produccion.unidades=produccion.unidades+'$su',catproducto.stock=catproducto.stock+'$su' WHERE venta_produccion.FK_ID_VENTA='$cod_ven' 
    and venta.ID_VENTA=venta_produccion.FK_ID_VENTA
    and venta_produccion.FK_ID_PRODUCCION=produccion.ID_PRODUCCION
    and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";

$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
//	header('location:../backend/');
}

?>