<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Ver Productos</title>

  <?php
  require('Style.php');
  ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
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
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Productos</h1>
            <button type="button" class="btn btn-default dropdown-toggle d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="dropdown"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</button>

            <ul class="dropdown-menu" role="menu">
              <li><a href="#" class="dropdown-item" onClick="doExport('#dataTable', {type: 'txt'});"><img src='icons/txt.png' alt="TXT" style="width:24px">TXT</a></li>
              <li><a href="#" class="dropdown-item" onClick="doExport('#dataTable', {type: 'json'});"> <img src='icons/json.png' alt="JSON" style="width:24px"> JSON</a></li>
              <li><a href="#" class="dropdown-item" onClick="doExport('#dataTable', {type: 'xml'});"> <img src='icons/xml.png' alt="XML" style="width:24px"> XML</a></li>
              <li><a href="#" class="dropdown-item" onClick="doExport('#dataTable', {type: 'sql'});"> <img src='icons/sql.png' alt="SQL" style="width:24px"> SQL</a></li>
              <li><a href="#" class="dropdown-item" onClick="doExport('#dataTable', {type: 'doc'});"> <img src='icons/word.png' alt="Word" style="width:24px"> Word</a></li>
              <li><a href="#" class="dropdown-item" onClick="doExport('#dataTable', {type: 'xlsx'});"> <img src='icons/xls.png' alt="XLSX" style="width:24px"> Excel</a></li>
              <li><a href="#" class="dropdown-item" onClick="doExport('#dataTable', {type: 'pdf', jspdf: {autotable: {tableWidth: 'wrap'}}});"><img src='icons/pdf.png' alt="PDF" style="width:24px"> PDF</a></li>
              <li><a href="#" class="dropdown-item" onClick="doExport('#dataTable', {type: 'png'});"> <img src='icons/png.png' alt="PNG" style="width:24px"> PNG</a></li>
            </ul>

          </div>

          <p class="mb-4">Aqui encontrara información acerca de los productos</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>


            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" id="Productos_Ver" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Sabor</th>
                      <th>Descripcion</th>
                      <th>Stock</th>
                      <th>Estado</th>
                      <th>Modificar</th>
                      <th>Opción</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>Sabor</th>
                      <th>Descripcion</th>
                      <th>Stock</th>
                      <th>Estado</th>
                      <th>Modificar</th>
                      <th>Opción</th>
                    </tr>
                  </tfoot>
                  <tbody>

                    <?php require("../basededatos/listapv.php"); ?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <a class="btn btn-primary" href="Productos_Vertodos.php">Ver todos</a>
        </div>


      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php
      require('footer.php');
      ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.html">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>


  <!-- Export Multi-Scripts -->
  <?php
  require('export.php');
  ?>

</body>

</html>
<?php }
else if(!(isset($_SESSION['cl']))){
  ?>
<script>
alert('Primero inicie sesión');
  window.location.href='../login/index.php';
</script><?php
}
 ?>