<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Perfil</title>

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
        <h1 class="h3 mb-2 text-gray-800">Modificar Perfil</h1>
        <p class="mb-4">En este apartado podremos Modificar nuestro perfil</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Perfil</h6>
          </div>
          <div class="card-body">
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <?php require("../basededatos/connectionbd.php");
            $mic = $_GET['id'];
            $query = "Select * from usuario where ID_USUARIO='$mic'";
            $result = mysqli_query($conn, $query);
            $i = 0;

            $fila = mysqli_fetch_array($result);
            $codigo = $fila['ID_USUARIO'];
            $nombre = $fila['prNombre'];
            $apellido = $fila['prApellido'];
            $rol = $fila['rol'];
            $i++; ?>
            <form action="../basededatos/actuau.php" method="POST" enctype="multipart/form-data">
              <label for="inputName">Codigo del Empleado</label>
              <div class="form-row">

                <div class="form-group col-md-11">
                  <input type="number" name="cod" class="form-control" id="inputName" value="<?php echo $codigo; ?>"
                    maxlength="15" oninput="maxlengthNumber(this)" onkeypress="return Num_1(event)"
                    onpaste="return false" placeholder="" readonly="">
                </div>
                <div class="form-group col-md-1">

                </div>
              </div>

              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="inputName">Nombre del Empleado</label>
                  <input type="text" name="nom" value="<?php echo $nombre; ?>" class="form-control" id="inputName"
                    maxlength="15" onkeypress="return texto_1(event)" onpaste="return false" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPrice">Apellido del Empleado</label>
                  <input type="text" name="ape" class="form-control" value="<?php echo $apellido; ?>" id="inputrice"
                    maxlength="15" onkeypress="return texto_1(event)" onpaste="return false" placeholder="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputState">Rol</label>
                  <select value="<?php echo $rol; ?>" id="inputState" name="rol" class="form-control">
                    <option>Administrador</option>
                    <option>Empleado</option>
                  </select>
                </div>
              </div>

              <button type="button" class="btn btn-primary" data-toggle="modal"
                data-target="#myModal">Modificar</button>

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
