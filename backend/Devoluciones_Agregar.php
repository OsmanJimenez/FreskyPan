<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Devoluciones</title>

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
        <?php require("../basededatos/connectionbd.php");
        $query = "SELECT MAX(ID_DEVOLUCION) AS id FROM Devolucion";
        $result = mysqli_query($conn, $query);
        $fila = mysqli_fetch_array($result);
        if(!empty($fila)){$last=1;}else{$last=$fila['id'];}
        ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Agregar Devoluciones</h1>
        <p class="mb-4">En este apartado podremos agregar distintos devoluciones que se generen.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Devoluciones</h6>
          </div>
          <div class="card-body">
            <!-- Add Example -->
            <form action="../basededatos/agregad.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-8">
                  <label for="cod">Código de Devolución</label>
                  <input type="text" name="cod" class="form-control" id="cod" onkeypress="return cod_devo(event)" placeholder="" readonly="">
                </div>
                <div class="form-group col-md-4">
                  <label for="fec">Fecha</label>
                  <input type="date" id="fec" class="form-control" name="fec" width="100%" required="">
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-8">
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="ped_Table" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Código de pedido</th>
                          <th>Fecha</th>
                          <th>Plazo</th>
                          <th>Exigencias</th>
                          <th>Proveedor</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Código de pedido</th>
                          <th>Fecha</th>
                          <th>Plazo</th>
                          <th>Exigencias</th>
                          <th>Proveedor</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php require("../basededatos/listaped_dev.php"); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-8">
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="matin_Table" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Codigo de pedido</th>
                          <th>Fecha</th>
                          <th>Cedula del cliente</th>
                          <th>Codigo del producto</th>
                          <th>Cantidad</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Codigo de pedido</th>
                          <th>Fecha</th>
                          <th>Cedula del cliente</th>
                          <th>Codigo del producto</th>
                          <th>Cantidad</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php //require("../basededatos/listap3.php"); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="des">Descripción de la devolución</label>
                  <textarea class="form-control" name="des" id="des" maxlength="30" required="" rows="3"></textarea>

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
                  </div>
                  </div>
                </div>
            </form>

            <!--End  Add Example -->
          </div>


        </div>
        <!-- /.container-fluid -->
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
        <script src="js/jquery.min.js"></script>
        <script>
          function cambia(text) {
            //  var text = document.getElementById('sd').value;
            document.getElementById('inputrice').value = text;
          }
        </script>
        <script>
          function maxlengthNumber(ob) {
            console.log(ob.value);

            if (ob.value.length > ob.maxLength) {

              ob.value = ob.value.slice(0, ob.maxLength);
            }
          }
        </script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>
<script src="js/script.js"></script>

</body>

</html>

<?php }
require('llenar3.php');
 ?>
