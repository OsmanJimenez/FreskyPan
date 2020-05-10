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

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Suministros</h6>
          </div>
          <div class="card-body">

            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/agregaim.php" method="POST" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Código</label>
                  <input type="number" name="cod" class="form-control" onkeypress="return validanumericos(event)" id="inputName" placeholder="" required>
                  <div class="space-small"></div>
                  <label for="inputName">Nombre</label>
                  <input type="text" name="nom" class="form-control" id="inputName" placeholder="" maxlength="10" required>
                  <div class="space-small"></div>
                  <label for="inputState">Cantidad</label>
                  <input type="number" name="can" class="form-control" onkeypress="return validanumericos(event)" id="inputrice" placeholder="" required>
                  <div class="space-small"></div>
                  <label for="inputPrice">Precio</label>
                  <input type="number" name="pre" class="form-control" onkeypress="return validanumericos(event)" id="inputrice" placeholder="" required>
                  <div class="space-small"></div>
                  <label for="inputState">Estado</label>
                  <select id="inputState" name="est" class="form-control">
                    <option selected value="1">Activo</option>
                    <option value="0">Suspendido</option>
                  </select>
                  <div class="space-small"></div>
                  <label for="inputState">Tipo</label>
                  <select id="inputState" name="tip" class="form-control">
                    <?php require("../basededatos/combotpins.php"); ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputCantidad">Materia Prima</label>
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="dataTable" width="100%" rows="3" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Precio</th>
                          <th>IVA</th>
                          <th>Cantidad</th>
                          <th>Tipo</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Precio</th>
                          <th>IVA</th>
                          <th>Cantidad</th>
                          <th>Tipo</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php require("../basededatos/listami_ped.php"); ?>
                      </tbody>
                    </table>
                  </div>
                  <label for="inputCantidad">Insumo</label>
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="dataTable" width="100%" rows="3" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Precio</th>
                          <th>IVA</th>
                          <th>Cantidad</th>
                          <th>Tipo</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Precio</th>
                          <th>IVA</th>
                          <th>Cantidad</th>
                          <th>Tipo</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php require("../basededatos/listami_ped.php"); ?>
                      </tbody>
                    </table>
                  </div>
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