<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Subtipo</title>

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
          <h1 class="h3 mb-2 text-gray-800">Agregar subtipos de productos</h1>
          <p class="mb-4">En este apartado podremos agregar Subtipos de producto </a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Subtipo</h6>
            </div>


            <div class="card-body">
              <?php
              require("../basededatos/connectionbd.php");
              $mic = $_GET['idc'];
              $query = "Select tipoproducto.nombre as nom1,subtipoproducto.nombre as nom2, subtipoproducto.ID_SUBTIPOPRODUCTO,subtipoproducto.FK_ID_TIPOPRODUCTO from subtipoproducto,tipoproducto where ID_SUBTIPOPRODUCTO='$mic' and subtipoproducto.FK_ID_TIPOPRODUCTO=tipoproducto.ID_TIPOPRODUCTO";
              $result = mysqli_query($conn, $query);
              $i = 0;

              $fila = mysqli_fetch_array($result);
              $noms = $fila['nom1'];
              $nomt = $fila['nom2'];
              $idt = $fila['ID_SUBTIPOPRODUCTO'];
              $ids = $fila['FK_ID_TIPOPRODUCTO'];
              $i++; ?>
              <form action="../basededatos/actuasu.php" method="POST">

                <div class="form-row">
                  <div class="card-body">

                    <div class="form-row">
                      <div class="form-group col-md-8 ">

                        <div class="table-responsive" style=" max-height:350px; ">
                          <table class="table table-bordered " id="dataTable" id="Productos_Ver" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th></th>
                                <th>Id</th>
                                <th>Nombre del tipo de producto</th>

                              </tr>
                            </thead>

                            <tbody>

                              <?php require("../basededatos/listasub.php"); ?>

                            </tbody>
                          </table>
                        </div>
                      </div>



                      <div class="form-group col-md-4">
                        <div class="space-small"></div>
                        <div class="space-small"></div>

                        <label for="inputName">Código</label>
                        <input type="number" name="cd" value="<?php echo $idt; ?>" class="form-control" maxlength="11" oninput="maxlengthNumber(this)" onkeypress="return Num_1(event)" onpaste="return false" id="inputName" placeholder="" readonly="">
                        <label for="inputName">Nombre</label>
                        <input type="text" name="nom" value="<?php echo $nomt; ?>" class="form-control" maxlength="11" onkeypress="return texto_1(event)" onpaste="return false" id="inputName" placeholder="">
                        <div class="space-small"></div>
                        <input type="hidden" name="id" id="prueba" readonly="">
                        <!-- Trigger the modal with a button -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Actualizar</button>

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
        <!-- funcion de validacion solo numeros-->


        <script type="text/javascript">
          function cod_sub(evento) {

            key = evento.keyCode || evento.which;
            teclado = String.fromCharCode(key).toLocaleLowerCase();
            cd = "1234567890";
            especiales = "37-38-46";

            teclado_especial = false;
            for (var i in especiales) {
              if (key == especiales[i]) {
                teclado_especial = true;
                break;
              }
            }
            if (cd.indexOf(teclado) == -1 && !teclado_especial) {
              return false;
            }
          }
        </script>
        <!-- validacion de texto-->

        <script type="text/javascript">
          function Nom_sub(evento) {

            key = evento.keyCode || evento.which;
            teclado = String.fromCharCode(key).toLocaleLowerCase();
            nom = "abcdefghijklmnñopqrstuvwxyz";
            especiales = "37-38-46";

            teclado_especial = false;
            for (var i in especiales) {
              if (key == especiales[i]) {
                teclado_especial = true;
                break;
              }
            }
            if (nom.indexOf(teclado) == -1 && !teclado_especial) {
              return false;
            }
          }
        </script>
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
