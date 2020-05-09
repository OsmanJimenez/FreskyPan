<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Calculo - ERP</title>

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



        <!-- DataTales Example -->


        <div class="form-row">

          <iframe width="100%" height="540" frameborder="0" src="https://docs.google.com/spreadsheets/u/0/create?usp=sheets_web"></iframe>
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
else if(!(isset($_SESSION['cl']))){
  ?>
<script>
alert('Primero inicie sesión');
  window.location.href='../login/index.php';
</script><?php
}
 ?>