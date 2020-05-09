<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Agregar Proveedores</title>

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

  <title>Proveedores - Freskypan</title>

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
        <!-- End of -->

       <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Agregar Proveedores</h1>
          <p class="mb-4">En este apartado podremos agregar distintos proveedores</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Proveedores</h6>
            </div>
            <div class="card-body">
              <!-- Add Example -->
              <form action="../basededatos/agregarc.php" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputName">Numero de Cedula</label>
                    <input type="text" class="form-control" id="inputName" name="ced"maxlength="15" oninput="maxlengthNumber(this)" onkeypress="return numCed(event)" onpaste="return false" placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPrice">Telefono</label>
                    <input type="number" name="tel" class="form-control" id="inputrice" maxlength="10" oninput="maxlengthNumber(this)" onkeypress="return numTel"onpaste="return false" placeholder="">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCantidad">Nombre</label>
                    <input type="text" name="nom" class="form-control" id="inputCantidad" maxlength="10"onkeypress="return Nom_1(event)"  onpaste="return false" placeholder="">
                  </div>
                  <div class="form-group col-md-3">

                    <label for="inputCantidad">Primer Apellido</label>
                    <input type="text" name="a1" class="form-control" id="inputCantidad" maxlength="15" onkeypress="return Pr_ap(event)"  onpaste="return false"  placeholder="">
                  </div>
                  <div class="form-group col-md-3">

                    <label for="inputCantidad">Segundo Apellido</label>
                    <input type="text" name="a2" class="form-control" id="inputCantidad" maxlength="15"onkeypress="return Seg_ap(event)" onpaste="return false" placeholder="">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputName">Segundo Nombre</label>
                    <input type="text" name="nom2" class="form-control" id="inputName" maxlength="15" onkeypress=" return Nom_2(event)" onpaste="return false" placeholder="">
                    <div class="space-small"></div>
                    <label for="exampleFormControlTextarea1">Correo electronico</label>
                    <input type="email" name="cor" class="form-control" id="inputName" placeholder="" required="">
                    <div class="space-small"></div>
                    <label for="inputState">Estado</label>
                  <select id="inputState" name="est" class="form-control">
                    <option selected>Escoger</option>
                    <option value="1">Activo</option>
                    <option value="0">Suspendido</option>
                  </select>

                  </div>
                  <div class="form-group col-md-6 text-center">
                    <img src="../img/Captura.PNG">
                   <!-- <iframe
                      src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d15913.82878315453!2d-74.37047654999999!3d4.324887749999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses!2sco!4v1570575086503!5m2!1ses!2sco"
                      width="400" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe> -->
                  </div>


                </div>




                <button type="submit" class="btn btn-primary">Agregar</button>
              </form>

              <!--End  Add Example -->
            </div>
          </div>

        </div>
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
  function numCed(evento){

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
  function numTel(evento){

      key = evento.keyCode || evento.which;
       teclado = String.fromCharCode(key).toLocaleLowerCase();
          tel= "1234567890";
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

        <script type="text/javascript">
  function Nom_1(evento){

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
</script>
<!-- validacion de texto-->

       <script type="text/javascript">
 function Nom_2(evento){

     key = evento.keyCode || evento.which;
      teclado = String.fromCharCode(key).toLocaleLowerCase();
         nom2 = "abcdefghijklmnñopqrstuvwxyz";
           especiales = "37-38-46";

           teclado_especial = false;
           for (var i in especiales) {
               if (key == especiales[i]) {
                   teclado_especial = true; break;
               }
           }
           if (nom2.indexOf(teclado) == -1 && !teclado_especial) {
               return false;
           }
 }
</script>
  <script type="text/javascript">
  function Pr_ap(evento){

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
            if (a1.indexOf(teclado) == -1 && !teclado_especial) {
                return false;
            }
  }


 </script>
  <script type="text/javascript">
  function Seg_ap(evento){

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
