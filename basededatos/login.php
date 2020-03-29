<?php
session_start();
require ("connectionbd.php");
$id_user=$_POST['ced'];
$pas_user=$_POST['pas'];
$query="select * from usuario where ID_USUARIO='$id_user' and contrasena='$pas_user'" ;

$result=mysqli_query($conn,$query);
			$a=mysqli_num_rows($result);
if($a>0){
			while($fila=mysqli_fetch_array($result)){			
				$id_u = $fila['ID_USUARIO'];

					
 

$usr = array('id_u' => $id_u );

$_SESSION['cl']=$usr;
header('location:../backend/');
}
} if($a=='0'){
	?>
<script>
alert('Datos no validos');
	window.location.href='../login/index.php';
</script><?php
}

if(!$result){
echo "no se pudo",mysqli_error($conn);

}

?>