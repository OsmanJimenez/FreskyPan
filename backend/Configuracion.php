<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Configuración</title>

  <?php
  require('Style.php');
  ?>
</head>

<body>
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
    require('menu.php');
    ?>

    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php
        require('Navigation.php');
        ?>
        <!-- End of -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Configuración</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Base de Datos</h6>
            </div>

            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-6">           
                  <a type="button" class="btn btn-primary" href="Backup.php" target="_blank">Generar Copia de Seguridad</a>                
                </div>
                <div class="form-group col-md-6">
                  <a type="button" class="btn btn-primary" href="Restore.php" target="_blank">Restaurar Copia de Seguridad</a>                
                </div>

              </div>
            </div>

          </div>  

          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Temas</h6>
            </div>

            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-4">           
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/Theme_Blue.png" alt="Card image cap">
                    <div class="card-body">
                      <a id="theme-toggle1" class="btn btn-primary btn-block text-white">Azul</a> 
                    </div>
                  </div>                         
                </div>

                <div class="form-group col-md-4">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/Theme_Red.png" alt="Card image cap">
                    <div class="card-body">
                      <a id="theme-toggle3" class="btn btn-danger btn-block text-white" >Rojo</a> 
                    </div>
                  </div>            
                </div>

                <div class="form-group col-md-4">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/Theme_Cyan.png" alt="Card image cap">
                    <div class="card-body">
                      <a id="theme-toggle5" class="btn btn-info btn-block text-white" >Cyan</a> 
                    </div>
                  </div>             
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">           
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/Theme_Green.png" alt="Card image cap">
                    <div class="card-body">
                      <a id="theme-toggle2" class="btn btn-success btn-block text-white" >Verde</a> 
                    </div>
                  </div>             
                </div>

                <div class="form-group col-md-4">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/Theme_Yellow.png" alt="Card image cap">
                    <div class="card-body">
                      <a id="theme-toggle4" class="btn btn-warning btn-block text-white" >Amarillo</a> 
                    </div>
                  </div>             
                </div>             
                <div class="form-group col-md-4">
                  <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/Theme_Cyan.png" alt="Card image cap">
                    <div class="card-body">
                      <a id="theme-toggle6" class="btn btn-dark btn-block text-white" >Negro</a> 
                    </div>
                  </div>                           
                </div>
              </div>
            </div>
          </div> 
        </div>
          
          
      </div>
    </div> 
  </div> 
      <!-- Validation -->
      <?php
        require('Validation.php');
        ?>
        <!-- End Validation --> 

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
</body>

</html>

<?php }
require('llenar3.php');
 ?>
