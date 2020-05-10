<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Actualizar Pedidos</title>

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
        <h1 class="h3 mb-2 text-gray-800">Agregar Pedidos</h1>
        <p class="mb-4">En este apartado podremos agregar distintos pedidos</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pedidos</h6>
          </div>
          <?php
          require("../basededatos/connectionbd.php");
          $mic = $_GET['id'];
          $query = "Select pedidos.Id_ped,
pedidos.Fec_ped,
clientes.nom_cl,
pedidos.can_ped,
pedidos.dir_ped,
pedidos.des_ped,
pedidos.cod_pro,
clientes.a1_cl,
pedidos.est_ped,
clientes.ced_cl,
telcl.tel_cl,
clientes.dir_cl,
productos.pre_pro
 from pedidos,clientes,productos,telcl where pedidos.Id_ped='$mic'and pedidos.ced_cl=clientes.ced_cl and clientes.ced_cl=telcl.ced_cl and pedidos.cod_pro=productos.cod_pro";
          $result = mysqli_query($conn, $query);

          while ($fila = mysqli_fetch_array($result)) {
            $des = $fila['Id_ped'];
            $cod = $fila['Fec_ped'];
            $fece = $fila['nom_cl'];
            $fecp = $fila['can_ped'];
            $dir_ped = $fila['dir_ped'];
            $des_ped = $fila['des_ped'];
            $cod_pro = $fila['cod_pro'];
            $est = $fila['est_ped'];
            $ced_cl = $fila['ced_cl'];
            $tel_cl = $fila['tel_cl'];
            $dir_cl = $fila['dir_cl'];
            $pre_pro = $fila['pre_pro'];


          ?>

            <div class="card-body">
              <!-- Add Example -->
              <form action="../basededatos/actuap.php" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <input type="hidden" value="<?php echo $des; ?>" name="idp">
                    <label for="inputPrice">Fecha</label>
                    <input type="date" id="inputName" class="form-control" value="<?php echo $cod ?>" name="fec" width="100%" />


                  </div>

                  <!-- <div class="form-group col-md-6">
                  <label for="inputCantidad">Codigo del pedido</label>
                  <input type="text" name="ced" class="form-control" id="inputCantidad" placeholder="">
                </div> -->

                </div>
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Información del Cliente</h6>
                </div>
                <div class="space-small"></div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <div class="table-responsive" style=" max-height:350px; ">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Dirección</th>


                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th></th>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                          </tr>
                        </tfoot>
                        <tbody>

                          <?php require("../basededatos/listac3.php"); ?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inputCantidad">Cedula</label>
                    <input type="text" name="ced" class="form-control" value="<?php echo $ced_cl; ?>" id="inputCantidad1" placeholder="">
                    <div class="space-small"></div>
                    <label for="inputCantidad">Telefono</label>
                    <input type="number" name="a1" class="form-control" id="inputCantidad2" value="<?php echo $tel_cl; ?>" placeholder="">
                    <label for="inputCantidad">Direccion del pedido</label>
                    <input type="text" name="dire" class="form-control" id="inputCantidad3" value="<?php echo $dir_cl; ?>" placeholder="">

                  </div>
                </div>

                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Información del Producto</h6>
                </div>
                <div class="space-small"></div>

                <div class="form-row">
                  <div class="form-group col-md-6">

                    <div class="table-responsive" style=" max-height:350px; ">
                      <table class="table table-bordered" id="dataTable" width="100%" rows="3" cellspacing="0">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Sabor</th>
                            <th>Descripcion</th>
                            <th>Stock</th>

                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th></th>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Sabor</th>
                            <th>Descripcion</th>
                            <th>Stock</th>

                          </tr>
                        </tfoot>
                        <tbody>

                          <?php require("../basededatos/listapv2.php"); ?>

                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inputCantidad">Codigo del producto</label>
                    <input type="number" name="cod" value="<?php echo $cod_pro; ?>" class="form-control" id="inputCantidad5" placeholder="">
                    <div class="space-small"></div>
                    <label for="inputCantidad">Precio del producto</label>
                    <input type="number" name="can" value="<?php echo $pre_pro; ?>" class="form-control" id="inputCantidad6" placeholder="">
                    <div class="space-small"></div>
                    <label for="inputCantidad">Cantidad a comprar</label>
                    <input type="number" name="can" class="form-control" value="<?php echo $fecp; ?>" id="inputCantidad7" placeholder="">
                    <div class="space-small"></div>
                    <label for="exampleFormControlTextarea1">Descripción</label>
                    <textarea name="des" value="<?php echo $des_ped; ?>" class="form-control" value="<?php echo $des_ped; ?>" id="exampleFormControlTextarea1" rows="1"></textarea>
                  </div>
                </div>


              <?php } ?>

              <input type="hidden" name="id" id="prueba" readonly="">

              <button type="submit" class="btn btn-primary">Agregar</button>


              </form>



            </div>

        </div>


      </div>

    </div>

    <!--End  Add Example -->


  </div>
  <!-- /.container-fluid -->







  <script src="js/jquery.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
    function cambia(text) {
      //  var text = document.getElementById('sd').value;
      document.getElementById('prueba').value = text;
    }
  </script>
  <script>
    $(document).ready(function() {
      $(".pr").click(function() {
        var flag = 1;
        var valores = "";

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find("td").each(function() {

          valores = $(this).html();
          if (flag == 2) {
            document.getElementById('inputCantidad1').value = valores;
          }
          if (flag == 5) {
            document.getElementById('inputCantidad2').value = valores;
          }
          if (flag == 6) {
            document.getElementById('inputCantidad3').value = valores;
          }
          flag += 1;
          console.log(flag);
        });



      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $(".pr2").click(function() {
        var flag = 1;
        var valores = "";

        // Obtenemos todos los valores contenidos en los <td> de la fila
        // seleccionada
        $(this).parents("tr").find("td").each(function() {

          valores = $(this).html();
          if (flag == 2) {
            document.getElementById('inputCantidad5').value = valores;
          }
          if (flag == 4) {
            document.getElementById('inputCantidad6').value = valores;
          }
          flag += 1;
          console.log(flag);
        });



      });
    });
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