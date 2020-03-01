<?php
session_start();
require ("connectionbd.php");
$ced_cl=$_POST['ced'];
$pas_cl=$_POST['pas'];
$query="select * from clientes where ced_cl='$ced_cl' and pas_cl='$pas_cl'" ;

$result=mysqli_query($conn,$query);
			$a=mysqli_num_rows($result);
if($a>0){
			while($fila=mysqli_fetch_array($result)){			
				$nom_cl = $fila['nom_cl'];
				$a1_cl = $fila['a1_cl']; 
				$a2_cl = $fila['a2_cl'];
				$ced_cl = $fila['ced_cl'];
				$dir_cl = $fila['dir_cl'];
				$des_cl = $fila['des_cl'];
				$est=$fila['est_cl'];
					


$cl = array('nomcl' => $nom_cl , 'ape1' => $a1_cl ,'ape2' => $a2_cl,'cedcl' => $ced_cl,'descl' => $des_cl ,'dircl'=> $dir_cl );

$_SESSION['cl']=$cl;
header('location:../');
}
} if($a=='0'){
	?>
<script>
alert('El Registro no existe');
	window.location.href='../login/index.php';
</script><?php
}

if(!$result){
echo "no se pudo",mysqli_error($conn);

}

?>