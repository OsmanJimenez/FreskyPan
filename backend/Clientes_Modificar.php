<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Modificar Clientes</title>
   
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

  <title>Clientes - ERP</title>

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
          <h1 class="h3 mb-2 text-gray-800">Agregar Clientes</h1>
          <p class="mb-4">En este apartado podremos agregar distintos clientes</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
            </div>
            <div class="card-body">
              <!-- Add Example -->
              <?php
require ("../basededatos/connectionbd.php");
$mic=$_GET['id'];
$query="Select * from proveedor,telefono where ID_PROVEEDOR='$mic' and telefono.FK_ID_PROVEEDOR=proveedor.ID_PROVEEDOR ";
$result=mysqli_query($conn,$query);
$i = 0;
      
      while($fila=mysqli_fetch_array($result)){     
        $Nom = $fila['prNombre'];
        $Nom2 = $fila['segNombre'];
        $cod = $fila['ID_PROVEEDOR'];
        $a1 = $fila['prApellido']; 
        $a2 = $fila['segApellido'];
        $tel = $fila['ID_TELEFONO'];
        $cor = $fila['correo'];
        $est = $fila['estado'];
        $val="";
        if($est=="1"){
        $val="Activado";
        }else if ($est==0){

          $val="Suspendido";
        }
        $i++; ?>
              <form action="../basededatos/actuac.php" method="POST">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputName">Numero de Cedula</label>
                    <input type="text" value="<?php echo $cod;?>" class="form-control" id="inputName" name="ced"
                      placeholder="Numero de Cedula" readonly="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPrice">Telefono</label>
                    <input type="number" value="<?php echo $tel;?>" name="tel" class="form-control" id="inputrice"
                      placeholder="Telefono">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCantidad">Nombre</label>
                    <input type="text" value="<?php echo $Nom;?>" name="nom" class="form-control" id="inputCantidad"
                      placeholder="Nombre">
                  </div>
                  <div class="form-group col-md-3">

                    <label for="inputCantidad">Primer Apellido</label>
                    <input type="text" name="a1" value="<?php echo $a1;?>" class="form-control" id="inputCantidad"
                      placeholder="Primer Apellido">
                  </div>
                  <div class="form-group col-md-3">

                    <label for="inputCantidad">Segundo Apellido</label>
                    <input type="text" name="a2" class="form-control" value="<?php echo $a2;?>" id="inputCantidad"
                      placeholder="Segundo Apellido">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputName">Segundo Nombre</label>
                    <input type="text" name="nom2" value="<?php echo $Nom2;?>" class="form-control" id="inputName"
                      placeholder="Dirección">
                    <div class="space-small"></div>
                    <label for="exampleFormControlTextarea1">Correo electronico</label>
                    <input type="email" name="cor" class="form-control" id="inputName" placeholder="" required="" value="<?php echo $cor; ?>">
                    <div class="space-small"></div>
                    <label for="inputState">Estado</label>

                    <select id="inputState" name="est" value="<?php echo $est; ?>" class="form-control">
                    <option>Escoger</option>
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

                <?php }?>


                <button type="submit" class="btn btn-primary">Actualizar</button>
              </form>

              <!--End  Add Example -->
            </div>
          </div>

        </div>
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