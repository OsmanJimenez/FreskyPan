<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Pedidos</title>

  <?php
    require('Style.php');
  ?>

</head>

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
      <!-- End of -->
      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Agregar Pedidos</h1>
        <p class="mb-4">En este apartado podremos agregar distintos pedidos</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">



          <div class="card-body">
            <!-- Add Example -->
            <form action="../basededatos/agregap.php" method="POST">
              <div class="form-row">

                  <label for="inputPrice">Fecha</label>
                  <input type="date" id="inputName" class="form-control" name="fec" width="100%" />

              </div>
          </div>
        </div>

        <div class="card shadow mb-4">

              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Escoger al proveedor</h6>
              </div>

              <div class="space-small"></div>

              <div class="card-body">
                <div class="form-row">

                  <div class="form-group col-md-6">
                    <div class="table-responsive" style=" max-height:350px; ">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                          <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                          </tr>
                        </thead>
                        <tfoot>
                          <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Telefono</th>
                            <th>Dirección</th>
                          </tr>
                        </tfoot>
                        <tbody>
                          <?php require ("../basededatos/listapro_ped.php");?>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="inputCantidad">Cedula</label>
                    <input type="text" name="ced" class="form-control" id="inputCantidad1"maxlength="11"oninput="maxlengthNumber(this)" onkeypress="return Ced_pe(event)" onpaste="return false" placeholder="">
                    <div class="space-small"></div>
                    <label for="inputCantidad">Telefono</label>
                    <input type="number" name="a1" class="form-control" id="inputCantidad2" maxlength="10"oninput="maxlengthNumber(this)" onkeypress="return Tel_pe(event)" onpaste="return false"  placeholder="">
                    <label for="inputCantidad">Sede donde descargar el pedido</label>
                    <input type="text" name="dire" class="form-control" id="inputCantidad3" maxlength="12" onkeypress="return Ced_pe(event)" onpaste="return false"  placeholder="">

                  </div>

                </div>
              </div>
        </div>

        <div class="card shadow mb-4">

              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Escoger el producto</h6>
              </div>

              <div class="space-small"></div>

              <div class="card-body">
                <div class="form-row">

                  <div class="form-group col-md-6">
                  <div class="table-responsive" style=" max-height:350px; " >
                    <table class="table table-bordered" id="dataTable" width="100%" rows="3" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Precio</th>
                          <th>IVA</th>
                          <th>Cantidad</th>
                          <th>Tipo</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                          <th>Nombre</th>
                          <th>Descripción</th>
                          <th>Precio</th>
                          <th>IVA</th>
                          <th>Cantidad</th>
                          <th>Tipo</th>
                        </tr>
                      </tfoot>
                      <tbody>
                       <?php require ("../basededatos/listami_ped.php");?>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="form-group col-md-6">
                    <label for="inputCantidad">Codigo del producto</label>
                    <input type="number" name="cod" class="form-control" id="inputCantidad5" maxlength="11"oninput="maxlengthNumber(this)" onkeypress="return cod_pe(event)" onpaste="return false"  placeholder="">
                    <div class="space-small"></div>
                    <label for="inputCantidad">Precio del producto</label>
                    <input type="number" name="can1" class="form-control" id="inputCantidad6" maxlength="11"oninput="maxlengthNumber(this)" onkeypress="return pre_pe(event)" onpaste="return false"  placeholder="">
                    <div class="space-small"></div>
                    <label for="inputCantidad">Cantidad a pedir</label>
                    <input type="number" name="can" class="form-control" id="inputCantidad7" maxlength="11"oninput="maxlengthNumber(this)" onkeypress="return cant_pe(event)" onpaste="return false"  placeholder="">
                    <div class="space-small"></div>
                    <label for="exampleFormControlTextarea1">Descripción</label>
                    <textarea name="des" class="form-control" id="exampleFormControlTextarea1" maxlength="30" onkeypress="return des_pe(event)" onpaste="return false"  rows="1"></textarea>
                  </div>
                </div>

                <input type="hidden" name="id" id="prueba" readonly="">

                <button type="submit" class="btn btn-primary float-right">Agregar</button>
              </div>
          </form>

        </div>

      </div>


