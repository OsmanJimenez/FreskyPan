<?php
require ("connectionbd.php");
$cd=$_GET['id3'];
$query="Select * from contratos where cod_con='$cd'";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$est=$fila['est_con'];
				$i++;	
             
             if($est==0){
              $query2="UPDATE contratos set est_con='1' where cod_con='$cd' ";

             }elseif ($est==1) {
             	$query2="UPDATE contratos set est_con='0' where cod_con='$cd' ";
             }
$result2=mysqli_query($conn,$query2);
if (!$result2) {
echo "no se pudo",mysqli_error($conn);

}else{
header('location:../backend/Contratos_Ver.php');
    
}
}



				?>