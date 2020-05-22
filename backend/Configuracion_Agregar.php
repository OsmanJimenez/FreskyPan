<?php
session_start();
 if((isset($_SESSION['cl']))){ 
require ("../basededatos/connectionbd.php");
$codg="Select MAX(ID_USUARIO) as idc from USUARIO";
$res=mysqli_query($conn,$codg);
$file=mysqli_fetch_array($res);
if((mysqli_num_fields($res))>0){
$codg2=(intval($file['idc']))+1;
}else if((mysqli_num_fields($res))==0){
$codg2=1;
}

  ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Empleados</title>

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
        <h1 class="h3 mb-2 text-gray-800">Agregar Empleados</h1>
        <p class="mb-4">En este apartado podremos agregar distintos empleados</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Empleados</h6>
          </div>
          <div class="card-body">
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/agregarus.php" method="POST" enctype="multipart/form-data">
              <label for="inputName">Codigo del Empleado</label>
              <input type="number" name="cod" class="form-control" id="inputName" maxlength="11" oninput="maxlengthNumber(this)" value="<?php echo $codg2;?>" readonly="" onkeypress="return Num_1(event)" onpaste="return false" placeholder="">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Nombre del Empleado</label>
                  <input type="text" name="nom" class="form-control" id="inputName" maxlength="15" onkeypress="return texto_1(event)" onpaste="return false" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPrice">Apellido del Empleado</label>
                  <input type="text" name="ape" class="form-control" id="inputrice" maxlength="15" onkeypress="return texto_1(event)" onpaste="return false" placeholder="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputState">Contraseña</label>
                  <input type="password" name="pas" maxlength="12" class="form-control" id="inputrice" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Rol</label>
                  <select id="inputState" name="rol" class="form-control">
                    <option>Administrador</option>
                    <option selected>Empleado</option>
                  </select>
                </div>
              </div>
              <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Añadir</button>
              <!-- Modal -->
              <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">¡Alerta!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ¿Estas seguro de agregar este ítem?
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                      <button type="submit" class="btn btn-primary">Agregar</button>
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
require('llenar3.php');
 ?>
