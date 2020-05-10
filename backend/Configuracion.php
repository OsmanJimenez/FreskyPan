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
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/agregarus.php" method="POST" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-6">           
                  <a type="button" class="btn btn-primary" href="Backup.php" target="_blank">Generar Copia de Seguridad</a>                </div>
                <div class="form-group col-md-6">
                <a type="button" class="btn btn-primary" href="Restore.php" target="_blank">Restaurar Copia de Seguridad</a>                </div>
                </div>
              </div>
              
              
              
                
            </form>

            <!--End  Add Example -->
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
else if(!(isset($_SESSION['cl']))){
  ?>
<script>
alert('Primero inicie sesión');
  window.location.href='../login/index.php';
</script><?php
}
 ?>
