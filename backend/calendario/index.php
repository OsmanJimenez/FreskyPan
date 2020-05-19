<?php
session_start();
 if((isset($_SESSION['cl']))){ 
$rol = $_SESSION['cl']['rol'];
// Definimos nuestra zona horaria
date_default_timezone_set("America/Bogota");

// incluimos el archivo de funciones
include 'funciones.php';

// incluimos el archivo de configuracion
include 'config.php';

// Verificamos si se ha enviado el campo con name from
if (isset($_POST['from'])) {

  // Si se ha enviado verificamos que no vengan vacios
  if ($_POST['from'] != "" and $_POST['to'] != "") {

    // Recibimos el fecha de inicio y la fecha final desde el form
    $Datein                    = date('d/m/Y H:i:s', strtotime($_POST['from']));
    $Datefi                    = date('d/m/Y H:i:s', strtotime($_POST['to']));
    $inicio = _formatear($Datein);
    // y la formateamos con la funcion _formatear

    $final  = _formatear($Datefi);

    // Recibimos el fecha de inicio y la fecha final desde el form
    $orderDate                      = date('d/m/Y H:i:s', strtotime($_POST['from']));
    $inicio_normal = $orderDate;

    // y la formateamos con la funcion _formatear
    $orderDate2                      = date('d/m/Y H:i:s', strtotime($_POST['to']));
    $final_normal  = $orderDate2;

    // Recibimos los demas datos desde el form
    $titulo = evaluar($_POST['title']);

    // y con la funcion evaluar
    $body   = evaluar($_POST['event']);

    // reemplazamos los caracteres no permitidos
    $clase  = evaluar($_POST['class']);

    // insertamos el evento
    $query = "INSERT INTO agenda( `title`, `body`, `url`, `class`, `start`, `end`, `inicio_normal`, `final_normal`) VALUES('$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";

    // Ejecutamos nuestra sentencia sql
    $conexion->query($query) or die('<script type="text/javascript">alert("Horario No Disponible ")</script>');
    header("Location:$base_url");
   

    // Obtenemos el ultimo id insetado
    $im = $conexion->query("SELECT MAX(id) AS id FROM agenda");
    $row = $im->fetch_row();
    $id = trim($row[0]);

    // para generar el link del evento
    $link ="descripcion_evento.php?id=$id";

    // y actualizamos su link
    $query = "UPDATE agenda SET url = '$link' WHERE id = $id";

    // Ejecutamos nuestra sentencia sql
    $conexion->query($query);
  
    $ids = $_SESSION['cl']['id_u'];
    $actua=date("Y-m-d");
    $fecha=date("Y-m-d",strtotime($actua." - 1 days") );
    $horario = new DateTime("now", new DateTimeZone('America/Bogota'));
    $hora="".$horario->format('H:i');
    $desc="Se ha añadido un nuevo evento con el titulo ".$titulo;
    $query90="INSERT INTO log(fecha, hora, descripcion, FK_ID_USUARIO) VALUES ('$fecha','$hora','$desc','$ids')";
    $conexion->query($query90);

    
    // redireccionamos a nuestro calendario
    //header("Location:$base_url"); 
  }
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Calendario</title>
  <link rel="stylesheet" type="text/css" href="css/calendar.css">
  <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <script type="text/javascript" src="js/es-ES.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/moment.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/bootstrap-datetimepicker.js"></script>
  <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />

  <!-- Font-->
  <link rel="stylesheet" type="text/css" href="../css/roboto-font.css">
  <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-5/css/fontawesome-all.min.css">
  <!-- Search css-->
  <link rel="stylesheet" type="text/css" href="../css/style4.css">
  <!--End Search css-->  

  <!-- Custom favicon for this template-->
  <link rel="icon" type="image/png" href="../../favicon.png" />

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.css" rel="stylesheet">

  <!-- Custom calendar -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <?php
  require('../Style.php');
  ?>
</head>

<body id="page-top" style="background: white;">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-design sidebar sidebar-light accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Panaderia <sup>ERP</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Administración</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interfaz
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="far fa-folder-open "></i>
          <span>Productos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Productos:</h6>
            <a class="collapse-item" href="../Productos_Agregar.php">Agregar</a>
            <a class="collapse-item" href="../Productos_Ver.php">Ver</a>
          </div>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tipos de Productos:</h6>
            <a class="collapse-item" href="../TipoP_Agregar.php">Agregar</a>
            <a class="collapse-item" href="../TipoP_Ver.php">Ver</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLotes" aria-expanded="true" aria-controls="collapseCuentas">
          <i class="far fa-chart-bar"></i>
          <span>Producción</span>
        </a>
        <div id="collapseLotes" class="collapse" aria-labelledby="headingLotes" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Producción:</h6>
            <a class="collapse-item" href="../lotes_agregar.php">Agregar</a>
            <a class="collapse-item" href="../lotes_ver.php">Ver</a>
          </div>
        </div>
        <div id="collapseLotes" class="collapse" aria-labelledby="headingLotes" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ventas:</h6>
            <a class="collapse-item" href="../Ventas_Agregar.php">Agregar</a>
            <a class="collapse-item" href="../Ventas_Ver.php">Ver</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventarios" aria-expanded="true" aria-controls="collapseInventarios">
          <i class="fas fa-boxes"></i>
          <span>Inventario</span>
        </a>
        <div id="collapseInventarios" class="collapse" aria-labelledby="headingBodegas" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Bodega:</h6>
            <a class="collapse-item" href="../Bodegas_Agregar.php">Agregar</a>
            <a class="collapse-item" href="../Bodegas_Ver.php">Ver</a>
          </div>
        </div>
        <div id="collapseInventarios" class="collapse" aria-labelledby="headingMateria" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Materia Prima:</h6>
            <a class="collapse-item" href="../Materia_Agregar.php">Agregar</a>
            <a class="collapse-item" href="../Materia_Ver.php">Ver</a>
          </div>
        </div>
        <div id="collapseInventarios" class="collapse" aria-labelledby="headingInsumos" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Insumo:</h6>
            <a class="collapse-item" href="../Insumo_Agregar.php">Agregar</a>
            <a class="collapse-item" href="../Insumo_Ver.php">Ver</a>
          </div>
        </div>
        <div id="collapseInventarios" class="collapse" aria-labelledby="headingInsumos" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Suministro:</h6>
            <a class="collapse-item" href="../Suministro_Agregar.php">Agregar</a>
            <a class="collapse-item" href="../Suministro_Ver.php">Ver</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContacts" aria-expanded="true" aria-controls="collapseContacts">
          <i class="far fa-address-card"></i>
          <span>Proveedores</span>
        </a>
        <div id="collapseContacts" class="collapse" aria-labelledby="headingContacts" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Proveedores:</h6>
            <a class="collapse-item" href="../Clientes_Agregar.php">Agregar</a>
            <a class="collapse-item" href="../Clientes_Ver.php">Ver</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCuentas" aria-expanded="true" aria-controls="collapseCuentas">
          <i class="far fa-calendar-alt"></i>
          <span>Pedidos</span>
        </a>
        <div id="collapseCuentas" class="collapse" aria-labelledby="headingCuentas" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pedidos:</h6>
            <a class="collapse-item" href="../Pedidos_Agregar.php">Agregar</a>
            <a class="collapse-item" href="../Pedidos_ver.php">Ver</a>
          </div>
        </div>
        <div id="collapseCuentas" class="collapse" aria-labelledby="headingCuentas" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Facturas:</h6>
            <a class="collapse-item" href="../Facturas_agregar.php">Agregar</a>
            <a class="collapse-item" href="../Facturas_ver.php">Ver</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDevoluciones" aria-expanded="true" aria-controls="collapseDevoluciones">
          <i class="far fa-edit"></i>
          <span>Devoluciones</span>
        </a>
        <div id="collapseDevoluciones" class="collapse" aria-labelledby="headingDevoluciones" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Devoluciones:</h6>
            <a class="collapse-item" href="../Devoluciones_Agregar.php">Agregar</a>
            <a class="collapse-item" href="../Devoluciones_Ver.php">Ver</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHerramientas" aria-expanded="true" aria-controls="collapseCuentas">
          <i class="fas fa-paste"></i>
          <span>Herramientas</span>
        </a>
        <div id="collapseHerramientas" class="collapse" aria-labelledby="headingHerramientas" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Hojas:</h6>
            <a class="collapse-item" href="../Tools_Documentos.php">Documentos</a>
            <a class="collapse-item" href="../Tools_Calculo.php">Calculo</a>
            <a class="collapse-item" href="../Tools_Presentacion.php">Presentación</a>
            <a class="collapse-item" href="../Tools_Dibujo.php">Dibujo</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseConfiguracion" aria-expanded="true" aria-controls="collapseCuentas">
          <i class="fas fa-users-cog"></i>
          <span>Configuración</span>
        </a>
        <div id="collapseConfiguracion" class="collapse" aria-labelledby="headingConfiguracion" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Usuarios:</h6>
            <a class="collapse-item" href="../Configuracion_Agregar.php">Agregar</a>
            <a class="collapse-item" href="../Configuracion_Ver.php">Ver</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
  <?php
  require('nav.php');
  ?>
        <!-- End of -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Calendario</h1>
          </div>
          <!-- Calendar Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Calendario ejemplos</h6>
            </div>
            <div class="card-body">
              <div class="row">

                <!--<div class="page-header"><h4></h4></div>-->
                <div class="col-md-6">
                  <div class="btn-group">
                    <button class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm" data-calendar-view="year">Año</button>
                    <button class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm active" data-calendar-view="month">Mes</button>
                    <button class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm" data-calendar-view="week">Semana</button>
                    <button class="d-none d-sm-inline-block btn btn-sm btn-outline-primary shadow-sm" data-calendar-view="day">Dia</button>
                  </div>

                </div>
<?php if($rol=='Administrador'){?>
                <div class="col-md-6">
                  <div class="pull-right form-inline"><br>
                    <button class="btn d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle='modal' data-target='#add_evento'>Añadir Evento</button>
                  </div>
                </div>
<?php } ?>
              </div>
              <br><br><br>
              <div class="row">
                <div id="calendar"></div> <!-- Aqui se mostrara nuestro calendario -->

              </div>
              <!--ventana modal para el calendario-->
              <div class="modal fade" id="events-modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <a href="#" data-dismiss="modal" style="float: right;"> <i class="glyphicon glyphicon-remove "></i> </a>
                      <br>
                    </div>
                    <div class="modal-body" style="height: 400px">
                      <p>One fine body&hellip;</p>
                    </div>
                  </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?php
      require('../footer.php');
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
          <h5 class="modal-title" id="exampleModalLabel">Estas seguro que quieres salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
        <div class="modal-footer">
          <button class="btn d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" href="sal.php">Salir</a>
        </div>
      </div>
    </div>
  </div>

   <!-- Bootstrap core JavaScript-->
   <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

  <!-- Page level custom scripts -->
  <script src="../Exportar_Excel.js"></script>

      <script src="js/underscore-min.js"></script>
    <script src="js/calendar.js"></script>
    <script type="text/javascript">
        (function($){
                //creamos la fecha actual
                var date = new Date();
                var yyyy = date.getFullYear().toString();
                var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();

                //establecemos los valores del calendario
                var options = {

                    // definimos que los agenda se mostraran en ventana modal
                    modal: '#events-modal', 

                        // dentro de un iframe
                        modal_type:'iframe',    

                        //obtenemos los agenda de la base de datos
                        events_source: '<?=$base_url?>obtener_eventos.php', 

                        // mostramos el calendario en el mes
                        view: 'month',             

                        // y dia actual
                        day: yyyy+"-"+mm+"-"+dd,   


                        // definimos el idioma por defecto
                        language: 'es-ES', 

                        //Template de nuestro calendario
                        tmpl_path: '<?=$base_url?>tmpls/', 
                        tmpl_cache: false,


                        // Hora de inicio
                        time_start: '08:00', 

                        // y Hora final de cada dia
                        time_end: '22:00',   

                        // intervalo de tiempo entre las hora, en este caso son 30 minutos
                        time_split: '30',    

                        // Definimos un ancho del 100% a nuestro calendario
                        width: '100%', 

                        onAfterEventsLoad: function(events)
                        {
                            if(!events)
                            {
                                return;
                            }
                            var list = $('#eventlist');
                            list.html('');

                            $.each(events, function(key, val)
                            {
                                $(document.createElement('li'))
                                .html('<a href="' + val.url + '">' + val.title + '</a>')
                                .appendTo(list);
                            });
                        },
                        onAfterViewLoad: function(view)
                        {
                            $('#page-header').text(this.getTitle());
                            $('.btn-group button').removeClass('active');
                            $('button[data-calendar-view="' + view + '"]').addClass('active');
                        },
                        classes: {
                            months: {
                                general: 'label'
                            }
                        }
                    };


                // id del div donde se mostrara el calendario
                var calendar = $('#calendar').calendar(options); 

                $('.btn-group button[data-calendar-nav]').each(function()
                {
                    var $this = $(this);
                    $this.click(function()
                    {
                        calendar.navigate($this.data('calendar-nav'));
                    });
                });

                $('.btn-group button[data-calendar-view]').each(function()
                {
                    var $this = $(this);
                    $this.click(function()
                    {
                        calendar.view($this.data('calendar-view'));
                    });
                });

                $('#first_day').change(function()
                {
                    var value = $(this).val();
                    value = value.length ? parseInt(value) : null;
                    calendar.setOptions({first_day: value});
                    calendar.view();
                });
            }(jQuery));
        </script>

  <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Agregar nuevo evento</h4>
        </div>
        <div class="modal-body">
          <form action="" method="post">
            <label for="from">Inicio</label>
            <div class='input-group date' id='from'>
              <input type="date" id="from" name="from" class="form-control" width="100%" />
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </div>

            <br>

            <label for="to">Final</label>
            <div class='input-group date' id='to'>

              <input type="date" id="to" name="to" class="form-control" width="100%" />
              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
            </div>

            <br>

            <label for="tipo">Tipo de evento</label>
            <select class="form-control" name="class" id="tipo">
              <option value="event-info">Informacion</option>
              <option value="event-success">Producción</option>
              <option value="event-important">Proveedor</option>
              <option value="event-warning">Advertencia</option>
              <option value="event-special">Especial</option>
            </select>

            <br>

            <label for="title">Título</label>
            <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">

            <br>

            <label for="body">Evento</label>
            <textarea id="body" name="event" required class="form-control" rows="3"></textarea>

            <script type="text/javascript">
              $(function() {
                $('#from').datetimepicker({
                  language: 'es',
                  minDate: new Date()
                });
                $('#to').datetimepicker({
                  language: 'es',
                  minDate: new Date()
                });

              });
            </script>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
          <button type="submit" class="btn d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fa fa-check"></i> Agregar</button>
          </form>
        </div>
      </div>
      <script src="../js/script.js"></script>
</body>

</html>
<?php }
require('llenar4.php');
 ?>