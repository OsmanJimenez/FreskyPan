<?php
require ("connectionbd.php");
$idv=$_POST['cod'];		
$idp=$_POST['pro'];	
$can=$_POST['can'];	
$fec=$_POST['fec'];	
var_dump($fec);
$query1="INSERT INTO venta(ID_VENTA,fecha) VALUES ('$idv','$fec')";
$result1=mysqli_query($conn,$query1);
$query="insert into venta_produccion(FK_ID_PRODUCCION, FK_ID_VENTA, cantidad) VALUES ('$idp','$idv','$can')";
$result=mysqli_query($conn,$query);
$query2="UPDATE produccion,catproducto SET produccion.cantidadInicial=produccion.cantidadInicial-'$can',catproducto.stock=catproducto.stock-'$can' WHERE produccion.ID_PRODUCCION='$idp' and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";
$result2=mysqli_query($conn,$query2);
if(!$result2 || ! $result1 || !$result){
echo "error",mysqli_error($conn);
}else{
header('location:../backend/Ventas_ver.php');
    
}




?>