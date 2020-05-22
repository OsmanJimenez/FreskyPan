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
        <?php require("../basededatos/connectionbd.php");
        $query = "SELECT MAX(ID_TIPOMATERIAPRIMA) AS id FROM TipoMateriaPrima";
        $result = mysqli_query($conn, $query);
        $fila = mysqli_fetch_array($result);
        if(empty($fila)){$last=1;}else{$last=$fila['id']+1;}
        ?>

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Agregar tipo de materia prima</h1>
          <div class="space-small"></div>
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tipo</h6>
            </div>
            <div class="card-body">

              <form method="POST" id="myform" action="../basededatos/agregatipomateria.php">

                <div class="form-row">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6 " >
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>Seleccionar</th>
                                <th>Nombre</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>Seleccionar</th>
                                <th>Nombre</th>
                              </tr>
                            </tfoot>
                            <tbody>
                              <?php require("../basededatos/listartipom.php"); ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="form-group col-md-6">
                        <div class="space-small"></div>
                        <div class="space-small"></div>
                        <label for="cod">Código</label>
                        <input type="number" name="cod" readonly="" class="form-control" id="cod" value="<?php echo $last; ?>">
                        <label for="nom">Nombre</label>
                        <input type="text" name="nom" class="form-control" id="nom" maxlength="15" required="">           
                        <button type="submit" name="action_ana" class="btn btn-primary float-right" value="ana">Añadir</button>
                        <button type="submit" name="action_mod" class="btn btn-primary float-right" value="mod">Modificar</button>
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
          $('.radio').click(function(){
            var $radio = $(this);

            // if this was previously checked
            if ($radio.data('waschecked') == true)
            {
                $radio.prop('checked', false);
                $radio.data('waschecked', false);
                $("#cod").val(<?php echo $last ?>);
            }
            else{
                $radio.data('waschecked', true);
                $("#cod").val($radio.val());
              }
            // remove was checked from other radios
            $radio.siblings('input[type="radio"]').data('waschecked', false);
        });
        </script>

        <script>
                $(document).ready(function(){
                  $("#myform button").click(function (ev) {
                  ev.preventDefault()
                  if ($(this).attr("value") == "ana") {             
                    $("#myform").submit();
                  }
                  if ($(this).attr("value") == "mod") {
                    if ($('input[type=radio]:checked').length === 0) {
                      ev.preventDefault();
                      alert('Debe seleccionar al menos un tipo.');
                    }else{
                      $('#myform').attr('action', '../basededatos/actuatipomateria.php');
                      $("#myform").submit();
                    }
                  }
                });
            });
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
require('llenar3.php');
 ?>