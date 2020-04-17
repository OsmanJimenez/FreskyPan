<?php
session_start();
require ("connectionbd.php");
$ced_cl= $_POST['ced'];	
$nom_cl= $_POST['nom'];	
$tel_cl= $_POST['tel'];	
$des_cl= $_POST['des'];	
$dir_cl= $_POST['dir'];	
$a1_cl= $_POST['a1'];	
$a2_cl= $_POST['a2'];	

$cl = array('nomcl' => $nom_cl , 'ape1' => $a1_cl ,'ape2' => $a2_cl,'cedcl' => $ced_cl,'descl' => $des_cl ,'dircl'=> $dir_cl );
$_SESSION['cl']=$cl;


$query="Insert into clientes (ced_cl,nom_cl,des_cl,dir_cl,a1_cl,a2_cl,est_cl,pas_cl)values('$ced_cl','$nom_cl','$des_cl','$dir_cl','$a1_cl','$a2_cl','1','pass')";
$result=mysqli_query($conn,$query);
$query2="Insert into telcl (ced_cl,tel_cl) values('$ced_cl','$tel_cl')";
$result2=mysqli_query($conn,$query2);
if(!$result || !$result2){
echo "no se pudo",mysqli_error($conn);

}else{
echo "registro insertado";
	header('location:../');
}


?>


