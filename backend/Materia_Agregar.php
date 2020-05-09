<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Materia Prima</title>

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
        <h1 class="h3 mb-2 text-gray-800">Agregar Materia Prima</h1>
        <p class="mb-4">En este apartado podremos agregar distintas Materias Primas</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Materia Prima</h6>
          </div>
          <div class="card-body">
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/agregamp.php" method="POST" enctype="multipart/form-data">

              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="inputName">Código</label>
                  <input type="number" name="cod" class="form-control" maxlength="11" onkeypress="return cod_ma(event)" oninput="maxlengthNumber(this)" onpaste="return false" id="inputName" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputName">Nombre</label>
                  <input type="text" name="nom" class="form-control" id="inputName" placeholder="" maxlength="10" onkeypress="return Nom_ma(event)" onpaste="return false" required>
                </div>
              </div>

              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="inputPrice">Precio</label>
                  <input type="number" name="pre" class="form-control" maxlength="11" onkeypress="return pre_ma(event)" oninput="maxlengthNumber(this)" onpaste="return false" id="inputrice" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Estado</label>
                  <select id="inputState" name="est" class="form-control">
                    <option selected value="1">Activo</option>
                    <option value="0">Suspendido</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputState">Cantidad</label>
                  <input type="number" name="can" class="form-control" maxlength="11" onkeypress="return cant_ma(event)" oninput="maxlengthNumber(this)" onpaste="return false" id="inputrice" placeholder="" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputState">Unidad de medida</label>
                  <select id="inputState" name="udm" class="form-control">
                    <?php require("../basededatos/combomc.php"); ?>
                  </select>
                </div>
              </div>


              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPrice">Iva (%)</label>
                  <input type="number" name="iva" class="form-control" maxlength="11" onkeypress="return iv_ma(event)" oninput="maxlengthNumber(this)" onpaste="return false" id="inputrice" placeholder="" onKeyDown="if(this.value.length==2) return false;" required>
                </div>

                <div class="form-group col-md-4">
                  <label for="inputState">Tipo</label>
                  <select id="inputState" name="tip" class="form-control">
                    <?php require("../basededatos/combotmp.php"); ?>
                  </select>
                </div>
                <div class="form-group col-md-2 text-center">
                  <div class="space-small"></div>
                  <a href="Materiatipo_Agregar.php" class="btn btn-primary">Agregar Tipo</a>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripción</label>
                    <textarea class="form-control" name="des" id="exampleFormControlTextarea1" rows="3" maxlength="30" onkeypress="return des_ma(event)" onpaste="return false" required></textarea>
                  </div>
                </div>
              </div>

              <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#myModal">Añadir</button>

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
        function cod_ma(evento) {

          key = evento.keyCode || evento.which;
          teclado = String.fromCharCode(key).toLocaleLowerCase();
          cod = "1234567890";
          especiales = "37-38-46";

          teclado_especial = false;
          for (var i in especiales) {
            if (key == especiales[i]) {
              teclado_especial = true;
              break;
            }
          }
          if (cod.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
          }
        }
      </script>

      <script type="text/javascript">
        function pre_ma(evento) {

          key = evento.keyCode || evento.which;
          teclado = String.fromCharCode(key).toLocaleLowerCase();
          pre = "1234567890";
          especiales = "37-38-46";

          teclado_especial = false;
          for (var i in especiales) {
            if (key == especiales[i]) {
              teclado_especial = true;
              break;
            }
          }
          if (pre.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
          }
        }
      </script>
      <script type="text/javascript">
        function cant_ma(evento) {

          key = evento.keyCode || evento.which;
          teclado = String.fromCharCode(key).toLocaleLowerCase();
          can = "1234567890";
          especiales = "37-38-46";

          teclado_especial = false;
          for (var i in especiales) {
            if (key == especiales[i]) {
              teclado_especial = true;
              break;
            }
          }
          if (can.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
          }
        }
      </script>
      <script type="text/javascript">
        function iv_ma(evento) {

          key = evento.keyCode || evento.which;
          teclado = String.fromCharCode(key).toLocaleLowerCase();
          iva = "1234567890";
          especiales = "37-38-46";

          teclado_especial = false;
          for (var i in especiales) {
            if (key == especiales[i]) {
              teclado_especial = true;
              break;
            }
          }
          if (iva.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
          }
        }
      </script>

      <!-- validacion de texto-->

      <script type="text/javascript">
        function Nom_ma(evento) {

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
      <!-- validacion de texto-->

      <script type="text/javascript">
        function des_ma(evento) {

          key = evento.keyCode || evento.which;
          teclado = String.fromCharCode(key).toLocaleLowerCase();
          des = "abcdefghijklmnñopqrstuvwxyz";
          especiales = "37-38-46";

          teclado_especial = false;
          for (var i in especiales) {
            if (key == especiales[i]) {
              teclado_especial = true;
              break;
            }
          }
          if (des.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
          }
        }
      </script>
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