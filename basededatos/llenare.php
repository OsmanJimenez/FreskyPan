<?php

  
$fecha_actual = date("Y-m-d");
//resto 7 día
$fecha2=date("Y-m-d",strtotime($fecha_actual."- 7 days"));
$fecha3=date("Y-m-d",strtotime($fecha_actual."- 1 month"));
require("../basededatos/connectionbd.php");
$query="SELECT SUM(VENTA_PRODUCCION.cantidad*CatProducto.precio) as prom FROM Venta,VENTA_PRODUCCION,Produccion,CatProducto where Venta.fecha BETWEEN '$fecha2' and '$fecha_actual'and Venta.ID_VENTA=VENTA_PRODUCCION.FK_ID_VENTA and VENTA_PRODUCCION.FK_ID_PRODUCCION=Produccion.ID_PRODUCCION and Produccion.FK_ID_CATPRODUCTO=CatProducto.ID_CATPRODUCTO";
$result=mysqli_query($conn,$query);
$fila=mysqli_fetch_array($result);
$prom=$fila['prom'];
$prom2=number_format((round($prom)));

$query2="SELECT SUM(VENTA_PRODUCCION.cantidad*CatProducto.precio) as prome FROM Venta,VENTA_PRODUCCION,Produccion,CatProducto where Venta.fecha BETWEEN '$fecha3' and '$fecha_actual'and Venta.ID_VENTA=VENTA_PRODUCCION.FK_ID_VENTA and VENTA_PRODUCCION.FK_ID_PRODUCCION=Produccion.ID_PRODUCCION and Produccion.FK_ID_CATPRODUCTO=CatProducto.ID_CATPRODUCTO";
$result2=mysqli_query($conn,$query2);
$fila2=mysqli_fetch_array($result2);
$prom3=$fila2['prome'];
$prom4=number_format((round($prom3)));
$año=date("Y");
$c=[];
for ($i=1; $i <13 ; $i++) { 
  $mes="".$año."-0".$i."%";
  $querye="SELECT SUM(VENTA_PRODUCCION.cantidad*CatProducto.precio) as promed FROM Venta,VENTA_PRODUCCION,Produccion,CatProducto where Venta.fecha LIKE '$mes' and Venta.ID_VENTA=VENTA_PRODUCCION.FK_ID_VENTA and VENTA_PRODUCCION.FK_ID_PRODUCCION=Produccion.ID_PRODUCCION and Produccion.FK_ID_CATPRODUCTO=CatProducto.ID_CATPRODUCTO ";
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
$query20="SELECT CatProducto.nombre, sum(Produccion.cantidadInicial ) AS total FROM Produccion,CatProducto WHERE Produccion.FK_ID_CATPRODUCTO=CatProducto.ID_CATPRODUCTO GROUP BY Produccion.FK_ID_CATPRODUCTO ORDER BY total DESC";
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
$lo1=sizeof($nom);
$lo2=sizeof($val);

if((isset($nom) and isset($val)) and ($lo1>2) and ($lo2>2)  ){
$nb1=$nom[1];
$nb2=$nom[2];
$nb3=$nom[3];
$vr1=$val[1];
$vr2=$val[2];
$vr3=$val[3];
}
$ult="SELECT usuario.prNombre,usuario.prApellido,COUNT(log.ID_LOG) as cd FROM log,usuario where log.FK_ID_USUARIO=usuario.ID_USUARIO GROUP by log.FK_ID_USUARIO,usuario.prNombre ORDER BY `cd` DESC";
$uq=mysqli_query($conn,$ult);
 $ust=1;
 $sumt=0;
while($fu=mysqli_fetch_array($uq)){
$usrt[$ust]=$fu['prNombre']." ".$fu['prApellido'];
$mov[$ust]=$fu['cd'];
$sumt=$sumt+intval($fu['cd']);
$ust++;
}

$lo3=sizeof($usrt);
$lo4=sizeof($mov);
if($lo3>0 || $lo4 >0){
$nus=$usrt[1];
$nusm=$mov[1];
$div=round(($nusm*100)/$sumt);
}
$nus1=0;
$nusm1=0;
if($lo3>1 || $lo4 >1){
$nus1=$usrt[2];
$nusm1=$mov[2];
$div1=round((intval(($nusm1)*100))/$sumt);
}
$nus2=0;
$nusm2=0;
if($lo3>2 || $lo4 >2){
$nus2=$usrt[3];
$nusm2=$mov[3];
$div2=round((intval(($nusm2)*100))/$sumt);
}
$nus3=0;
$nusm3=0;
if($lo3>3 || $lo4 >3){
$nus3=$usrt[3];
$nusm3=$mov[3];
$div3=round((intval(($nusm3)*100))/$sumt);
}
$nus4=0;
$nusm4=0;
if($lo3>4 || $lo4 >4){
$nus4=$usrt[3];
$nusm4=$mov[3];
$div4=round((intval(($nusm4)*100))/$sumt);
}
$ult2="SELECT catproducto.nombre,COUNT(venta.ID_VENTA) as cd FROM venta,venta_produccion,produccion,catproducto where venta.ID_VENTA=venta_produccion.FK_ID_VENTA and venta_produccion.FK_ID_PRODUCCION=produccion.ID_PRODUCCION and produccion.FK_ID_CATPRODUCTO=catproducto.ID_CATPRODUCTO GROUP by catproducto.ID_CATPRODUCTO ORDER BY `cd` DESC  ";
$uq2=mysqli_query($conn,$ult2);
 $ust2=1;
 $sumt2=0;
while($fu2=mysqli_fetch_array($uq2)){
$usrt2[$ust2]=$fu2['nombre'];
$mov2[$ust2]=$fu2['cd'];
$sumt2=$sumt2+intval($fu2['cd']);
$ust2++;
}

$lo5=sizeof($usrt2);
$lo6=sizeof($mov2);
if($lo5>0 || $lo6 >0){
$bnus=$usrt2[1];
$bnusm=$mov2[1];
$bdiv=round(($bnusm*100)/$sumt2);
}
$bnus1=0;
$bnusm1=0;
if($lo5>1 || $lo6 >1){
$bnus1=$usrt2[2];
$bnusm1=$mov2[2];
$bdiv1=round((intval(($bnusm1)*100))/$sumt2);
}
$bnus2=0;
$bnusm2=0;
if($lo5>2 || $lo6 >2){
$bnus2=$usrt2[3];
$bnusm2=$mov2[3];
$bdiv2=round((intval(($bnusm2)*100))/$sumt2);
}
$bnus3=0;
$bnusm3=0;
if($lo5>3 || $lo6 >3){
$bnus3=$usrt2[4];
$bnusm3=$mov2[4];
$bdiv3=round((intval(($bnusm3)*100))/$sumt2);
}
$bnus4=0;
$bnusm4=0;
if($lo5>4 || $lo6 >4){
$bnus4=$usrt2[5];
$bnusm4=$mov2[5];
$bdiv4=round((intval(($bnusm4)*100))/$sumt2);
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