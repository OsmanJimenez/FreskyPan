<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Lotes</title>

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

  <title>Lotes - ERP</title>

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

        <!--Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Agregar producciones</h1>
          <p class="mb-4">En este apartado podremos agregar distintas producciones</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Produccion</h6>
            </div>
            <div class="card-body">
              <!-- Add Example -->
              <form action="../basededatos/editarlo.php" method="POST">
                <div class="form-row">


                </div>
            </div>
            <?php require ("../basededatos/connectionbd.php");
$cd=$_GET['id'];
$fe=$_GET['fec'];
$ca=$_GET['ca'];
$query2="Select * from produccion where ID_PRODUCCION='$cd' and fechaProduccion='$fe'";
$result2=mysqli_query($conn,$query2);
                             while($fila2=mysqli_fetch_array($result2)){
        $Stock=$fila2['cantidadInicial'];
         }
?>
            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="inputState">Productos</label>


                <table class="table table-bordered" id="datasTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nombre del producto</th>
                      <th>Id del producto</th>
                      <th>Categoria</th>
                      <th>Sabor</th>
                      <th>Descripcion</th>
                      <th></th>
                      <th></th>
                      <th></th>
                    </tr>
                  </thead>

                  <tbody>

                    <?php require ("../basededatos/listapv3.php");?>


                  </tbody>
                </table>


              </div>
              <div class="form-group col-md-2 text-center">
                <div class="space-small"></div>
                <button type="submit" class="btn btn-primary ">Agregar </button>
                <div class="space-small"></div>

              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Unidades</label>
                  <input type="number" value="<?php echo $Stock;?>" name="st" class="form-control" id="inputName"
                  maxlength="11" onkeypress="return uni_lo(event)" oninput="maxlengthNumber(this)" onpaste="return false"  placeholder="">

                  <input type="hidden" name="id" id="prueba" readonly="">
                  <input type="hidden" name="idl" value="<?php echo $cd;?>">
                  <input type="hidden" name="fece" value="<?php echo $fe;?>">
                  <input type="hidden" name="can" value="<?php echo $ca;?>">
                  <br>

                  <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#myModal">Actualizar</button>

                  <!-- Modal -->
                  <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Confirmar</h4>
                        </div>
                        <div class="modal-body">
                          <p>Esta seguro</p>
                        </div>
                        <div class="modal-footer">
                          <button type="submit" class="btn btn-primary">Si</button>
                          <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>




                </form>

                <!--End  Add Example -->
              </div>
            </div>

          </div>
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
    function uni_lo(evento){

        key = evento.keyCode || evento.which;
         teclado = String.fromCharCode(key).toLocaleLowerCase();
            uni= "1234567890";
              especiales = "37-38-46";

              teclado_especial = false;
              for (var i in especiales) {
                  if (key == especiales[i]) {
                      teclado_especial = true; break;
                  }
              }
              if (uni.indexOf(teclado) == -1 && !teclado_especial) {
                  return false;
              }
    }
    </script>
          <!-- /.container-fluid -->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
