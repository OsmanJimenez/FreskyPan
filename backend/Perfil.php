<?php session_start();
if((isset($_SESSION['cl']))){
$id = $_SESSION['cl']['id_u'];
$no = $_SESSION['cl']['nom'];
$ape = $_SESSION['cl']['ape'];
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Perfil</title>

  <?php
  require('Style.php');
  ?>

</head>


<body id="page-top">
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



          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Perfil</h6>
            </div>
            <div class="card-body">
              <!-- Add Example -->
              <form action="../basededatos/agregarc.php" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-8">
                    <label for="inputName">Número de Cedula</label>
                    <input type="text" readonly="" value="<?php echo $id; ?>" class="form-control" id="inputName" name="ced" placeholder="">

                    <label for="inputPrice">Nombre</label>
                    <input type="text" name="tel" readonly="" value="<?php echo $no; ?>" class="form-control" id="inputrice" placeholder="">

                    <label for="inputPrice">Apellido</label>
                    <input type="text" name="tel" value="<?php echo $ape; ?>" readonly="" class="form-control" id="inputrice" placeholder="">
                  </div>
                  <div class="form-group col-md-4">
                    <img src="../img/panadero.jpg" width="200" height="200" class="rounded-circle mx-auto d-block" alt="imagen del usuario">
                  </div>
                </div>







                <button type="submit" class="btn btn-primary">Agregar</button>
              </form>

              <!--End  Add Example -->
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
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