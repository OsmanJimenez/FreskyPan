<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Productos</title>

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
        $mic = $_GET['idc'];
        $query = "Select * from catproducto where ID_CATPRODUCTO='$mic'";
        $result = mysqli_query($conn, $query);
        $i = 0;

        while ($fila = mysqli_fetch_array($result)) {
          $Nom = $fila['nombre'];
          $cat = $fila['FK_ID_SUBTIPOPRODUCTO'];
          $sab = $fila['sabor'];
          $des = $fila['descripcion'];
          $stock = $fila['stock'];
          $pre = $fila['precio'];
          $id = $fila['ID_CATPRODUCTO'];
          $esta = $fila['estado'];
          $img = $fila['imagen'];
          $i++; ?>
          <h1 class="h3 mb-2 text-gray-800">Modificar Productos</h1>
          <p class="mb-4">En este apartado podremos agregar distintos productos</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
            </div>
            <div class="card-body">
              <!-- Add Example -->
              <form action="../basededatos/actuapd.php" method="POST" enctype="multipart/form-data">
                <label for="inputName">Codigo del Producto</label>
                <input type="text" name="cod" value="<?php echo $id; ?>" class="form-control" id="inputName" readonly="" maxlength="11" onkeypress="return Num_1(event)" oninput="return maxlengthNumber(this)" onpaste="return false" placeholder="">

                <div class="form-row">

                  <div class="form-group col-md-6">
                    <label for="inputName">Nombre del Producto</label>
                    <input type="text" value="<?php echo $Nom; ?>" class="form-control" name="nom" id="inputName" maxlength="11" onkeypress="return texto_1(event)" onpaste="return false" placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPrice">Precio</label>
                    <input type="number" name="pre" class="form-control" value="<?php echo $pre; ?>" id="inputrice" maxlength="11" onkeypress="return Num_1(event)" oninput="return maxlengthNumber(this)" onpaste="return false" placeholder="">




                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputState">Sabor</label>
                    <select id="inputStatesab" class="form-control" name="sab" required="" value="<?php echo $sab; ?>">
                      
                      <option value="1">Dulce</option>
                      <option value="2">Salado</option>
                      <option value="3">Agridulce</option>
                    </select>
                  </div>
                
                  <div class="form-group col-md-6">

                    <label for="inputState">Categoria</label>
                    <?php require('../basededatos/select.php') ?>
                  </div>

                  

                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputState">Estado</label>
                    <select class="form-control" name="esta" value='<?php echo $esta ?>' id="estado">
                      
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>
                    </select>
                  </div>

                  <div class="form-group">
                  <label for="exampleFormControlFile1">Imagen del Producto</label>
                  <input type="file" name="img" accept="image/*" class="form-control-file" id="exampleFormControlFile1">
                </div>
                </div>

                <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripción</label>
                <textarea class="form-control" name="des" id="exampleFormControlTextarea1" maxlength="40"  onpaste="return false" rows="3"><?php echo $des; ?></textarea>
                </div>


              <?php } ?>
              <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Actualizar</button>

              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Confirmar</h4>
                    </div>
                    <div class="modal-body">
                      <p>Esta seguro</p>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Si</button>
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

      <script>
        document.ready = document.getElementById("inputStatecat").value = '<?php echo $cat; ?>';

        document.ready = document.getElementById("inputStatesab").value = '<?php if (strcasecmp($sab, 'Dulce') == 0) {
                                                                              echo '1';
                                                                            } elseif (strcasecmp($sab, 'Salado') == 0) {
                                                                              echo '2';
                                                                            } elseif (strcasecmp($sab, 'Agridulce') == 0) {
                                                                              echo '3';
                                                                            } ?>';
        document.ready = document.getElementById("estado").value = '<?php echo $esta; ?>';
      </script>
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
