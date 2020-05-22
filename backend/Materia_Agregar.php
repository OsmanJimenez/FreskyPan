<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Materia Prima</title>

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
        $query_lastid = "SELECT MAX(ID_MATERIAPRIMA) AS id FROM MateriaPrima";
        $result_lastid = mysqli_query($conn, $query_lastid);
        $fila_lastid = mysqli_fetch_array($result_lastid);
        if(empty($fila_lastid)){$last=1;}else{$last=$fila_lastid['id']+1;}
        ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Agregar Materia Prima</h1>
        <p class="mb-4">En este apartado podremos agregar distintas Materias Primas</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Materia Prima</h6>
          </div>
          <div class="card-body">
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/agregamp.php" method="POST" enctype="multipart/form-data">

              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="cod">Código</label>
                  <input type="number" name="cod" class="form-control" id="cod" readonly="" required value="<?php echo $last ?>">
                </div>
                <div class="form-group col-md-6">
                  <label for="nom">Nombre</label>
                  <input type="text" name="nom" class="form-control" id="nom" placeholder="" maxlength="20" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="pre">Precio</label>
                  <input type="number" name="pre" class="form-control" maxlength="6" onkeypress="return validanumericos(event)" oninput="maxlengthNumber(this)" onpaste="return false" id="pre" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="est">Estado</label>
                  <select id="est" name="est" class="form-control">
                    <option selected value="1">Activo</option>
                    <option value="0">Suspendido</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="can">Cantidad</label>
                  <input type="number" name="can" class="form-control" maxlength="2" onkeypress="return validanumericos(event)" oninput="maxlengthNumber(this)" onpaste="return false" id="can" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="udm">Unidad de medida</label>
                  <select id="udm" name="udm" class="form-control">
                    <?php require("../basededatos/combomc.php"); ?>
                  </select>
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="iva">Iva (%)</label>
                  <input type="number" name="iva" class="form-control" maxlength="2" onkeypress="return validanumericos(event)" oninput="maxlengthNumber(this)" onpaste="return false" id="iva" placeholder="" required>
                </div>

                
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label for="des">Descripción</label>
                    <textarea class="form-control" name="des" id="des" rows="1" maxlength="50" required></textarea>
                  </div>
                </div>
              

                <div class="form-group col-md-4">
                  <label for="tip">Tipo</label>
                  <select id="tip" name="tip" class="form-control">
                    <?php require("../basededatos/combotmp.php"); ?>
                  </select>
                </div>
                     <div class="form-group col-md-2 ">
                  <div class="space-small"></div>
                  <a href="Materiatipo_Agregar.php" class="btn btn-outline-primary">Agregar Tipo</a>
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
                      ¿Esta seguro de agregar este ítem?
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
      <script>
        function maxlengthNumber(ob) {
          console.log(ob.value);

          if (ob.value.length > ob.maxLength) {

            ob.value = ob.value.slice(0, ob.maxLength);
          }
        }
      </script>
      <script>
    function validate(e) {
  var formulario = document.form;
  for (var i = 0; i < formulario.mat_c.length; i++) {
    if (formulario.mat_c[i].checked === false) {
      alert ('debes seleccionar al menos una opción');
      if (e.preventDefault) {
        e.preventDefault();
      } else {
        e.returnValue = false;
      }
    }
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
