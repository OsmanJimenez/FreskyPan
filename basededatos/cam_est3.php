<?php
require ("connectionbd.php");
$cd=$_GET['idc'];
$query="Select * from pedidos where Id_ped='$cd'";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$est=$fila['est_ped'];
				$i++;	
             
             if($est==0){
              $query2="UPDATE pedidos set est_ped='1' where Id_ped='$cd' ";

             }elseif ($est==1) {
             	$query2="UPDATE pedidos set est_ped='0' where Id_ped='$cd' ";
             }
$result2=mysqli_query($conn,$query2);
if (!$result2) {
echo "no se pudo",mysqli_error($conn);

}else{
header('location:../backend/Pedidos_Ver.php');
    
}
}



				?>