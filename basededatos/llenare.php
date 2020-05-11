<?php

  
$fecha_actual = date("Y-m-d");
//resto 7 día
$fecha2=date("Y-m-d",strtotime($fecha_actual."- 7 days"));
$fecha3=date("Y-m-d",strtotime($fecha_actual."- 1 month"));
require("../basededatos/connectionbd.php");
$query="SELECT SUM(venta_produccion.cantidad*catproducto.precio) as prom FROM venta,venta_produccion,produccion,catproducto where venta.fecha BETWEEN '$fecha2' and '$fecha_actual'and venta.ID_VENTA=venta_produccion.FK_ID_VENTA and venta_produccion.FK_ID_PRODUCCION=produccion.ID_PRODUCCION and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";
$result=mysqli_query($conn,$query);
$fila=mysqli_fetch_array($result);
$prom=$fila['prom'];
$prom2=number_format((round($prom)));

$query2="SELECT SUM(venta_produccion.cantidad*catproducto.precio) as prome FROM venta,venta_produccion,produccion,catproducto where venta.fecha BETWEEN '$fecha3' and '$fecha_actual'and venta.ID_VENTA=venta_produccion.FK_ID_VENTA and venta_produccion.FK_ID_PRODUCCION=produccion.ID_PRODUCCION and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO";
$result2=mysqli_query($conn,$query2);
$fila2=mysqli_fetch_array($result2);
$prom3=$fila2['prome'];
$prom4=number_format((round($prom3)));
$año=date("Y");
$c=[];
for ($i=1; $i <13 ; $i++) { 
  $mes="".$año."-0".$i."%";
  $querye="SELECT SUM(venta_produccion.cantidad*catproducto.precio) as promed FROM venta,venta_produccion,produccion,catproducto where venta.fecha LIKE '$mes' and venta.ID_VENTA=venta_produccion.FK_ID_VENTA and venta_produccion.FK_ID_PRODUCCION=produccion.ID_PRODUCCION and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO ";
  $res=mysqli_query($conn,$querye);
$fil=mysqli_fetch_array($res);
$fil2=mysqli_fetch_row($res);
$pr=$fil['promed'];
if(isset($pr)){
$c[$i]=(int)$pr;
} else if(!(isset($pr)) ){
  $c[$i]=0;
}
}
$nb1="";
$nb2="";
$nb3="";
$vr1="";
$vr2="";
$vr3="";
$sum1=$c[1];
$sum2=$c[2];
$sum3=$c[3];
$sum4=$c[4];
$sum5=$c[5];
$sum6=$c[6];
$sum7=$c[7];
$sum8=$c[8];
$sum9=$c[9];
$sum10=$c[10];
$sum11=$c[11];
$sum12=$c[12];
$nom=[];
$val=[];
$query20="SELECT catproducto.nombre, sum(produccion.cantidadInicial ) AS total FROM produccion,catproducto WHERE produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO GROUP BY produccion.FK_ID_CATPRODUCTO ORDER BY total DESC";
$result20=mysqli_query($conn,$query20);
 $ns=1;
 
 
while($fila20=mysqli_fetch_array($result20)){

 
 if($ns<4 and $ns>0){
 	
$pr2=$fila20['nombre'];
$pr3=$fila20['total'];
 
  $nom[$ns]=$pr2;
  $val[$ns]=$pr3;
  
}


$ns++;
}

if((isset($nom) and isset($val)) and $ns==3 ){
$nb1=$nom[1];
$nb2=$nom[2];
$nb3=$nom[3];
$vr1=$val[1];
$vr2=$val[2];
$vr3=$val[3];
}

  ?>
  <input type="hidden" value="<?php echo $sum1; ?>" id="n1">
<input type="hidden" value="<?php echo $sum2; ?>" id="n2">
<input type="hidden" value="<?php echo $sum3; ?>" id="n3">
<input type="hidden" value="<?php echo $sum4; ?>" id="n4">
<input type="hidden" value="<?php echo $sum5; ?>" id="n5">
<input type="hidden" value="<?php echo $sum6; ?>" id="n6">
<input type="hidden" value="<?php echo $sum7; ?>" id="n7">
<input type="hidden" value="<?php echo $sum8; ?>" id="n8">
<input type="hidden" value="<?php echo $sum9; ?>" id="n9">
<input type="hidden" value="<?php echo $sum10; ?>" id="n10">
<input type="hidden" value="<?php echo $sum11; ?>" id="n11">
<input type="hidden" value="<?php echo $sum12; ?>" id="n12">

<input type="hidden" value="<?php echo $nb1; ?>" id="no1">
<input type="hidden" value="<?php echo $nb2; ?>" id="no2">
<input type="hidden" value="<?php echo $nb3; ?>" id="no3">
<input type="hidden" value="<?php echo $vr1; ?>" id="v1">
<input type="hidden" value="<?php echo $vr2; ?>" id="v2">
<input type="hidden" value="<?php echo $vr3; ?>" id="v3">