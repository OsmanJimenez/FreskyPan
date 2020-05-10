<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Agregar Pedidos</title>

  <?php
  require('Style.php');
  ?>

</head>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#prov').click(function(){
           $pro="../basededatos/listami_ped.php?p="+$("#prov").val();
          $("#InsumoyMateria").load($pro);
        });
      });
    </script>

<div id="wrapper">

  <!-- Sidebar -->
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
        <h1 class="h3 mb-2 text-gray-800">Agregar Pedidos</h1>
        <p class="mb-4">En este apartado podremos agregar distintos pedidos</a>.</p>

        <form action="../basededatos/agregaped.php" method="POST">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-body">
            <!-- Add Example -->

              <div class="form-row">
                <label for="inputPrice">Fecha</label>
                <input type="date" id="inputName" class="form-control" name="fec" width="100%" />
              </div>
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Escoger al proveedor</h6>
          </div>
          <div class="space-small"></div>
          <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="table-responsive" style=" max-height:350px; ">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php require ("../basededatos/listapro_ped.php");?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inputCantidad">Plazo</label>
                    <input type="number" name="pla" class="form-control" maxlength="11" oninput="maxlengthNumber(this)" onkeypress="return soloM(event)" onpaste="return false" placeholder="">
                    <div class="space-small"></div>
                    <label for="inputCantidad">Exigencias</label>
                    <textarea class="form-control" name="ex" rows="8" maxlength="100" required></textarea>
                  </div>
              </div>
            </div>
            </div>

        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Escoger el producto</h6>
              </div>
          <div class="space-small"></div>
            <div class="form-row">
              <div class="form-group col-md-6">
                  <div class="table-responsive" style=" max-height:350px; " >
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Precio</th>
                          <th>IVA</th>
                          <th>Cantidad</th>
                          <th>Tipo</th>
                          <th>Cantidad a pedir</th>
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
                          <th>Cantidad a pedir</th>
                        </tr>
                      </tfoot>
                      <tbody id="InsumoyMateria">

                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
              </div>
            </div>

            <input type="hidden" name="id" id="prueba" readonly="">

            <button type="submit" class="btn btn-primary float-right">Agregar</button>
          </form>

        </div>

      </div>


    </div>
  </div>
    <!-- /.container-fluid -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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

    <script>
          function maxlengthNumber(ob){
            console.log(ob.value);

            if(ob.value.length > ob.maxLength){

              ob.value = ob.value.slice(0,ob.maxLength);
            }
          }
    </script>
    <script type="text/javascript">
      function soloM(evento){

          key = evento.keyCode || evento.which;
           teclado = String.fromCharCode(key).toLocaleLowerCase();
              ced= "1234567890";
                especiales = "37-38-46";

                teclado_especial = false;
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        teclado_especial = true; break;
                    }
                }
                if (ced.indexOf(teclado) == -1 && !teclado_especial) {
                    return false;
                }
      }
     </script>

    </body>

</html>
<?php }
require('llenar3.php');
 ?>
