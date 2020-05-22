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
        $query_lastid = "SELECT MAX(ID_DEVOLUCION) AS id FROM Devolucion";
        $result_lastid = mysqli_query($conn, $query_lastid);
        $fila_lastid = mysqli_fetch_array($result_lastid);
        if(empty($fila_lastid)){$last=1;}else{$last=$fila_lastid['id']+1;}
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
                  <input type="number" name="cod" class="form-control" id="cod" readonly="" value="<?php echo $last ?>">
                </div>
                <div class="form-group col-md-4">
                  <label for="fec">Fecha</label>
                  <input type="date" id="fec" class="form-control" name="fec" width="100%" required="">
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-12">
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
                <div class="form-group col-md-12">
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="matin_Table" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Cantidad</th>
                          <th>Unidades pedidas</th>
                          <th>Precio</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Cantidad</th>
                          <th>Unidades pedidas</th>
                          <th>Precio</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php require("../basededatos/listami_dev.php"); ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="des">Descripción de la devolución</label>
                  <textarea class="form-control" name="des" id="des" maxlength="60" required="" rows="3"></textarea>

                  <div class="space-small">

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
          function maxlengthNumber(ob) {
            console.log(ob.value);

            if (ob.value.length > ob.maxLength) {

              ob.value = ob.value.slice(0, ob.maxLength);
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
              if(cont==1){
                $(this).find("input").prop("disabled", false);
              }
              cont++;
            });
            }
            else {
            $(this).closest('td').siblings().each(function(){
              if(cont==1){
                $(this).find("input").prop("disabled", true);
              }
              cont++;
            });
            }
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
