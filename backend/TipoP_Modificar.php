<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Tipo de Producto</title>

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
        <!-- End of
        Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Modificar tipos de productos</h1>
          <p class="mb-4">En este apartado podremos agregar tipos de producto </a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Tipo</h6>
            </div>


            <div class="card-body">
              <?php
              require("../basededatos/connectionbd.php");
              $mic = $_GET['idc'];
              $query = "Select * from subtipoproducto where ID_SUBTIPOPRODUCTO='$mic'";
              $result = mysqli_query($conn, $query);
              $i = 0;
              if (!$result) {
                echo "no se pudo", mysqli_error($conn);
              }
              $fila = mysqli_fetch_array($result);
              $nomt = $fila['nombre'];
              $idt = $fila['ID_SUBTIPOPRODUCTO'];
              $i++; ?>
              <form action="../basededatos/actuati.php" method="POST">

                <div class="form-row">
                  <div class="card-body">

                    <div class="form-row">

                      <div class="form-group col-md-12">
                        <label for="inputName">Código</label>
                        <input type="number" name="cd" value="<?php echo $idt; ?>" class="form-control" maxlength="11" oninput="maxlengthNumber(this)" onkeypress="return cod_tip(event)" onpaste="return false" id="inputName" placeholder="" readonly="">
                        <label for="inputName">Nombre</label>
                        <input type="text" name="nom" value="<?php echo $nomt; ?>" class="form-control" maxlength="11" onkeypress="return Nom_tip(event)" onpaste="return false" id="inputName" placeholder="">
                        <div class="space-small"></div>
                            <label for="inputState">Categoria</label>
                  <select id="inputState" name="cate" class="form-control">
                    <?php require("../basededatos/combottp.php"); ?>
                   </select>
                   <div class="space-small"></div>
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Actualizar</button>

                      </div>
                    </div>



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
                            <p>Esta seguro</p>
                          </div>
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Si</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
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
      
        <!-- /.container-fluid -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

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