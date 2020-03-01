<?php
	session_start();
	require ("basededatos/connectionbd.php");
	if(isset($_SESSION['carrito'])){
		if(isset($_GET['id'])){
					$arreglo=$_SESSION['carrito'];
					$encontro=false;
					$numero=0;
					for($i=0;$i<count($arreglo);$i++){
						if($arreglo[$i]['Id']==$_GET['id']){
							$encontro=true;
							$numero=$i;
						}
					}
					if($encontro==true){
						$arreglo[$numero]['Cantidad']=$arreglo[$numero]['Cantidad']+1;
						$_SESSION['carrito']=$arreglo;
					}else{
						$nombre="";
						$precio=0;
						$imagen="";
						$re=mysqli_query($conn,"select * from productos where cod_pro=".$_GET['id']);
						while ($f=mysqli_fetch_array($re)) {
							$nombre=$f['nom_pro'];
							$precio=$f['pre_pro'];
							$imagen=$f['img_pro'];
						}
						$datosNuevos=array('Id'=>$_GET['id'],
										'Nombre'=>$nombre,
										'Precio'=>$precio,
										'Imagen'=>$imagen,
										'Cantidad'=>1);

						array_push($arreglo, $datosNuevos);
						$_SESSION['carrito']=$arreglo;

					}
		}




	}else{
		if(isset($_GET['id'])){
			$nombre="";
			$precio=0;
			$imagen="";
			$re=mysqli_query($conn,"select * from productos where cod_pro=".$_GET['id']);
			while ($f=mysqli_fetch_array($re)) {
				$nombre=$f['nom_pro'];
				$precio=$f['pre_pro'];
				$imagen=$f['img_pro'];
			}
			$arreglo[]=array('Id'=>$_GET['id'],
							'Nombre'=>$nombre,
							'Precio'=>$precio,
							'Imagen'=>$imagen,
							'Cantidad'=>1);
			$_SESSION['carrito']=$arreglo;
		}
	}
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8"/>
	<title>Carrito de Compras</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
	<script type="text/javascript"  src="js/scripts.js"></script>
	<link rel="stylesheet" href="login/vendor/bootstrap/css/bootstrap.min.css"crossorigin="anonymous">
    <!--FontAwesome-->
    <script src="js/629388bad9.js"></script>
	
	 <!-- Custom favicon for this template-->
	 <link rel="icon" type="image/png" href="favicon.png" />
	<?php require("paraprueba.php");?>

	<!--Fonts-->
    <link href="css/font.css" rel="stylesheet">
    <title>Freskypan - Panaderia en Fusagasuga</title>
</head>
<body>
	        <!--Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
        <img src="favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
        
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" 
              data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
              aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="index.php">Inicio </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="historia.html">Historia <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contacto.html">Contactanos</a>
          </li>
          
        </ul>
        <div class="btn-group mr-2" role="group" aria-label="Second group">
        
        </div>
        <form class="form-inline my-2 my-lg-0">   
            
       
          <a href="login/" class="btn btn-danger my-2 my-sm-0">Cerrar sesión</a>
    
        </form>
      </div>
    </nav>

	<section>
		<?php
			$total=0;
			if(isset($_SESSION['carrito'])){
			$datos=$_SESSION['carrito'];
			
			$total=0;
			for($i=0;$i<count($datos);$i++){
				
	?>
				<div class="producto">
					<center>
						<img src="./basededatos/<?php echo $datos[$i]['Imagen'];?>"><br>
						<span ><?php echo $datos[$i]['Nombre'];?></span><br>
						<span>Precio: <?php echo $datos[$i]['Precio'];?></span><br>
						<span>Cantidad: 
							<input type="number" value="<?php echo $datos[$i]['Cantidad'];?>"
							data-precio="<?php echo $datos[$i]['Precio'];?>"
							data-id="<?php echo $datos[$i]['Id'];?>"
							class="cantidad">
						</span><br>
						<span class="subtotal">Subtotal:<?php echo $datos[$i]['Cantidad']*$datos[$i]['Precio'];?></span><br>
						<a href="#" class="eliminar" data-id="<?php echo $datos[$i]['Id']?>">Eliminar</a>
					</center>
				</div>
			<?php
				$total=($datos[$i]['Cantidad']*$datos[$i]['Precio'])+$total;
			}
				
			}else{
				echo '<center><h2>No has añadido ningun producto</h2></center>';
			}
			echo '<center><h2 id="total">Total: '.$total.'</h2></center>';
			if($total!=0){
					echo '<center><a href="./compras/compras.php" class="aceptar">Comprar</a></center>;';
			}
			
		?>
		<center><a href="./">Ver catalogo</a></center>
		
		
		

		
	</section>
</body>
</html>