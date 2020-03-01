<?php
require ("connectionbd.php");
$cd=$_GET['idc'];
$fe=$_GET['fec'];
var_dump($cd);
var_dump($fe);
$query="Select * from lote where id_lot='$cd' and fec='$fe'";
$result=mysqli_query($conn,$query);
if (!$result) {
echo "no se pudo",mysqli_error($conn);

}
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$est=$fila['est_lot'];
				$i++;	
             
             if($est==0){
              $query2="UPDATE lote set est_lot='1' where id_lot='$cd' and fec='$fe' ";

             }elseif ($est==1) {
             	$query2="UPDATE lote set est_lot='0' where id_lot='$cd' and fec='$fe' ";
             }
$result2=mysqli_query($conn,$query2);
if (!$result2) {
echo "no se pudo",mysqli_error($conn);

}else{
header('location:../backend/lotes_ver.php');
    
}
}



				?>