<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Suministro</title>

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
        <h1 class="h3 mb-2 text-gray-800">Agregar Suministro</h1>
        <p class="mb-4">En este apartado podremos agregar Suministros</a>.</p>

          <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agregar materia prima</h6>
          </div>
          <div class="card-body">
          
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/agregasum_mat.php" name="formmat" id="formmat" method="POST" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <div class="form-group">
                    <label for="can_mat">Cantidad</label>
                    <input type="number" id="can_mat" class="form-control" name="can_mat" width="100%" required="">
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <div class="form-group">
                    <label for="fec_mat">Fecha de registro</label>
                    <input type="date" id="fec_mat" class="form-control" name="fec_mat" width="100%" required="">
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <div class="form-group">
                    <label for="fecv_mat">Fecha de vencimiento</label>
                    <input type="date" id="fecv_mat" class="form-control" name="fecv_mat" width="100%" required="">
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Materia Prima</label>
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="mat_Table" width="100%" rows="3" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Descripción</th>
                          <th>Unidades</th>
                          <th>Precio</th>
                          <th>IVA</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Descripción</th>
                          <th>Unidades</th>
                          <th>Precio</th>
                          <th>IVA</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php require("../basededatos/listasum_mat.php"); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label>Bodegas</label>
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="matbodTabla" width="100%" rows="3" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Código</th>
                          <th>Descripción</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Código</th>
                          <th>Descripción</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php require("../basededatos/listasum_bod.php"); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary float-right">Agregar</button>
            </form>
          </div>
        </div>

        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Agregar insumos</h6>
          </div>
          <div class="card-body">
          
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/agregasum_ins.php" method="POST" enctype="multipart/form-data" name="formins" id="formins">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label for="can_ins">Cantidad</label>
                    <input type="number" id="can_ins" class="form-control" name="can_ins" width="100%" required="">
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label for="fec_ins">Fecha de registro</label>
                    <input type="date" id="fec_ins" class="form-control" name="fec_ins" width="100%" required="">
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Insumos</label>
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="dataTable" width="100%" rows="3" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Descripción</th>
                          <th>Unidades</th>
                          <th>Precio</th>
                          <th>IVA</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Descripción</th>
                          <th>Unidades</th>
                          <th>Precio</th>
                          <th>IVA</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php require("../basededatos/listasum_ins.php"); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label>Bodegas</label>
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="insbodTabla" width="100%" rows="3" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Código</th>
                          <th>Descripción</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Código</th>
                          <th>Descripción</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php require("../basededatos/listasum_bod.php"); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary float-right">Agregar</button>
            </form>
          </div>
        </div>

          </div>
        </div>
        <?php
          require('footer.php');
        ?>
        </div>

      </div>
      <!-- Validation -->
      <?php
       require('Validation.php');
       ?>
       <!-- End Validation -->
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

</html>
<?php }
require('llenar3.php');
 ?>