</div>
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
    $(document).ready(function(){
        $(".pr").click(function(){
 var flag=1;
            var valores="";

            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find("td").each(function(){

                valores=$(this).html();
                if(flag==2){
                document.getElementById('inputCantidad1').value = valores;}
                if(flag==5){
                document.getElementById('inputCantidad2').value = valores;
                }
                if(flag==6){
                document.getElementById('inputCantidad3').value = valores;}
                flag+=1;
                console.log(flag);
            });



        });
    });
    </script>
        <script>
    $(document).ready(function(){
        $(".pr2").click(function(){
 var flag=1;
            var valores="";

            // Obtenemos todos los valores contenidos en los <td> de la fila
            // seleccionada
            $(this).parents("tr").find("td").each(function(){

                valores=$(this).html();
                if(flag==2){
                document.getElementById('inputCantidad5').value = valores;}
                if(flag==4){
                document.getElementById('inputCantidad6').value = valores;
                }
                flag+=1;
                console.log(flag);
            });



        });
    });
    </script>
    <!-- validacion de longitud de campo numerico-->
            <script>
          function maxlengthNumber(ob){
            console.log(ob.value);

            if(ob.value.length > ob.maxLength){

              ob.value = ob.value.slice(0,ob.maxLength);
            }
          }


        </script>
        <!-- funcion de validacion solo numeros-->


           <script type="text/javascript">
      function Ced_pe(evento){

          key = evento.keyCode || evento.which;
           teclado = String.fromCharCode(key).toLocaleLowerCase();
              ced= "1234567890";
                especiales = "37-38-46";

                teclado_especial = false;
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        teclado_especial = true; break;
                    }
                }
                if (ced.indexOf(teclado) == -1 && !teclado_especial) {
                    return false;
                }
      }
     </script>

          <script type="text/javascript">
      function Tel_pe(evento){

          key = evento.keyCode || evento.which;
           teclado = String.fromCharCode(key).toLocaleLowerCase();
              a1= "1234567890";
                especiales = "37-38-46";

                teclado_especial = false;
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        teclado_especial = true; break;
                    }
                }
                if (a1.indexOf(teclado) == -1 && !teclado_especial) {
                    return false;
                }
      }
     </script>

     <script type="text/javascript">
 function cod_pe(evento){

     key = evento.keyCode || evento.which;
      teclado = String.fromCharCode(key).toLocaleLowerCase();
         cod= "1234567890";
           especiales = "37-38-46";

           teclado_especial = false;
           for (var i in especiales) {
               if (key == especiales[i]) {
                   teclado_especial = true; break;
               }
           }
           if (cod.indexOf(teclado) == -1 && !teclado_especial) {
               return false;
           }
 }
</script>
<script type="text/javascript">
function pre_pe(evento){

key = evento.keyCode || evento.which;
 teclado = String.fromCharCode(key).toLocaleLowerCase();
    can1= "1234567890";
      especiales = "37-38-46";

      teclado_especial = false;
      for (var i in especiales) {
          if (key == especiales[i]) {
              teclado_especial = true; break;
          }
      }
      if (can1.indexOf(teclado) == -1 && !teclado_especial) {
          return false;
      }
}
</script>
<script type="text/javascript">
function cant_pe(evento){

key = evento.keyCode || evento.which;
 teclado = String.fromCharCode(key).toLocaleLowerCase();
    can= "1234567890";
      especiales = "37-38-46";

      teclado_especial = false;
      for (var i in especiales) {
          if (key == especiales[i]) {
              teclado_especial = true; break;
          }
      }
      if (can.indexOf(teclado) == -1 && !teclado_especial) {
          return false;
      }
}
</script>
     <!-- validacion de texto-->

            <script type="text/javascript">
      function sed_pe(evento){

          key = evento.keyCode || evento.which;
           teclado = String.fromCharCode(key).toLocaleLowerCase();
              dire = "abcdefghijklmnñopqrstuvwxyz";
                especiales = "37-38-46";

                teclado_especial = false;
                for (var i in especiales) {
                    if (key == especiales[i]) {
                        teclado_especial = true; break;
                    }
                }
                if (dire.indexOf(teclado) == -1 && !teclado_especial) {
                    return false;
                }
      }
     </script>

     <script type="text/javascript">
function des_pe(evento){

   key = evento.keyCode || evento.which;
    teclado = String.fromCharCode(key).toLocaleLowerCase();
       des = "abcdefghijklmnñopqrstuvwxyz";
         especiales = "37-38-46";

         teclado_especial = false;
         for (var i in especiales) {
             if (key == especiales[i]) {
                 teclado_especial = true; break;
             }
         }
         if (des.indexOf(teclado) == -1 && !teclado_especial) {
             return false;
         }
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
