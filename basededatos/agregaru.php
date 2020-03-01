<?php
require ("connectionbd.php");
$us=$_POST['nom'];
$ape=$_POST['ape'];
$doc=$_POST['doc'];
$con=$_POST['con'];
$tip=$_POST['tip'];


$query="Insert into user (Nom_u ,Ape_u,Id_u,Con_u,Tipo)values('$us','$ape','$doc','$con','$tip')";
$result=mysqli_query($conn,$query);
if(!$result){
echo "no se pudo";

}else{
header('location:../welcome.php');
	
}


?>