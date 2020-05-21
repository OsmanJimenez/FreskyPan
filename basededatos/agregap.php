<?php
session_start();
require ("connectionbd.php");
$idv=$_POST['cod'];		
$idp=$_POST['pro'];	
$can=$_POST['can'];	
$fec=$_POST['fec'];
$query89="select catproducto.nombre,produccion.unidades from produccion,catproducto,venta where ID_PRODUCCION='$idp' and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";

$result89=mysqli_query($conn,$query89);
     while ($fila20 = mysqli_fetch_array($result89)) {
              $nombr = $fila20['nombre'];
              $rr=$fila20['unidades'];
            }


$id90 = $_SESSION['cl']['id_u'];
$actua=date("Y-m-d");
$fecha=date("Y-m-d",strtotime($actua." - 1 days") );
$horario = new DateTime("now", new DateTimeZone('America/Bogota'));
$hora="".$horario->format('H:i');
$desc="Se ha añadido una venta del producto ".$nombr." las unidades vendidas fueron ".$can;
$veri=$rr-$can;
if($veri>0){
$query1="INSERT INTO venta(ID_VENTA,fecha) VALUES ('$idv','$fec')";
$result1=mysqli_query($conn,$query1);
$query="insert into venta_produccion(FK_ID_PRODUCCION, FK_ID_VENTA, cantidad) VALUES ('$idp','$idv','$can')";
$result=mysqli_query($conn,$query);
$query2="UPDATE produccion,catproducto SET produccion.cantidadInicial=produccion.unidades-'$can',catproducto.stock=catproducto.stock-'$can' WHERE produccion.ID_PRODUCCION='$idp' and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";
$result2=mysqli_query($conn,$query2);
if(!$result2 || ! $result1 || !$result){
echo "error",mysqli_error($conn);
}else{
	$query90="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$id90')";
		$result90=mysqli_query($conn,$query90);
		if(!$result90){
          echo "error",mysqli_error($conn);
		}
header('location:../backend/Ventas_ver.php');
    
}
} else if($veri){
	 ?>
<script>
alert('La cantidad vendida no puede superar la produccion');
  window.location.href='../backend/Ventas_Agregar.php';
</script><?php
}



?>