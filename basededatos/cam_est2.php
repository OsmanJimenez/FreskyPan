<?php
require ("connectionbd.php");
$cd=$_GET['idc'];
$query="Select * from clientes where ced_cl='$cd'";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$est=$fila['est_cl'];
				$i++;	
             
             if($est==0){
              $query2="UPDATE clientes set est_cl='1' where ced_cl='$cd' ";

             }elseif ($est==1) {
             	$query2="UPDATE clientes set est_cl='0' where ced_cl='$cd' ";
             }
$result2=mysqli_query($conn,$query2);
if (!$result2) {
echo "no se pudo",mysqli_error($conn);

}else{
header('location:../backend/Clientes_Ver.php');
    
}
}



				?>
