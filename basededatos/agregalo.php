<?php
require ("connectionbd.php");
$cod_pro= $_POST['id'];	
$canini= $_POST['ci'];	
$uni=$_POST['uni'];
$fec=$_POST['fecha'];	


$query3="Insert into calendario (nombre,hora,detalles)values                    
                                ('prueba2','20:00','aca probando')";
                                $result2=mysqli_query($conn,$query3);
$rs = mysqli_query($conn,"SELECT MAX(ID_CALENDARIO) from calendario");

if ($row = mysqli_fetch_row($rs)) {
$id = trim($row[0]);
echo $id;
}

$query1="Insert into produccion (FK_ID_CALENDARIO,fechaProduccion,unidades,cantidadInicial,FK_ID_CATPRODUCTO)values                     ('$id',            '$fec',         '$uni',   '$canini'         ,'$cod_pro')";
$result1=mysqli_query($conn,$query1);
if(!$result1){
echo "no se pudo",mysqli_error($conn);

}else{
$query="UPDATE catproducto SET stock=stock+'$canini' where ID_CATPRODUCTO='$cod_pro'";
$result=mysqli_query($conn,$query);	
echo "registro insertado";
header('location:../backend/lotes_ver.php');
}

?>