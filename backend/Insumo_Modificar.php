<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8"> 
  <title>Modificar Insumo</title>

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
        <?php require("../basededatos/connectionbd.php");
        $id = $_GET['id'];
        $query = "SELECT nombre,precio,estado,cantidad,iva,descripcion FROM Insumo WHERE ID_INSUMO='$id'";
        $result = mysqli_query($conn, $query);

        $fila = mysqli_fetch_array($result);
        $nom = $fila['nombre'];
        $pre = $fila['precio'];
        $est = $fila['estado'];
        $can = $fila['cantidad'];
        $iva = $fila['iva'];
        $des = $fila['descripcion'];
        $vertodo=$_GET['all'];
        ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Modificar Insumos</h1>
        <p class="mb-4">En este apartado podremos modificar los insumos registrados en el sistema</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Insumos</h6>
          </div>
          <div class="card-body">
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/actuaim.php?all=<?php echo $vertodo; ?>" method="POST" enctype="multipart/form-data">
              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="cod">Código</label>
                  <input type="number" name="cod" class="form-control" readonly="" id="cod" value="<?php echo $id; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="nom">Nombre</label>
                  <input type="text" name="nom" class="form-control" id="nom" maxlength="20" required required value="<?php echo $nom; ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="can">Cantidad</label>
                  <input type="number" name="can" class="form-control" oninput="return maxlengthNumber(this)" maxlength="3" onkeypress="return validanumericos(event)" onpaste="return false" id="can" required value="<?php echo $can; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="pre">Precio</label>
                  <input type="number" name="pre" class="form-control" oninput="return maxlengthNumber(this)" maxlength="9" onkeypress="return validanumericos(event)" id="pre" onpaste="return false" required value="<?php echo $pre; ?>">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="iva">Iva</label>
                  <input type="number" name="iva" oninput="return maxlengthNumber(this)" maxlength="2" class="form-control" onkeypress="return validanumericos(event)" id="iva" onpaste="return false" required value="<?php echo $iva; ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="tip">Tipo</label>
                  <select id="tip" name="tip" class="form-control">
                    <?php require("../basededatos/combotpins.php"); ?>
                  </select>
                </div>
              </div>
                
              <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="des">Descripción</label>
                    <textarea class="form-control" name="des" id="des" rows="3" maxlength="50" required><?php echo $des; ?></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label for="est">Estado</label>
                  <select id="est" name="est" class="form-control" disabled>
                    <?php if ($est == "0") { ?>
                      <option value="1">Activo</option>
                      <option selected value="0">Suspendido</option>
                    <?php } else { ?>
                      <option selected value="1">Activo</option>
                      <option value="0">Suspendido</option>
                    <?php } ?>
                  </select>
                </div>
              </div>

          

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Modificar</button>

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
                      <button type="submit" class="btn btn-primary">Sí</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
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
<?php }
require('llenar3.php');
 ?>