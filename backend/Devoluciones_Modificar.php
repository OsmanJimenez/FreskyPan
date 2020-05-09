<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Devoluciones</title>

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

  <title>Devoluciones - ERP</title>

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

<div id="wrapper">

  <!-- Sidebar -->
  <?php
    require('menu.php');
    ?>
  <!-- End of Sidebar -->
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
        <h1 class="h3 mb-2 text-gray-800">Agregar Devoluciones</h1>
        <p class="mb-4">En este apartado podremos agregar distintos devoluciones que se generen</a>.</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Devoluciones</h6>
          </div>
          <div class="card-body">
            <!-- Add Example -->

            <form action="../basededatos/agregad.php" method="POST">
              <div class="form-row">
                <div class="form-group col-md-8">
            <?php
require ("../basededatos/connectionbd.php");
$mic=$_GET['id4'];
$query="Select devolucion.can_dev,pedidos.cod_pro,pedidos.Fec_ped,devolucion.cod_con,devolucion.est_dev,devolucion.cod_dev,devolucion.des_dev,productos.nom_pro,clientes.nom_cl,clientes.ced_cl,devolucion.fec_dev from devolucion,productos,clientes,pedidos WHERE devolucion.cod_dev='$mic' and devolucion.cod_con=pedidos.Id_ped AND pedidos.ced_cl=clientes.ced_cl AND pedidos.cod_pro=productos.cod_pro ";
$result=mysqli_query($conn,$query);

$i = 0;

      while($fila=mysqli_fetch_array($result)){
        $tip = $fila['cod_dev'];
        $cod = $fila['des_dev'];
        $fec=$fila['nom_pro'];
        $ced_cl=$fila['nom_cl'];
                $hor_ent=$fila['ced_cl'];
                $fec_ent=$fila['fec_dev'];
                $est=$fila['est_dev'];
                $code=$fila['cod_con'];
                $feca=$fila['Fec_ped'];
                $dev=$fila['can_dev'];
                $i++;
        ?>
                  <label for="inputName">Codigo de Devolución</label>
                  <input type="text" name="cd" value="<?php echo $mic; ?>" class="form-control" maxlength="11" oninput="maxlengthNumber(this)" onkeypress="return cod_devo(event)" onpaste="return false" id="inputName" placeholder="" required="">
                </div>
                <div class="form-group col-md-4">
                  <label for="inputName">Fecha</label>
                  <input type="date" value="<?php echo $fec_ent; ?>" id="inputName" class="form-control" name="fec" width="100%" />
                </div>
              </div>





              <div class="form-row">
                <div class="form-group col-md-8">
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th></th>
                          <th>Codigo de pedido</th>
                          <th>Fecha</th>
                          <th>Cedula del cliente</th>
                          <th>Codigo del producto</th>
                          <th>Cantidad</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th></th>
                        <th>Codigo de pedido</th>
                          <th>Fecha</th>
                          <th>Cedula del cliente</th>
                          <th>Codigo del producto</th>
                          <th>Cantidad</th>
                           <th></th>
                          <th></th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <?php require ("../basededatos/listap3.php");?>
                      </tbody>
                    </table>
                  </div>
                </div>



                <div class="form-group col-md-4">
                <label for="inputPrice" >Codigo del pedido</label>
                  <input type="number"  value="<?php echo $code; ?>" name="cod" readonly="" class="form-control" id="inputrice" placeholder="" required="">
                  <label for="inputCantidad" >Cedula del cliente</label>
                  <input type="number"  readonly="" value="<?php echo $hor_ent; ?>" class="form-control" id="inputCantidad1" placeholder="" required="">
                  <label for="inputCantidad">Fecha de compra</label>
                  <input type="date"  name="fecha" value="<?php echo $feca; ?>"  class="form-control" id="inputCantidad2" placeholder="" required="">
                  <label for="inputCantidad">Codigo del producto</label>
                  <input type="number" name="id"readonly="" value="<?php echo $cod_pro; ?>" class="form-control" id="inputCantidad3" placeholder="" required="">
                  <label for="inputCantidad">Cantidad del pedido</label>
                  <input type="number" name="can"  value="<?php echo $dev; ?>" class="form-control" id="inputCantidad4" placeholder="" required="">
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">


                  <label for="exampleFormControlTextarea1">Descripción de la devolución</label>
                  <textarea class="form-control" name="des" id="exampleFormControlTextarea1" maxlength="30"  onkeypress="return des_devo(event)" onpaste="return false" rows="3"></textarea>
                    <br>

                    <br>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Añadir</button>

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
                      <p>Esta seguro?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Si</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                  </div>

                </div>
              </div>
                </div>
              <?php }?>
            </form>

            <!--End  Add Example -->
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
  function cod_devo(evento){

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
  function des_devo(evento){

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
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script>
        function cambia(text) {
          //  var text = document.getElementById('sd').value;
          document.getElementById('inputrice').value = text;
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
                document.getElementById('inputrice').value = valores;}
                if(flag==3){
                document.getElementById('inputCantidad2').value = valores;
                }
                if(flag==4){
                document.getElementById('inputCantidad1').value = valores;}
                if(flag==5){
                document.getElementById('inputCantidad3').value = valores;}
                   if(flag==6){
                document.getElementById('inputCantidad4').value = valores;}
                flag+=1;
                console.log(valores);
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
