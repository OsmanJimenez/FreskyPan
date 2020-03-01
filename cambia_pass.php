<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS-->
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="login/vendor/bootstrap/css/bootstrap.min.css" crossorigin="anonymous">
    <!--FontAwesome-->
    <script src="js/629388bad9.js"></script>
    <!--Fonts-->
    <link href="css/font.css" rel="stylesheet">
    <title>Freskypan - Panaderia en Fusagasuga</title>
</head>

<body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../FreskyPan">
    <img src="favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
    
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
          aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="historia.html">Historia</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contacto.html">Contactanos</a>
      </li>
      
    </ul>
    
    <form class="form-inline my-2 my-lg-0">   
        
   
      <a href="login/" class="btn btn-success my-2 my-sm-0">Iniciar sesión</a>

    </form>
  </div>
</nav>

    <!--Header-->
       <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Buscar cliente</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
          </div>
          <div class="card-body">
            <!-- Add Example -->
            <form action="basededatos/actuac2.php"  method="POST">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputCantidad">Digite una nueva contraseña</label>
                  <input type="text" name="pas" class="form-control" id="inputCantidad" placeholder="" required="">
                </div>
                <div class="form-row">
                <div class="form-group col-md-10">
                  <?php if((isset($_GET['id']))){ ?>
                  <input type="hidden" value="<?php echo $_GET['id'];?>"  class="form-control" id="inputName" name="ced" placeholder="">
                <?php }?>
                </div> 
              </div>

              </div>


              



              <button type="submit" class="btn btn-primary" >Validar</button>
            </form>

            <!--End  Add Example -->
          </div>
        </div>

      </div>

    <!--Footer-->
    <footer class="contenedor">
        <div class="redes-sociales">
            <div class="contenedor-icono">
                <a href="#" target="_blank" class="twitter">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
            <div class="contenedor-icono">
                <a href="#" target="_blank" class="facebook">
                    <i class="fab fa-facebook"></i>
                </a>
            </div>
            <div class="contenedor-icono">
                <a href="#" target="_blank" class="instagram">
                    <i class="fab fa-instagram"></i>
                </a>
            </div>
        </div>
        <div class="creado-por">
            
        </div>
    </footer>

    <!--JavaScript-->
    <!--Muuri-->
    <script src="js/web-animations.min.js"></script>
    <script src="js/muuri.min.js"></script>
    <!--JQuery-->
    <script src="js/jquery-3.3.1.slim.min.js" crossorigin="anonymous">
        </script>
    <script src="js/popper.min.js" crossorigin="anonymous">
        </script>
    <script src="js/bootstrap.min.js"crossorigin="anonymous">
        </script>

    <script src="js/main.js"></script>

</body>

</html>