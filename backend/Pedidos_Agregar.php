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
        <?php require("../basededatos/connectionbd.php");
        $query_lastid = "SELECT MAX(ID_PEDIDO) AS id FROM Pedido";
        $result_lastid = mysqli_query($conn, $query_lastid);
        $fila_lastid = mysqli_fetch_array($result_lastid);
        if(empty($fila_lastid)){$last=1;}else{$last=$fila_lastid['id']+1;}
        ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Agregar Pedidos</h1>
        <p class="mb-4">En este apartado podremos agregar distintos pedidos</a>.</p>

        <form action="../basededatos/agregaped.php" method="POST">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Escoger al proveedor</h6>
          </div>
        <div class="card-body">
            <!-- Add Example -->

              <div class="form-row">
                <div class="form-group col-md-6"> 
                  <label for="fec">Código de pedido</label>
                  <input type="number" id="cod_ped" class="form-control" name="cod_ped" width="100%" readonly="" value="<?php echo $last ?>">
                </div>
                <div class="form-group col-md-6"> 
                  <label for="fec">Fecha</label>
                  <input type="date" id="fec" class="form-control" name="fec" width="100%" required="">
                </div>
              </div>

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
                    <label for="pla">Plazo (días)</label>
                    <input type="number" name="pla" class="form-control" maxlength="2" oninput="maxlengthNumber(this)" onpaste="return false" onkeypress="return validanumericos(event)">
                    <div class="space-small"></div>
                    <label for="ex">Exigencias</label>
                    <textarea class="form-control" name="ex" rows="8" maxlength="100" required></textarea>
                  </div>
              </div>
            </div>
            </div>

        <div class="card shadow mb-4">
        <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Escoger el producto</h6>
              </div>
          <div class="card-body">
            <div class="form-row">
                  <div class="table-responsive" style=" max-height:350px; " >
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Precio ($)</th>
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
                          <th>Precio ($)</th>
                          <th>IVA</th>
                          <th>Cantidad</th>
                          <th>Tipo</th>
                          <th>Cantidad a pedir</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php require ("../basededatos/listami_ped.php"); ?>
                      </tbody>
                    </table>
                </div>
                </div>
              </div>
            </div>

            <input type="hidden" name="id" id="prueba" readonly="">

            <button type="submit" class="btn btn-primary float-right">Agregar</button>
          </form>
        </div>

      </div>
      <?php
      require('footer.php');
      ?>

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

      <script>
            $('form').submit(function(e){
                if ($('input[type=checkbox]:checked').length === 0) {
                    e.preventDefault();
                    alert('Debe seleccionar al menos un producto.');
                }
            });
      </script>

    <script>
      $('.check').change(function () {
        var cont=0;
          if($(this).prop('checked') == true) {
          $(this).closest('td').siblings().each(function(){
            if(cont==2 || cont==5 || cont==6){
              $(this).find("input").prop("disabled", false);
            }
            cont++;
          });
        }
        else {
          $(this).closest('td').siblings().each(function(){
            if(cont==2 || cont==5 || cont==6){
              $(this).find("input").prop("disabled", true);
            }
            cont++;
          });
        }
      });
    </script>

    </body>

</html>
<?php }
require('llenar3.php');
 ?>
