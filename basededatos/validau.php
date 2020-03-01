<?php
session_start();

require ("connectionbd.php");
$tip='';
$doc=$_POST['doc'];
$con=$_POST['con'];
$query="select * from user where Id_u='$doc'
and Con_u='$con' " ;

$result=mysqli_query($conn,$query);

	while($fila=mysqli_fetch_array($result)){
				$tip = $fila['Tipo'];
				$i++; }
$a=mysqli_num_rows($result);
if($a>0){
	$_SESSION['user']=$doc;
	$_SESSION['tip']=$tip;
echo "welcome";
header('location:../backend/index.html');
}else{
header('location:../login/index.php');

}
?>
