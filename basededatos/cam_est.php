<?php
require ("connectionbd.php");
$cd=$_GET['idc'];
$query="Select * from catproducto where ID_CATPRODUCTO='$cd'";
$result=mysqli_query($conn,$query);
$i = 0;
			
			while($fila=mysqli_fetch_array($result)){			
				$est=$fila['estado'];
				$i++;	
         

  
             if($est==0){
              $query2="UPDATE catproducto set estado='1' where ID_CATPRODUCTO='$cd' ";
              $razon="Cambio de estado (Activo) catproducto (".$cd.").";
             }elseif ($est==1) {
             	$query2="UPDATE catproducto set estado='0' where ID_CATPRODUCTO='$cd' ";
             	$razon="Cambio de estado (Inactivo) catproducto (".$cd.").";
             }
$result2=mysqli_query($conn,$query2);
if (!$result2) {
echo "no se pudo",mysqli_error($conn);

}else{
require ("reg_log.php");  
header('location:../backend/Productos_Ver.php');
    
}
}



				?>
