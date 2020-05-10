<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Tipo de Materia</title>

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

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?php
        require('Navigation.php');
        ?>
        <!-- End of
        Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Agregar tipo de materia prima</h1>
          <div class="space-small"></div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Subtipo</h6>
            </div>
            <div class="card-body">

              <form action="../basededatos/agregatipomateria.php" method="POST">

                <div class="form-row">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-8 " >

                        <div class="table-responsive" style=" max-height:350px; " >
                          <table class="table table-bordered " id="dataTable" id="TipoMateria_Agregar" width="100%"
                            cellspacing="0">
                            <thead>
                              <tr>
                                <th>Código</th>
                                <th>Nombre</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php require ("../basededatos/listatip_mat.php");?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="form-group col-md-4">
                        <div class="space-small"></div>
                        <div class="space-small"></div>
                        <label for="inputName">Código</label>
                        <input type="number" name="cod" class="form-control" id="inputName" maxlength="11" oninput="maxlengthNumber(this)" onkeypress="return Num_1(event)" onpaste="return false" placeholder="">
                        <label for="inputName">Nombre</label>
                        <input type="text" name="nom" class="form-control" id="inputName"  maxlength="11"  onkeypress="return texto_1(event)" onpaste="return false" placeholder="">           
                        <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal"
                      data-target="#myModal">Añadir</button>

                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Añadir</button>
                      </div>
                    </div>

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
                  </div>
              </form>

              <!--End  Add Example -->
            </div>
          </div>
        </div>

        <!-- /.container-fluid -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
          function cambia(text) {
            //  var text = document.getElementById('sd').value;
            document.getElementById('prueba').value = text;
          }
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

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

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
