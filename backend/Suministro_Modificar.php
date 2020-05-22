<?php
session_start();
 if((isset($_SESSION['cl']))){
$idf=$_GET['flag'];

$id=$_GET['id'];
$nbg=$_GET['all'];
require ('../basededatos/connectionbd.php');
  ?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Agregar Suministro</title>

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
        <h1 class="h3 mb-2 text-gray-800">Actualizar Suministro</h1>
        <p class="mb-4">En este apartado podremos editar Suministros</a>.</p>

          <div class="card shadow mb-4">
          <div class="card-body">
            <?php if($idf=='2') { 
              $age=$_GET['agenda'];
$queryma="SELECT bodega_materiaprima.unidades,bodega_materiaprima.FK_ID_MATERIAPRIMA,bodega_materiaprima.FK_ID_BODEGA,materiaprima.nombre,tipomateriaprima.nombre as tp,materiaprima.descripcion,materiaprima.cantidad,materiaprima.precio,materiaprima.iva,MedidaCantidad.nombre AS nmc,bodega.descripcion as desb from bodega_materiaprima,materiaprima,tipomateriaprima,bodega,medidacantidad WHERE bodega_materiaprima.FK_ID_BODEGA='$nbg' and bodega_materiaprima.FK_ID_MATERIAPRIMA='$id' and bodega_materiaprima.FK_ID_BODEGA=bodega.ID_BODEGA and bodega_materiaprima.FK_ID_MATERIAPRIMA=materiaprima.ID_MATERIAPRIMA and materiaprima.FK_ID_TIPOMATERIAPRIMA=tipomateriaprima.ID_TIPOMATERIAPRIMA AND ID_MEDIDACANTIDAD=FK_ID_MEDIDACANTIDAD";
        $rma=mysqli_query($conn,$queryma);
        $fma=mysqli_fetch_array($rma);
        $unidm=$fma['unidades'];
        $idmat = $fma['FK_ID_MATERIAPRIMA'];
        $nimat = $fma['nombre'];
        $desmat = $fma['descripcion'];
        $premat = $fma['precio'];
        $ivamat = $fma['iva'];
        $ntimat = $fma['tp'];
        $nmedmat = $fma['nmc'];
        $canmat = $fma['cantidad'];
        $cod2=$fma['FK_ID_BODEGA'];
        $des2=$fma['desb'];

              ?>
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar suministro Materia prima</h6>
          </div>
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/editasum_mat.php" name="formmat" id="formmat" method="POST" enctype="multipart/form-data">
              <div class="form-row">
                <div class="form-group col-md-4">
                  <div class="form-group">
                    <label for="can_mat">Cantidad</label>
                    <input type="number" value="<?php echo $unidm;?>" id="can_mat" class="form-control" name="can_mat" width="100%" required="">
                   
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <div class="form-group">
                    <label for="fec_mat">Fecha de registro</label>
                    <input type="date" id="fec_mat" class="form-control" name="fec_mat" width="100%" required="">
                  </div>
                </div>
                <div class="form-group col-md-4">
                  <div class="form-group">
                    <label for="fecv_mat">Fecha de vencimiento</label>
                    <input type="date" id="fecv_mat" class="form-control" name="fecv_mat" width="100%" required="">
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Materia Prima</label>
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="mat_Table" width="100%" rows="3" cellspacing="0">
                      <thead>
                        <tr>
                          
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Descripción</th>
                          <th>Unidades</th>
                          <th>Precio</th>
                          <th>IVA</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Descripción</th>
                          <th>Unidades</th>
                          <th>Precio</th>
                          <th>IVA</th>
                        </tr>
                      </tfoot>
                      <tbody>
                            <tr align="center">
                             <td><?php echo $idmat; ?></td>
                             <td><?php echo $nimat; ?></td>
                             <td><?php echo $ntimat; ?></td>
                             <td><?php echo $desmat; ?></td> 
                             <td><?php echo $canmat." ".$nmedmat; ?></td>  
                             <td><?php echo "$".$premat; ?></td> 
                             <td><?php echo $ivamat."%"; ?></td>       
                           </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label>Bodegas</label>
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="matbodTabla" width="100%" rows="3" cellspacing="0">
                      <thead>
                        <tr>
                        
                          <th>Código</th>
                          <th>Descripción</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                  
                          <th>Código</th>
                          <th>Descripción</th>
                        </tr>
                      </tfoot>
                      <tbody>
                       <tr align="center">
                        <td><?php echo $cod2; ?></td>
                        <td><?php echo $des2; ?></td>        
                      </tr>
            
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                  <input type="hidden" name="can_mat2" value="<?php echo $unidm;?>">
                    <input type="hidden" name="nbg2" value="<?php echo $cod2;?>">
                    <input type="hidden" name="age" value="<?php echo $age;?>">
                    <input type="hidden" name="nimt" value="<?php echo $idmat;?>">
              <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
                
          </div>
        </div>
<?php } else if($idf=='1') { 
$ref=$_GET['r'];
$querysu="SELECT bodega_insumo.unidades,bodega_insumo.FK_ID_INSUMO,bodega_insumo.FK_ID_BODEGA,insumo.nombre,tipoinsumo.nombre as tp,insumo.descripcion,insumo.cantidad,insumo.precio,insumo.iva,bodega.descripcion as desb from bodega_insumo,insumo,tipoinsumo,bodega WHERE bodega_insumo.FK_ID_BODEGA='$nbg' and bodega_insumo.FK_ID_INSUMO='$id' and bodega_insumo.FK_ID_BODEGA=bodega.ID_BODEGA and bodega_insumo.FK_ID_INSUMO=insumo.ID_INSUMO and insumo.FK_ID_TIPOINSUMO=tipoinsumo.ID_TIPOINSUMO";
$rsu=mysqli_query($conn,$querysu);
$fila=mysqli_fetch_array($rsu);
        $can=$fila['unidades'];
        $idins = $fila['FK_ID_INSUMO'];
        $niins = $fila['nombre'];
        $desins = $fila['descripcion'];
        $preins = $fila['precio'];
        $ivains = $fila['iva'];
        $ntiins = $fila['tp'];
        $canins = $fila['cantidad'];
        $cod=$fila['FK_ID_BODEGA'];
        $des=$fila['desb'];
  ?>
        <div class="card shadow mb-4">
          <div class="card-body">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Editar suministro insumos</h6>
          </div>
            <!-- Aca se envian los datos a un archivo php ene el action="../basededatos/agregapd.php" -->
            <form action="../basededatos/editasum_ins.php" method="POST" enctype="multipart/form-data" name="formins" id="formins">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <div class="form-group">
                    <label for="can_ins">Cantidad</label>
                    <input type="number" id="can_ins" class="form-control" name="can_ins" width="100%" required="" value="<?php echo $can;?>">
                    <input type="hidden" name="can_ins2" required="" value="<?php echo $can;?>">
                     <input type="hidden" name="nbg" value="<?php echo $cod;?>">
                     <input type="hidden" name="ref" value="<?php echo $ref;?>">
                    <input type="hidden" name="ninm" value="<?php echo $idins;?>">
                  </div>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label>Insumos</label>
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="dataTable" width="100%" rows="3" cellspacing="0">
                      <thead>
                        <tr>
                          
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Descripción</th>
                          <th>Unidades</th>
                          <th>Precio</th>
                          <th>IVA</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          
                          <th>Código</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Descripción</th>
                          <th>Unidades</th>
                          <th>Precio</th>
                          <th>IVA</th>
                        </tr>
                      </tfoot>
                      <tbody>
                        <tr align="center">
      <td><?php echo $idins; ?></td>
      <td><?php echo $niins; ?></td>
      <td><?php echo $ntiins; ?></td>
      <td><?php echo $desins; ?></td> 
      <td><?php echo $canins." u"; ?></td>  
      <td><?php echo "$".$preins; ?></td> 
      <td><?php echo $ivains."%"; ?></td>       
    </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label>Bodegas</label>
                  <div class="table-responsive" style=" max-height:350px; ">
                    <table class="table table-bordered" id="insbodTabla" width="100%" rows="3" cellspacing="0">
                      <thead>
                        <tr>
                          
                          <th>Código</th>
                          <th>Descripción</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          
                          <th>Código</th>
                          <th>Descripción</th>
                        </tr>
                      </tfoot>
                      <tbody>
                          <tr align="center">
      <td><?php echo $cod; ?></td>
      <td><?php echo $des; ?></td>        
    </tr>
                      </tbody>
                    </table>
                  
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Agregar</button>
            </form>
          </div>
        </div>
<?php } ?>
          </div>
        </div>
        <?php
          require('footer.php');
        ?>
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

</html>
<?php }
require('llenar3.php');
 ?>

