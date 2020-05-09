<?php session_start();
$id=$_SESSION['cl']['id_u'];
$no=$_SESSION['cl']['nom'];
$ape=$_SESSION['cl']['ape'];
 ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Perfil</title>
   
  <!-- Font-->
  <link rel="stylesheet" type="text/css" href="css/roboto-font.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
  <!-- Main Style Css -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/style2.css" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Custom favicon for this template-->
  <link rel="icon" type="image/png" href="../favicon.png" />

  <title>Perfil - Freskypan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom calendar -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
                    <label for="inputName">Numero de Cedula</label>
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