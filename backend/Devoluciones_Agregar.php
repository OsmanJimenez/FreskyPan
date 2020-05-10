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

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Agregar Devoluciones</h1>
        <p class="mb-4">En este apartado podremos agregar distintos devoluciones que se generen</a>.</p>

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
                  <label for="inputName">Codigo de Devolución</label>
                  <input type="text" name="cd" class="form-control" id="inputName" maxlength="11" oninput="maxlengthNumber(this)" onkeypress="return Num_1(event)" onpaste="return false" placeholder="" required="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputName">Fecha</label>
                  <input type="date" id="inputName" class="form-control" name="fec" width="100%" />
                </div>
              </div>





              <div class="form-row">
                <div class="form-group col-md-8">
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Codigo de pedido</th>
                          <th>Fecha</th>
                          <th>Cedula del cliente</th>
                          <th>Codigo del producto</th>
                          <th>Cantidad</th>
                          <th></th>
                          <th></th>
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
                          <th></th>
                          <th></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php require("../basededatos/listap3.php"); ?>
                      </tbody>
                    </table>
                  </div>
                </div>



                <div class="form-group col-md-4">
                  <label for="inputPrice">Codigo del pedido</label>
                  <input type="number" name="cod" readonly="" class="form-control" id="inputrice" placeholder="" required="">
                  <label for="inputCantidad">Cedula del cliente</label>
                  <input type="number" readonly="" class="form-control" id="inputCantidad1" placeholder="" required="">
                  <label for="inputCantidad">Fecha de compra</label>
                  <input type="date" name="fecha" class="form-control" id="inputCantidad2" placeholder="" required="">
                  <label for="inputCantidad">Codigo del producto</label>
                  <input type="number" name="id" readonly="" class="form-control" id="inputCantidad3" placeholder="" required="">
                  <label for="inputCantidad">Cantidad del pedido</label>
                  <input type="number" name="can" readonly="" class="form-control" id="inputCantidad4" placeholder="" required="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">


                  <label for="exampleFormControlTextarea1">Descripción de la devolución</label>
                  <textarea class="form-control" name="des" id="exampleFormControlTextarea1" maxlength="30" onkeypress="return texto_1(event)" onpaste="return false" rows="3"></textarea>
                  <br>
                  <label for="inputCantidad">Desea sumarlo a la produccion</label>
                  <select name="opt">
                    <option>Si</option>
                    <option>No</option>
                  </select>
                  <br>
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

            </form>

            <!--End  Add Example -->
          </div>


        </div>
        <!-- /.container-fluid -->

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
