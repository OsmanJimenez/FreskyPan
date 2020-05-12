<?php
session_start();
 if((isset($_SESSION['cl']))){ ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Registro de Actividades</title>

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
            <h1 class="h3 mb-0 text-gray-800">Producción</h1>
            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="exportTableToExcel('dataTable' ,'Lista_Producción')"><i class="fas fa-download fa-sm text-white-50"></i> Generar Reporte</button>

          </div>
          <p class="mb-4">Aqui encontrara información acerca de los cambios efectuados en el sistema</a>.</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Lista de Actividades</h6>
            </div>


            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" id="Productos_Ver" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>ID Usuario</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Descripción</th>
                      <th>Modulo Afectado</th>



                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>ID Usuario</th>
                      <th>Fecha</th>
                      <th>Hora</th>
                      <th>Descripción</th>
                      <th>Modulo Afectado</th>


                    </tr>
                  </tfoot>
                  <tbody>

                    <?php require("../basededatos/listalo.php"); ?>
                    <!-- De aqui traen los botones eso, no los quite del php para no afectar la estetica, pero cuando usds creen el php ya no les saldran los botones -->

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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Está Seguro?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccionar "Cerrar sesión" a continuación si está listo para finalizar tu sesión actual.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="../salir.php">Cerrar Sesión</a>
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
<script src="js/script.js"></script>

  <!-- Page level custom scripts -->
  <script src="Exportar_Excel.js"></script>

</body>

</html>
<?php }
require('llenar3.php');
 ?>