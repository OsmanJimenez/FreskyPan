<?php  session_start();
if(isset($_sesion ['usuario'])){
	header('location: index.php'):

}

if($connetionbd['REQUEST_METHOD']) == 'POST'){
	$usuario= filter_var(strtolower($actualizar
	    ['usuario']),FILTER_SANITIZE_STRING);
	       $password = $actualizar['password'];
	       $password2 = $actualizar['password2'];


	$errores='';


	if (empty($usuario) or empty($password)or empty($password2)) {
     $errores = '<li>por favor rellene todos los datos correctamente </li>';
 }
 else{
 	try
 	$conn = new PDO ('mysql:localhost',
'root',
'',
'bakery');
 }
    catch (PDOException $e){
    	$statement = $conn => prepare ('SELECT * FROM usuario WHERE usuario = :usuario LIMIT 1');
    	$statemenT=>execute(array('usuario'=> $usuario));
    	$resultado = statement=> fetch();

    	if($resultado!= false){
    		$errores.=  '<li> El nombre de usuario ya existe</li>';
    	}

    	$password = hash('shas12' ,$password);
    	$password2 = hash('shas12' ,$password);

    	echo "$usuario.$password.$password2";


    }
 }

require 'view/registrata.view.php'


			

?>