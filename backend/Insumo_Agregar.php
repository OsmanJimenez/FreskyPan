<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Insumo</title>

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
        <?php require("../basededatos/connectionbd.php");
        $query_lastid = "SELECT MAX(ID_INSUMO) AS id FROM Insumo";
        $result_lastid = mysqli_query($conn, $query_lastid);
        $fila_lastid = mysqli_fetch_array($result_lastid);
        if(empty($fila_lastid)){$last=1;}else{$last=$fila_lastid['id']+1;}
        ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Agregar Insumos</h1>
        <p class="mb-4">En este apartado podremos agregar Insumos</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Insumos</h6>
          </div>
          <div class="card-body">
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/agregaim.php" method="POST" enctype="multipart/form-data">

              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="cod">Código</label>
                  <input type="number" name="cod" class="form-control" readonly="" id="cod" value="<?php echo $last ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputName">Nombre</label>
                  <input type="text" name="nom" class="form-control" id="nom" maxlength="20" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputState">Cantidad</label>
                  <input type="number" name="can" class="form-control" oninput="return maxlengthNumber(this)" maxlength="3" onkeypress="return validanumericos(event)" onpaste="return false" id="can" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="pre">Precio</label>
                  <input type="number" name="pre" class="form-control" oninput="return maxlengthNumber(this)" maxlength="9" onkeypress="return validanumericos(event)" id="pre" onpaste="return false" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="iva">Iva</label>
                  <input type="number" name="iva" oninput="return maxlengthNumber(this)" maxlength="2" class="form-control" onkeypress="return validanumericos(event)" id="iva" onpaste="return false" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Tipo</label>
                  <select id="inputState" name="tip" class="form-control">
                    <?php require("../basededatos/combotpins.php"); ?>
                  </select>
                </div>
              </div>

              <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputState">Estado</label>
                  <select id="inputState" name="est" class="form-control">
                    <option selected value="1">Activo</option>
                    <option value="0">Suspendido</option>
                  </select>
                </div>
                

                  <div class="form-group col-md-4">
                  <label for="prov">Proveedor</label>
                  <select id="prov" name="prov" class="form-control">
                    <option value="0">No seleccionado</option>
                    <?php require("../basededatos/combopro.php"); ?>
                  </select>
                </div>
                <div class="form-group col-md-2 text-center">
                  <div class="space-small"></div>
                  <a href="Clientes_Agregar.php" class="btn btn-outline-primary">Agregar Proveedor</a>
                </div>
              

              <div class="form-group col-md-12">
                  <div class="form-group">
                    <label for="des">Descripción</label>
                    <textarea class="form-control" name="des" id="des" rows="3" maxlength="50" required></textarea>
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
      <script>
        function maxlengthNumber(ob) {
          console.log(ob.value);

          if (ob.value.length > ob.maxLength) {

            ob.value = ob.value.slice(0, ob.maxLength);
          }
        }
      </script>

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