<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Ver Devoluciones</title>
   
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
        <!-- End of -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

           <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Devoluciones</h1>
            <button type="button" class="btn btn-default dropdown-toggle d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"
              data-toggle="dropdown"><i
                class="fas fa-download fa-sm text-white-50"></i>  Generar Reporte</button>

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

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Numero</th>
                      <th>Descripcion</th>
                      <th>Nombre producto</th>
                      <th>Nombre cliente </th>
                      <th>Cedula</th>
                      <th>Fecha</th>
                      <th>Estado</th>
                      <th>Modificar</th>
                      <th>Opción</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                    <tr>
                      <th>Numero</th>
                      <th>Descripcion</th>
                      <th>Nombre producto</th>
                      <th>Nombre cliente </th>
                      <th>Cedula</th>
                      <th>Fecha</th>
                      <th>Estado</th>
                      <th>Modificar</th>
                      <th>Opción</th>
                    </tr>
                    </tr>
                  </tfoot>
                  <tbody>
                    <?php require ("../basededatos/listad.php");?>

                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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

    <!-- Page level custom scripts -->
    <script src="Exportar_Excel.js"></script>

      <!-- Export Multi-Scripts -->
      <?php
      require('export.php');
    ?>

</body>

</html>