<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Facturas</title>

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
        $query = "SELECT MAX(ID_FACTURA) AS id FROM Factura";
        $result = mysqli_query($conn, $query);
        $fila = mysqli_fetch_array($result);
        if(empty($fila)){$last=1;}else{$last=$fila['id']+1;}
        ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Agregar Facturas</h1>
        <p class="mb-4">En este apartado podremos agregar distintas Facturas</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Información del Pedido</h6>
          </div>

          <div class="card-body">
            <!-- Add Example -->
            <form action="../basededatos/agregafac.php" method="POST">




              <div class="space-small"></div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Código</th>
                          <th>Plazo</th>
                          <th>Fecha</th>
                          <th>Exigencias</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Código</th>
                          <th>Plazo</th>
                          <th>Fecha</th>
                          <th>Exigencias</th>
                        </tr>
                      </tfoot>
                      <tbody>

                        <?php require("../basededatos/listaped_fac.php"); ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="codfac_txt">ID Factura</label>
                  <input type="number" name="codfac_txt" class="form-control" id="codfac_txt" placeholder="" readonly="" value="<?php echo $last; ?>">
                  <div class="space-small"></div>
                  <label for="codped_txt">Código Pedido</label>
                  <input type="number" name="codped_txt" class="form-control" id="codped_txt" readonly="" required>
                  <div class="space-small"></div>
                  <label for="fecha">Fecha</label>
                  <input type="date" name="fecha" class="form-control" id="fecha" placeholder="" required>
                  <div class="space-small"></div>
                  <button type="submit" class="btn btn-primary float-right">Agregar</button>
                </div>
              </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--End  Add Example -->


</div>
<!-- Validation -->
<?php
require('Validation.php');
?>
<!-- End Validation -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  function llenar(text) {
    $("#codped_txt").val(text);
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
require('llenar3.php');
 ?>