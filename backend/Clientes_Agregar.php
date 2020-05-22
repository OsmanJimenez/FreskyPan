<?php
session_start();
 if((isset($_SESSION['cl']))){ 
require ("../basededatos/connectionbd.php");
$codg="Select MAX(ID_PROVEEDOR) as idc from PROVEEDOR";
$res=mysqli_query($conn,$codg);
$file=mysqli_fetch_array($res);
if((mysqli_num_fields($res))>0){
$codg2=intval($file['idc'])+1;
}else if((mysqli_num_fields($res))==0){
$codg2=1;
}
  ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>Agregar Proveedores</title>

  <!-- Style -->
  <?php
  require('Style.php');
  ?>

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
                    <label for="inputName">Número de Cedula</label>
                    <input type="text" class="form-control" id="inputName" name="ced" maxlength="15" oninput="maxlengthNumber(this)"  readonly="" value=" <?php echo $codg2; ?>" onkeypress="return numCed(event)" onpaste="return false" placeholder="">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPrice">Telefono</label>
                    <input type="number" name="tel" class="form-control" id="inputrice" maxlength="10" oninput="maxlengthNumber(this)" onkeypress="return numTel(event)" onpaste="return false" placeholder="" required="">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="inputCantidad">Nombre</label>
                    <input type="text" name="nom" class="form-control" id="inputCantidad" maxlength="10" onkeypress="return Nom_1(event)" onpaste="return false" placeholder="">
                  </div>
                  <div class="form-group col-md-3">
                  <label for="inputName">Segundo Nombre</label>
                    <input type="text" name="nom2" class="form-control" id="inputName" maxlength="15" onkeypress=" return Nom_2(event)" onpaste="return false" placeholder="">
                    </div>
                  <div class="form-group col-md-3">
                    <label for="inputCantidad">Primer Apellido</label>
                    <input type="text" name="a1" class="form-control" id="inputCantidad" maxlength="15" onkeypress="return Pr_ap(event)" onpaste="return false" placeholder="">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="inputCantidad">Segundo Apellido</label>
                    <input type="text" name="a2" class="form-control" id="inputCantidad" maxlength="15" onkeypress="return Seg_ap(event)" onpaste="return false" placeholder="">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="exampleFormControlTextarea1">Correo electronico</label>
                    <input type="email" name="cor" class="form-control" id="inputName" placeholder="" required="">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputState">Estado</label>
                    <select id="inputState" name="est" class="form-control">
                      <option value="1">Activo</option>
                      <option value="0">Suspendido</option>
                    </select>
                  </div>
                 
                </div>
                <button type="submit" class="btn btn-primary float-right">Agregar</button>
              </form>

              <!--End  Add Example -->
            </div>
          </div>
        </div>

       <!-- Validation -->
      <?php
      require('Validation.php');
      ?>
      <!-- End Validation --> 

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

        <!-- MultiSelect -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.2/js/bootstrap.min.js"></script>
</body>

</html>
<?php }
require('llenar3.php');
 ?>