<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Devoluciones</title>

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
        $id = $_GET['id'];
        $query = "SELECT * FROM Devolucion WHERE ID_DEVOLUCION='$id'";
        $result = mysqli_query($conn, $query);

        $fila = mysqli_fetch_array($result);
        $cod = $fila['ID_DEVOLUCION'];
        $des = $fila['descripcion'];
        $fec = $fila['fecha'];
        $est = $fila['estado'];
        $idped = $fila['FK_ID_PEDIDO'];
        ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Modificar devolución</h1>
        <p class="mb-4">En este apartado podremos modificar las devoluciones registradas en el sistema.</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Devolución</h6>
          </div>
          <div class="card-body">
            <!-- Add Example -->

            <form action="../basededatos/actuadev.php" method="POST">

              <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Código de devolución</label>
                    <input type="text" name="cod" value="<?php echo $cod; ?>" class="form-control" id="inputName" placeholder="" readonly="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputName">Fecha</label>
                  <input type="date" value="<?php echo $fec; ?>" id="inputName" class="form-control" name="fec" width="100%" required="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPrice">Código del pedido</label>
                  <input type="number" value="<?php echo $idped; ?>" name="cod" readonly="" class="form-control" id="inputrice" placeholder="">
                  <div class="space-small"></div>
                  <label for="inputCantidad">Estado</label>
                  <select id="inputState" name="est" class="form-control" disabled>
                    <?php if ($est == "0") { ?>
                      <option value="1">Activo</option>
                      <option selected value="0">Suspendido</option>
                    <?php } else { ?>
                      <option selected value="1">Activo</option>
                      <option value="0">Suspendido</option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="txtarea">Descripción de la devolución</label>
                  <textarea class="form-control" name="des" id="txtarea" maxlength="30" style="height: 128px;"><?php echo $des; ?></textarea>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-4">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Añadir</button>
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
                          <p>¿Está seguro?</p>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Si</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                      </div>

                  </div>
                </div>
              </div>
            </div>
            </form>

            <!--End  Add Example -->
          </div>
        <script>
          function maxlengthNumber(ob) {
            console.log(ob.value);

            if (ob.value.length > ob.maxLength) {

              ob.value = ob.value.slice(0, ob.maxLength);
            }
          }
        </script>
       <!-- Validation -->
      <?php
      require('Validation.php');
      ?>
      <!-- End Validation --> 




        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
          function cambia(text) {
            //  var text = document.getElementById('sd').value;
            document.getElementById('inputrice').value = text;
          }
        </script>
        <script>
          $(document).ready(function() {
            $(".pr").click(function() {
              var flag = 1;
              var valores = "";

              // Obtenemos todos los valores contenidos en los <td> de la fila
              // seleccionada
              $(this).parents("tr").find("td").each(function() {

                valores = $(this).html();
                if (flag == 2) {
                  document.getElementById('inputrice').value = valores;
                }
                if (flag == 3) {
                  document.getElementById('inputCantidad2').value = valores;
                }
                if (flag == 4) {
                  document.getElementById('inputCantidad1').value = valores;
                }
                if (flag == 5) {
                  document.getElementById('inputCantidad3').value = valores;
                }
                if (flag == 6) {
                  document.getElementById('inputCantidad4').value = valores;
                }
                flag += 1;
                console.log(valores);
              });



            });
          });
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

        </body>

</html>

<?php }
require('llenar3.php');
 ?>