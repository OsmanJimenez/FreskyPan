<?php
session_start();
require ("connectionbd.php");
$ced_cl=$_POST['ced'];
$nom_cl=$_POST['nom'];
$a1_cl=$_POST['a1'];
$a2_cl=$_POST['a2'];
$query="select * from clientes where ced_cl='$ced_cl' and nom_cl='$nom_cl' and a1_cl='$a1_cl' and a2_cl='$a2_cl'" ;

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
					

?>
<script>
alert('Cambie su contraseña');
window.location.href='../cambia_pass.php?id=<?php echo $ced_cl;?>';
</script><?php
}
}
 if($a=='0'){
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