<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
  
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Materia Prima</title>

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
        $query = "SELECT nombre,precio,estado,cantidad,iva,descripcion FROM MateriaPrima WHERE ID_MATERIAPRIMA='$id'";
        $result = mysqli_query($conn, $query);

        $fila = mysqli_fetch_array($result);
        $nom = $fila['nombre'];
        $pre = $fila['precio'];
        $est = $fila['estado'];
        $can = $fila['cantidad'];
        $iva = $fila['iva'];
        $des = $fila['descripcion'];
        ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Modificar Materia Prima</h1>
        <p class="mb-4">En este apartado podremos modificar la Materia Prima registrada en el sistema</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Materia Prima</h6>
          </div>
          <div class="card-body">
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/actuamp.php" method="POST" enctype="multipart/form-data">

              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="inputName">Código</label>
                  <input type="number" name="cod" value="<?php echo $id; ?>" class="form-control" maxlength="11" onkeypress="return Num_1(event)" oninput="maxlengthNumber(this)" onpaste="return false" id="inputName" id="inputName" placeholder="" readonly="readonly">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputName">Nombre</label>
                  <input type="text" name="nom" value="<?php echo $nom; ?>" class="form-control" id="inputName" placeholder="" maxlength="10" onkeypress="return texto_1(event)" onpaste="return false" id="inputName" required>
                </div>
              </div>

              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="inputPrice">Precio</label>
                  <input type="number" name="pre" value="<?php echo $pre; ?>" class="form-control" maxlength="11" onkeypress="return Num_1(event)" oninput="maxlengthNumber(this)" onpaste="return false" id="inputName" id="inputrice" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Estado</label>
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
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputState">Cantidad</label>
                  <input type="number" name="can" value="<?php echo $can; ?>" class="form-control" maxlength="11" onkeypress="return Num_1(event)" oninput="maxlengthNumber(this)" onpaste="return false" id="inputName" id="inputrice" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPrice">Iva</label>
                  <input type="number" name="iva" value="<?php echo $iva; ?>" class="form-control" maxlength="11" onkeypress="return Num_1(event)" oninput="maxlengthNumber(this)" onpaste="return false" id="inputName" id="inputrice" placeholder="" onKeyDown="if(this.value.length==2) return false;" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripción</label>
                    <textarea class="form-control" name="des" id="exampleFormControlTextarea1" rows="3" maxlength="30" onkeypress="return texto_1(event)" onpaste="return false" id="inputName" required><?php echo $des; ?></textarea>
                  </div>
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
else if(!(isset($_SESSION['cl']))){
  ?>
<script>
alert('Primero inicie sesión');
  window.location.href='../login/index.php';
</script><?php
}
 ?>
