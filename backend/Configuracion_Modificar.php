<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Perfil</title>
   
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

  <title>Perfil - ERP</title>

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
        <h1 class="h3 mb-2 text-gray-800">Modificar Perfil</h1>
        <p class="mb-4">En este apartado podremos Modificar nuestro perfil</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Perfil</h6>
          </div>
          <div class="card-body">
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/actuau.php" method="POST" enctype="multipart/form-data">
            <label for="inputName">Codigo del Empleado</label>
            <div class="form-row">
            
              <div class="form-group col-md-11">
                
                <input type="number" name="cod" class="form-control" id="inputName" placeholder="">
              </div>
              <div class="form-group col-md-1">
              <button type="button" class="btn btn-primary" id="btnmd" data-toggle="modal">Buscar</button>
              </div>
            </div>



              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="inputName">Nombre del Empleado</label>
                  <input type="text" name="nom" class="form-control" id="inputName" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPrice">Apellido del Empleado</label>
                  <input type="text" name="pre" class="form-control" id="inputrice" placeholder="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputState">Contraseña</label>
                   <input type="password" name="pre" class="form-control" id="inputrice" placeholder="Duración en Dias">
                </div>


                <div class="form-group col-md-6">
                  <label for="inputState">Rol</label>
                  <select id="inputState" name="sab" class="form-control">
                    <option>Administrador</option>
                    <option selected>Empleado</option>
                  </select>
                </div>
              </div>
              
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Modificar</button>

              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Confirmar</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      
                    </div>
                    <div class="modal-body">
                      <p>Esta seguro?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Si</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                  </div>

                </div>
              </div>
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