<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Ventas</title>

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
        <h1 class="h3 mb-2 text-gray-800">Modificar Ventas</h1>
        <p class="mb-4">En este apartado podremos modificar distintas Ventas</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Ventas</h6>
          </div>

          <div class="card-body">
            <!-- Add Example -->
            <form action="../basededatos/editarv.php" method="POST">

              <div class="form-row">
                <?php require("../basededatos/connectionbd.php");
                $mic = $_GET['id'];
                $query = "Select * from venta,produccion,venta_produccion where venta.ID_VENTA='$mic' and
        venta.ID_VENTA=venta_produccion.FK_ID_VENTA and
        venta_produccion.FK_ID_PRODUCCION=produccion.ID_PRODUCCION";
                $result = mysqli_query($conn, $query);

                $fila = mysqli_fetch_array($result);
                $idv = $fila['ID_VENTA'];
                $idp = $fila['FK_ID_PRODUCCION'];
                $can = $fila['cantidad'];
                $fecha = $fila['fecha'];

                ?>
                <div class="form-group col-md-12">
                  <label for="inputCantidad">ID Venta</label>
                  <input type="text" name="cod" class="form-control" maxlength="11" oninput="maxlengthNumber(this)" onkeypress="return id_vent(event)" onpaste="return false" id="inputCantidad1" placeholder="" value="<?php echo $idv; ?>">
                  <div class="space-small"></div>
                  <label for="inputCantidad">ID Producción</label>
                  <input type="number" name="pro" class="form-control" maxlength="11" oninput="maxlengthNumber(this)" onkeypress="return id_prod(event)" onpaste="return false" id="pro" readonly="" placeholder="" value="<?php echo $idp; ?>">
                  <label for="inputCantidad">Fecha</label>
                  <input type="date" name="fec" class="form-control" id="inputCantidad3" placeholder="" value="<?php echo $fec; ?>">
                  <label for="inputCantidad">Cantidad</label>
                  <input type="number" name="can" class="form-control" maxlength="11" oninput="maxlengthNumber(this)" onkeypress="return cant_vent(event)" onpaste="return false" id="inputCantidad2" placeholder="" value="<?php echo $can; ?>">
                  <input type="hidden" name="st" value="<?php echo $can; ?>">
                  <div class="space-small"></div>
                  <button type="submit" class="btn btn-primary float-right ">Actualizar</button>
                </div>
              </div>




          </div>




          <input type="hidden" name="id" id="prueba" readonly="">




          </form>



        </div>

      </div>


    </div>

  </div>

  <!--End  Add Example -->


</div>
<!-- /.container-fluid -->

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  function cambia(text) {
    //  var text = document.getElementById('sd').value;
    document.getElementById('pro').value = text;
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