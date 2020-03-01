<?php
require ("connectionbd.php");
$cd=$_GET['id3'];
$query="Select * from devolucion where cod_dev='$cd'";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$est=$fila['est_dev'];
				$i++;	
             
             if($est==0){
              $query2="UPDATE devolucion set est_dev='1' where cod_dev='$cd' ";

             }elseif ($est==1) {
             	$query2="UPDATE devolucion set est_dev='0' where cod_dev='$cd' ";
             }
$result2=mysqli_query($conn,$query2);
if (!$result2) {
echo "no se pudo",mysqli_error($conn);

}else{
header('location:../backend/Devoluciones_Ver.php');
    
}
}



				?>