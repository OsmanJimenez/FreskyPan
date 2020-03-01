<?php
require ("connectionbd.php");
$cd=$_GET['idc'];
$query="Select * from productos where cod_pro='$cd'";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$est=$fila['est_pro'];
				$i++;	
             
             if($est==0){
              $query2="UPDATE productos set est_pro='1' where cod_pro='$cd' ";

             }elseif ($est==1) {
             	$query2="UPDATE productos set est_pro='0' where cod_pro='$cd' ";
             }
$result2=mysqli_query($conn,$query2);
if (!$result2) {
echo "no se pudo",mysqli_error($conn);

}else{
header('location:../backend/Productos_Ver.php');
    
}
}



				?>
