<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Productos</title>

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
        <h1 class="h3 mb-2 text-gray-800">Agregar Productos</h1>
        <p class="mb-4">En este apartado podremos agregar distintos productos</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
          </div>
          <div class="card-body">
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/agregapd.php" method="POST" enctype="multipart/form-data">


              <label for="inputName">Codigo del Producto</label>
              <input type="number" name="cod" class="form-control" id="inputName" maxlength="11" oninput="return maxlengthNumber(this)" onkeypress="return cod_pro(event)" onpaste="return false" placeholder="">

              <div class="form-row">

                <div class="form-group col-md-6">
                  <label for="inputName">Nombre del Producto</label>
                  <input type="text" name="nom" class="form-control" id="inputName" maxlength="10" onkeypress="return Nom_pro(event)" onpaste="return false" placeholder="">
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPrice">Precio</label>
                  <input type="number" name="pre" class="form-control" id="inputrice" maxlength="11" oninput="return maxlengthNumber(this)" onkeypress="return pre_pro(event)" onpaste="return false" placeholder="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputState">Duración</label>
                  <input type="number" name="dur" class="form-control" id="inputrice" maxlength="11" oninput="return maxlengthNumber(this)" onkeypress="return dur_pro(event)" onpaste="return false" placeholder="Duración en Dias">
                </div>


                <div class="form-group col-md-6">
                  <label for="inputState">Estado</label>
                  <select id="inputState" name="est" class="form-control">
                    <option selected>Escoger</option>
                    <option value="1">Activo</option>
                    <option value="0">Suspendido</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">

                  <label for="inputState">Categoria</label>
                  <?php require('../basededatos/select.php') ?>
                </div>


                <div class="form-group col-md-6">
                  <label for="inputState">Sabor</label>
                  <select id="inputState" name="sab" class="form-control">
                    <option selected>Escoger</option>
                    <option>Dulce</option>
                    <option>Salado</option>
                    <option>Agridulce</option>
                  </select>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripción</label>
                    <textarea class="form-control" name="des" id="exampleFormControlTextarea1" maxlength="40" onkeypress="return des_pro(event)" onpaste="return false" rows="3"></textarea>
                  </div>
                </div>
                <div class="form-group col-md-6">

                  <div class="form-group">
                    <label for="exampleFormControlFile1">Imagen del Producto</label>
                    <input type="file" name="img" accept="image/*" class="form-control-file" id="exampleFormControlFile1">
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
        function cod_pro(evento) {

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
        function pre_pro(evento) {

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
        function dur_pro(evento) {

          key = evento.keyCode || evento.which;
          teclado = String.fromCharCode(key).toLocaleLowerCase();
          dur = "1234567890";
          especiales = "37-38-46";

          teclado_especial = false;
          for (var i in especiales) {
            if (key == especiales[i]) {
              teclado_especial = true;
              break;
            }
          }
          if (dur.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
          }
        }
      </script>
      <!-- validacion de texto-->

      <script type="text/javascript">
        function Nom_pro(evento) {

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
      <script type="text/javascript">
        function des_pro(evento) {

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