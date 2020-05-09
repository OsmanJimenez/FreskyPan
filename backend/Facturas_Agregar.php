<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Facturas</title>

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
        <h1 class="h3 mb-2 text-gray-800">Agregar Facturas</h1>
        <p class="mb-4">En este apartado podremos agregar distintas Facturas</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Información del Pedido</h6>
          </div>

          <div class="card-body">
            <!-- Add Example -->
            <form action="../basededatos/agregap.php" method="POST">




              <div class="space-small"></div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>ID</th>
                          <th>Plazo</th>
                          <th>Fecha</th>
                          <th>Exigencia</th>
                          <th>Estado</th>


                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>

                          <th>ID</th>
                          <th>Plazo</th>
                          <th>Fecha</th>
                          <th>Exigencia</th>
                          <th>Estado</th>
                        </tr>
                      </tfoot>
                      <tbody>

                        <?php require("../basededatos/listac3.php"); ?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="form-group col-md-6">
                  <label for="inputCantidad">ID Pedido</label>
                  <input type="number" name="ced" class="form-control" maxlength="11" oninput="maxlengthNumber(this)" onkeypress="return id_ped(event)" onpaste="return false" id="inputCantidad1" placeholder="">
                  <div class="space-small"></div>
                  <label for="inputCantidad">ID Factura</label>
                  <input type="number" name="a1" class="form-control" maxlength="11" onkeypress="return id_fa(event)" onpaste="return false" id="inputCantidad2" placeholder="">
                  <label for="inputCantidad">Fecha</label>
                  <input type="date" name="dire" class="form-control" id="inputCantidad3" placeholder="">
                  <div class="space-small"></div>
                  <button type="submit" class="btn btn-primary float-right">Agregar</button>
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
  function id_ped(evento) {

    key = evento.keyCode || evento.which;
    teclado = String.fromCharCode(key).toLocaleLowerCase();
    ced = "1234567890";
    especiales = "37-38-46";

    teclado_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        teclado_especial = true;
        break;
      }
    }
    if (ced.indexOf(teclado) == -1 && !teclado_especial) {
      return false;
    }
  }
</script>

<script type="text/javascript">
  function id_fa(evento) {

    key = evento.keyCode || evento.which;
    teclado = String.fromCharCode(key).toLocaleLowerCase();
    a1 = "1234567890";
    especiales = "37-38-46";

    teclado_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        teclado_especial = true;
        break;
      }
    }
    if (a1.indexOf(teclado) == -1 && !teclado_especial) {
      return false;
    }
  }
</script>
<!-- /.container-fluid -->







<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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