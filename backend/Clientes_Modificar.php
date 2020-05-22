<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Clientes</title>

  <!-- Style -->
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

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Agregar Clientes</h1>
          <p class="mb-4">En este apartado podremos agregar distintos clientes</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
            </div>
            <div class="card-body">
              <!-- Add Example -->
              <?php
              require("../basededatos/connectionbd.php");
              $mic = $_GET['id'];
              $query = "Select * from proveedor,telefono where ID_PROVEEDOR='$mic' and telefono.FK_ID_PROVEEDOR=proveedor.ID_PROVEEDOR ";
              $result = mysqli_query($conn, $query);
              $i = 0;
              while ($fila = mysqli_fetch_array($result)) {
                $Nom = $fila['prNombre'];
                $Nom2 = $fila['segNombre'];
                $cod = $fila['ID_PROVEEDOR'];
                $a1 = $fila['prApellido'];
                $a2 = $fila['segApellido'];
                $tel = $fila['ID_TELEFONO'];
                $cor = $fila['correo'];
                $est = $fila['estado'];
                $val = "";
                if ($est == "1") {
                  $val = "Activado";
                } else if ($est == 0) {

                  $val = "Suspendido";
                }
                $i++; ?>
                <form action="../basededatos/actuac.php" method="POST">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputName">Número de Cedula</label>
                      <input type="text" value="<?php echo $cod; ?>" class="form-control" id="inputName" name="ced" maxlength="15" oninput="return maxlengthNumber(this)" onkeypress="return numCed(event)" onepaste="return false" placeholder="Número de Cedula" readonly="">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPrice">Telefono</label>
                      <input type="number" value="<?php echo $tel; ?>" name="tel" class="form-control" id="inputrice" maxlength="15" oninput="return maxlengthNumber(this)" onkeypress="return numTel(event)" onepaste="return false" placeholder="Telefono">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputCantidad">Nombre</label>
                      <input type="text" value="<?php echo $Nom; ?>" name="nom" class="form-control" id="inputCantidad" maxlength="15" onkeypress="return Nom_1(event)" onepaste="return false" onpaste="return false" placeholder="Nombre">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputCantidad">Primer Apellido</label>
                      <input type="text" name="a1" value="<?php echo $a1; ?>" class="form-control" id="inputCantidad" maxlength="15" onkeypress="return Pr_ap(event)" onepaste="return false" onpaste="return false" placeholder="Primer Apellido">
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputCantidad">Segundo Apellido</label>
                      <input type="text" name="a2" class="form-control" value="<?php echo $a2; ?>" id="inputCantidad" maxlength="15" onkeypress="return Seg_ap(event)" onepaste="return false" onpaste="return false" placeholder="Segundo Apellido">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputName">Segundo Nombre</label>
                      <input type="text" name="nom2" value="<?php echo $Nom2; ?>" class="form-control" id="inputName" maxlength="15" onkeypress="return Nom_2(event)" onepaste="return false" onpaste="return false" placeholder="Dirección">
                      <div class="space-small"></div>
                      <label for="exampleFormControlTextarea1">Correo electronico</label>
                      <input type="email" name="cor" class="form-control" id="inputName" placeholder="" required="" value="<?php echo $cor; ?>">
                      <div class="space-small"></div>
                      <label for="inputState">Estado</label>
                      <select id="inputState" name="est" value="<?php echo $est; ?>" class="form-control">
                        
                        <option value="1">Activo</option>
                        <option value="0">Suspendido</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6 text-center">
                      <img src="../img/Captura.PNG">
                    </div>
                  </div>
                <?php } ?>
                <button type="submit" class="btn btn-primary float-right">Actualizar</button>
                </form>
                <!--End  Add Example -->
            </div>
          </div>
        </div>

        <!-- Validation -->
      <?php
      require('Validation.php');
      ?>
      <!-- End Validation --> 

        <!-- /.container-fluid -->
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