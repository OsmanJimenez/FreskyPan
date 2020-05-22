<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Contratos</title>

  <?php
  require('Style.php');
  ?>

</head>

<body id="page-top">
  <div id="wrapper">

    <!-- Sidebar -->
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
          <h1 class="h3 mb-2 text-gray-800">Agregar Contratos</h1>
          <p class="mb-4">En este apartado podremos agregar distintos contratos</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Contratos</h6>
            </div>
            <div class="card-body">
              <!-- Add Example -->
              <?php
              require("../basededatos/connectionbd.php");
              $mic = $_GET['id3'];
              $query = "Select clientes.dir_cl,contratos.cod_con,contratos.tip_con,productos.nom_pro,clientes.a1_cl,clientes.tel_cl,clientes.a2_cl,clientes.nom_cl,pedidos.ced_cl,contratos.hor_ent,contratos.fec_ent from contratos,productos,clientes,pedidos where contratos.id_ped=pedidos.Id_ped AND pedidos.ced_cl=clientes.ced_cl AND pedidos.cod_pro=productos.cod_pro AND contratos.cod_con='$mic'";
              $result = mysqli_query($conn, $query);
              $i = 0;

              while ($fila = mysqli_fetch_array($result)) {
                $code = $fila['cod_con'];
                $tip = $fila['tip_con'];
                $cod = $fila['nom_pro'];
                $fec = $fila['nom_cl'];
                $ced_cl = $fila['ced_cl'];
                $hor_ent = $fila['hor_ent'];
                $fec_ent = $fila['fec_ent'];
                $a1_cl = $fila['a1_cl'];
                $a2_cl = $fila['a2_cl'];
                $tel_cl = $fila = ['tel_cl'];
                $i++;
              ?>
                <form action="../basededatos/actuaco.php" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputName">Codigo del Contrato</label>
                      <input type="text" name="cod" class="form-control" value="<?php echo $code; ?>" readonly="" id="inputName" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputState">Tipo de Contrato</label>
                      <select id="inputState" name="tip" class="form-control" value="<?php echo $tip; ?>">
                        <option>Dia</option>
                        <option>Semana</option>
                        <option>Mes</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">

                    <div class="form-group col-md-10">
                      <table class="table table-bordered" id="datasTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Cedula</th>
                            <th>Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Telefono</th>
                            <th>Direccion</th>

                          </tr>
                        </thead>

                        <tbody>

                          <?php require("../basededatos/listac2.php"); ?>

                        </tbody>
                      </table>
                    </div>


                    <!--  <div class="form-group col-md-6">
                    <label for="inputCantidad">Número de Cedula</label>
                    <input type="text" value="<?php echo $ced_cl; ?>" class="form-control" id="inputCantidad" placeholder="">

                    <label for="inputCantidad">Nombre</label>
                    <input type="text" value="<?php echo $cod; ?>" class="form-control" id="inputCantidad" placeholder="">
                    
                  <label for="inputCantidad">Primer Apellido</label>
                  <input type="text" value="<?php echo $a1_cl; ?>" class="form-control" id="inputCantidad" placeholder="">

                  <label for="inputCantidad">Segundo Apellido</label>
                  <input type="text" value="<?php echo $a2_cl; ?>" class="form-control" id="inputCantidad" placeholder="">


                </div> -->


                  </div>

                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputName">Fecha de Entrega</label>
                      <input type="text" name="fec" value="<?php echo $fec_ent; ?>" class="form-control" id="inputName" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputName">Hora de Entrega</label>
                      <input type="text" name="hor" value="<?php echo $hor_ent; ?>" class="form-control" id="inputName" placeholder="">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-10">
                      <label for="inputState">Pedido</label>

                      <table class="table table-bordered" id="datasTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Número de pedido</th>
                            <th>Fecha</th>
                            <th>Nombre Cliente</th>
                            <th>Apellido</th>
                            <th>Dirrecion</th>
                            <th>Descripcion</th>
                            <th>Nombre Producto</th>
                            <th>Cantidad</th>

                          </tr>
                        </thead>

                        <tbody>

                          <?php require("../basededatos/listap2.php"); ?>

                        </tbody>
                      </table>


                    </div>
                    <div class="form-group col-md-2 text-center">
                      <div class="space-small"></div>
                      <button type="submit" class="btn btn-primary ">Agregar </button>
                      <div class="space-small"></div>
                      <!-- <button type="submit" class="btn btn-success ">Modificar </button>
                      <div class="space-small"></div>
                      <button type="submit" class="btn btn-danger">Eliminar </button>
                      <div class="space-small"></div> -->
                    </div>

                  </div>

                <?php } ?>

                <input type="hidden" name="id" id="prueba" readonly="">
                <input type="hidden" name="id2" id="prueba2" readonly="">
                <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>

                <!--End  Add Example -->
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        <!-- Validation -->
        <?php
        require('Validation.php');
        ?>
        <!-- End Validation -->

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="js/jquery.min.js"></script>
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