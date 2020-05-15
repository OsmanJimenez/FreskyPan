<?php
session_start();
?>
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

    <!-- Custom favicon for this template-->
    <link rel="icon" type="image/png" href="favicon.png" />

    <!--Fonts-->
    <link href="css/font.css" rel="stylesheet">
    <title>FreskyPan - Panaderia en Fusagasuga</title>
</head>

<body>
    <!--Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="favicon.png" width="30" height="30" class="d-inline-block align-top" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="historia.html">Historia</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <?php if (!(isset($_SESSION['cl']))) { ?>
                    <a href="login/" class="btn btn-success my-2 my-sm-0">Iniciar sesión</a>
                <?php } ?>
                <?php if (isset($_SESSION['cl'])) { ?>
                    <a href="salir.php" class="btn btn-success my-2 my-sm-0">Salir</a>
                <?php } ?>
            </form>
        </div>
    </nav>

    <!--Header-->
    <div class="contenedor">
        <header>
            <div class="logo">
                <h1>FreskyPan</h1>
                <p>Una panaderia en Fusagasuga</p>
            </div>
            <form action="">
                <input type="text" class="barra-busqueda" id="barra-busqueda" placeholder="¿Que se te antoja hoy?">
            </form>
            <div class="categorias" id="categorias">
                <a href="#" class="activo">Todos</a>
                <a href="#">Dulce</a>
                <a href="#">Salado</a>
                <a href="#">Postres</a>
                <a href="#">Tortas</a>
            </div>
        </header>

        <!--Grip Productos-->
        <section class="grid" id="grid">
            <?php
            require("basededatos/connectionbd.php");
            $query = "Select catproducto.stock,catproducto.nombre,catproducto.imagen,catproducto.sabor,catproducto.ID_CATPRODUCTO,catproducto.descripcion,catproducto.precio from catproducto";
            $result = mysqli_query($conn, $query);
            $i = 0;

            while ($fila = mysqli_fetch_array($result)) {
                $Nom = $fila['nombre'];
                $cod = $fila['precio'];
                $sab = $fila['sabor'];
                $des = $fila['descripcion'];

                $stock = ['stock'];
                $id = $fila['ID_CATPRODUCTO'];
                $img = $fila['imagen'];
                $i++;
                if ($stock > 0) {
            ?>

                    <div class="item" data-categoria="<?php echo $sab; ?>" data-etiquetas="<?php echo $sab; ?> <?php echo $Nom; ?>" data-descripcion="<?php echo $des; ?>">
                        <div class="item-contenido">
                            <img src="basededatos/<?php echo $img; ?>" alt="">
                        </div>
                        <div class="small"></div>
                        <div class="input-group flex-nowrap">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="addon-wrapping"><?php echo $Nom; ?></span>
                            </div>
                            <?php if (isset($_SESSION['cl'])) { ?>
                                <!--  <input type="number" class="form-control" placeholder="Cantidad" aria-label="Cantidad"
                        aria-describedby="addon-wrapping"> -->
                            <?php } ?>
                        </div>
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping"> Precio :$ <?php echo $cod; ?></span>
                        </div>
                    </div>
            <?php  }
            } ?>
        </section>
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
            <p>Sitio diseñado por <a href="#">Deportivo Tapitas</a> - <a href="#">Universidad de Cundinamarca</a></p>
        </div>
    </footer>

    <!--JavaScript-->
    
    <!--Muuri-->
    <script src="js/web-animations.min.js"></script>
    <script src="js/muuri.min.js"></script>

    <!--JQuery-->
    <script src="js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="js/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="js/main.js"></script>
</body>

</html>