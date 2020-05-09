<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Bodegas</title>

  <!-- Style -->
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
      <?php require ("../basededatos/connectionbd.php");
        $id=$_GET['id'];
        $query="SELECT descripcion,estado FROM Bodega WHERE ID_BODEGA='$id'";
        $result=mysqli_query($conn,$query);

        $fila=mysqli_fetch_array($result);
        $des = $fila['descripcion'];
        $estado = $fila['estado'];
        ?>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Modificar Bodegas</h1>
        <p class="mb-4">En este apartado podremos modificar las Bodegas registradas en el sistema</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bodegas</h6>
          </div>
          <div class="card-body">
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/actuabg.php" method="POST" enctype="multipart/form-data">
              <label for="inputName">Codigo de la Bodega</label>
              <input type="number" name="cod" value="<?php echo $id; ?>" class="form-control" id="inputName" maxlength="11" oninput="maxlengthNumber(this)" onkeypress="return Cod_bo(event)" onpaste="return false" placeholder="" readonly="readonly">

              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripción</label>
                    <textarea name="des" class="form-control" id="exampleFormControlTextarea1" rows="3" maxlength="30" onkeypress="return des_1(event)" onpaste="return false" required><?php echo $des; ?></textarea>
                  </div>
                </div>


                <div class="form-group col-md-6">
                  <label for="inputState">Estado</label>
                  <select id="inputState" name="est" class="form-control" disabled>
                    <?php if($estado=="0"){ ?>
                    <option value="1">Activo</option>
                    <option selected value="0">Suspendido</option>
                    <?php }else{ ?>
                    <option selected value="1">Activo</option>
                    <option value="0">Suspendido</option>
                    <?php } ?>
                  </select>
                </div>
              </div>

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Actualizar</button>

              <!-- Modal -->
              <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                    <h4 class="modal-title">Confirmar</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>

                    </div>
                    <div class="modal-body">
                      <p>Está seguro?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Sí</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                  </div>

                </div>
              </div>
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
        function Cod_bo(evento){

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
       <!-- validacion de texto-->

              <script type="text/javascript">
        function des_1(evento){

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
