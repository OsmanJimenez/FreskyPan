<?php
require ("connectionbd.php");
$cod_pro= $_POST['id'];	
$st_prn= $_POST['st'];	
$fec=$_POST['fece'];	
$id=$_POST['idl'];
$can=$_POST['can'];

$su=$st_prn-$can;

$query="UPDATE venta,produccion,catproducto SET produccion.FK_ID_CATPRODUCTO='$cod_pro',produccion.cantidadInicial='$st_prn',catproducto.stock=catproducto.stock+'$su' WHERE ID_PRODUCCION='$id' and fechaProduccion='$fec' and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";

$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
	header('location:../backend/');
}

?>