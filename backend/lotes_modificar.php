<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Lotes</title>

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
        <!-- End of -->

        <!--Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Modificar producciones</h1>
          <p class="mb-4">En este apartado podremos editar distintas producciones</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Produccion</h6>
            </div>
            <div class="card-body">
                <!-- Add Example -->
                <form action="../basededatos/editarlo.php" method="POST">
                  
              
              <?php require("../basededatos/connectionbd.php");
              $cd = $_GET['id'];
              $fe = $_GET['fec'];
              $ca = $_GET['ca'];
              $query2 = "Select FK_ID_CATPRODUCTO,unidades from produccion where ID_PRODUCCION='$cd'
                        and fechaProduccion='$fe'";
              $result2 = mysqli_query($conn, $query2);
              while ($fila2 = mysqli_fetch_array($result2)) {
                $Stock = $fila2['unidades'];
                $pro = $fila2['FK_ID_CATPRODUCTO'];
              }
              ?>
              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputState">Productos</label>
                  <input type="text" name="id" id="prueba" readonly="" value="<?php echo $pro; ?>" class="form-control">
                  <div class="space-small"></div>
                  <input type="text" name="idl" value="<?php echo $cd; ?>" class="form-control" readonly="">
                  <div class="space-small"></div>
                  <input type="text" name="fece" value="<?php echo $fe; ?>" class="form-control" readonly="">
                  <div class="space-small"></div>
                  <input type="text" name="can" value="<?php echo $ca; ?>" class="form-control" readonly="">
                
                  
                    <label for="inputName">Unidades</label>
                    <input type="number" value="<?php echo $Stock; ?>" name="st" class="form-control" id="inputName" maxlength="11" onkeypress="return uni_lo(event)" oninput="maxlengthNumber(this)" onpaste="return false" placeholder="">

                    <br>

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
            function uni_lo(evento) {

              key = evento.keyCode || evento.which;
              teclado = String.fromCharCode(key).toLocaleLowerCase();
              uni = "1234567890";
              especiales = "37-38-46";

              teclado_especial = false;
              for (var i in especiales) {
                if (key == especiales[i]) {
                  teclado_especial = true;
                  break;
                }
              }
              if (uni.indexOf(teclado) == -1 && !teclado_especial) {
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
          <script>
            function cambia2(text) {
              //  var text = document.getElementById('sd').value;
              document.getElementById('prueba2').value = text;
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