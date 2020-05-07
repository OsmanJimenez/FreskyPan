<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Contratos</title>

  <!-- Font-->
  <link rel="stylesheet" type="text/css" href="css/roboto-font.css">
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-5/css/fontawesome-all.min.css">
  <!-- Main Style Css -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/style2.css" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <!-- Custom favicon for this template-->
  <link rel="icon" type="image/png" href="../favicon.png" />

  <title>Contratos - Agregar</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom calendar -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

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
          <h1 class="h3 mb-2 text-gray-800">Agregar Contratos</h1>
          <p class="mb-4">En este apartado podremos agregar distintos contratos</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Contratos</h6>
            </div>
            <div class="card-body">
              <!-- Add Example -->
              <form action="../basededatos/agregaco.php" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputName">Codigo del Contrato</label>
                    <input type="text" name="cod" class="form-control"  maxlength="11" id="inputCantidad" oninput="maxlengthNumber(this)" onkeypress="return cod_cont(event)"  onpaste="return false" id="inputName" placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputState">Tipo de Contrato</label>
                    <select id="inputState" name="tip" class="form-control">
                      <option selected>Escoger</option>
                      <option>Dia</option>
                      <option>Semana</option>
                      <option>Mes</option>
                    </select>
                  </div>
                </div>
                <div class="form-row">

                  <div class="form-group col-md-10">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Cedula</th>
                          <th>Nombre</th>
                          <th>Apellido</th>

                          <th>Telefono</th>
                          <th>Direccion</th>

                        </tr>
                      </thead>

                      <tbody>

                        <?php require ("../basededatos/listac2.php");?>


                      </tbody>
                    </table>
                  </div>


                  <div class="form-group col-md-6">
                    <label for="inputCantidad">Numero de Cedula</label>
                    <input type="number" class="form-control"name="ced" maxlength="15" id="inputCantidad" oninput="maxlengthNumber(this)" onkeypress="return num_ced(event)" onpaste="return false"  placeholder="">

                    <label for="inputCantidad">Nombre</label>
                    <input type="text" class="form-control" name="nom" maxlength="10" id="inputCantidad" onkeypress="return val_Nom(event)"  onpaste="return false"  placeholder="">

                    <label for="inputCantidad">Primer Apellido</label>
                    <input type="text" class="form-control" name="a1" maxlength="10" id="inputCantidad" onkeypress="return pr_Ap(event)"  onpaste="return false" placeholder="">

                    <label for="inputCantidad">Segundo Apellido</label>
                    <input type="text" class="form-control" name="a2" maxlength="15" id="inputCantidad" onkeypress="return seg_Ap(event)"  onpaste="return false" placeholder="">

                    <label for="inputCantidad">Telefono</label>
                    <input type="number" class="form-control" name="tel" maxlength="10" id="inputCantidad" oninput="maxlengthNumber(this)" onkeypress="return val_tel(event)"  onpaste="return false" placeholder="">

                    <label for="inputCantidad">Dirección</label>
                    <input type="text" class="form-control" id="inputCantidad" placeholder="">
                  </div>


                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputName">Fecha de Entrega</label>
                    <input type="date" name="fec" class="form-control" id="inputName" placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputName">Hora de Entrega</label>
                    <input type="date" name="hor" class="form-control" id="inputName" placeholder="">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-10">
                    <label for="inputState">Pedido</label>


                    <table class="table table-bordered" id="datasTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Numero de pedido</th>
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

                        <?php require ("../basededatos/listap2.php");?>


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



                <input type="hidden" name="id" id="prueba" readonly="">
                <input type="hidden" name="id2" id="prueba2" readonly="">
                <button type="submit" class="btn btn-primary">Agregar</button>
              </form>

              <!--End  Add Example -->
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
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

        <!-- validacion de longitud de campo y texto-->
      <script>

      function maxlengthNumber(ob){
        console.log(ob.value);

        if(ob.value.length > ob.maxLength){

          ob.value = ob.value.slice(0,ob.maxLength);
        }
      }
    </script>

    <script type="text/javascript">
 function cod_cont(evento){

     key = evento.keyCode || evento.which;
      teclado = String.fromCharCode(key).toLocaleLowerCase();
         cod = "1234567890";
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
  function num_ced(evento){

      key = evento.keyCode || evento.which;
       teclado = String.fromCharCode(key).toLocaleLowerCase();
          ced = "1234567890";
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
function val_tel(evento){

  key = evento.keyCode || evento.which;
   teclado = String.fromCharCode(key).toLocaleLowerCase();
      tel = "1234567890";
        especiales = "37-38-46";

        teclado_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true; break;
            }
        }
        if (tel.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
        }
}
</script>
<!-- validacion de texto-->

</script>

    <script type="text/javascript">
  function val_Nom(evento){

      key = evento.keyCode || evento.which;
       teclado = String.fromCharCode(key).toLocaleLowerCase();
          nom = "abcdefghijklmnñopqrstuvwxyz";
            especiales = "37-38-46";

            teclado_especial = false;
            for (var i in especiales) {
                if (key == especiales[i]) {
                    teclado_especial = true; break;
                }
            }
            if (nom.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
            }
  }
 </script>
 <script type="text/javascript">
function pr_Ap(evento){

   key = evento.keyCode || evento.which;
    teclado = String.fromCharCode(key).toLocaleLowerCase();
       a1 = "abcdefghijklmnñopqrstuvwxyz";
         especiales = "37-38-46";

         teclado_especial = false;
         for (var i in especiales) {
             if (key == especiales[i]) {
                 teclado_especial = true; break;
             }
         }
         if (a2.indexOf(teclado) == -1 && !teclado_especial) {
             return false;
         }
}
</script>
<script type="text/javascript">
function seg_Ap(evento){

  key = evento.keyCode || evento.which;
   teclado = String.fromCharCode(key).toLocaleLowerCase();
      a2 = "abcdefghijklmnñopqrstuvwxyz";
        especiales = "37-38-46";

        teclado_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true; break;
            }
        }
        if (a2.indexOf(teclado) == -1 && !teclado_especial) {
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
