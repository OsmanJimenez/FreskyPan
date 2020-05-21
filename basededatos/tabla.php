<?php
require ("connectionbd.php");
$idb=$_POST["idb"];

		$sql_comboprov="SELECT bodega.ID_BODEGA,insumo.ID_INSUMO,insumo.nombre as isn,insumo.descripcion as isdc,insumo.stock as ick,insumo.precio,materiaprima.ID_MATERIAPRIMA, materiaprima.nombre as mtn,materiaprima.descripcion as dsm , materiaprima.stock as mts,materiaprima.precio as prm from bodega,insumo,bodega_insumo,bodega_materiaprima,materiaprima WHERE bodega.ID_BODEGA='$idb' and bodega_insumo.`FK_ID_BODEGA`=bodega.ID_BODEGA AND bodega_materiaprima.FK_ID_MATERIAPRIMA=materiaprima.ID_MATERIAPRIMA;";
		$result_comboprov=mysqli_query($conn,$sql_comboprov);
?> <input id="buscar" type="text" class="form-control" placeholder="Buscar" />
<br>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            
	 <thead>
                    <tr>
                      <th>Código</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Tipo</th>
                      <th>Stock</th>
                      <th>Precio</th>
                      
                      <th>Modificar</th>
             
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>Código</th>
                      <th>Nombre</th>
                      <th>Descripción</th>
                      <th>Tipo</th>
                      <th>Stock</th>
                      <th>Precio</th>
          
                      
                      <th>Modificar</th>
                    </tr>
                  </tfoot>
<?php
  while($fila_comboprov=mysqli_fetch_array($result_comboprov)){ 
  	$nsb=$fila_comboprov['ID_BODEGA'];
    $ids=$fila_comboprov['ID_INSUMO'];
    $nos=$fila_comboprov['isn'];
    $st=$fila_comboprov['ick'];
    $dess=$fila_comboprov['isdc'];
    $pres=$fila_comboprov['precio'];
    $idm=$fila_comboprov['ID_MATERIAPRIMA'];
    $nomt=$fila_comboprov['mtn'];
    $stm=$fila_comboprov['mts'];
    $desm=$fila_comboprov['dsm'];
    $prem=$fila_comboprov['prm'];
  	if(!empty($ids) ){
  	?> <tbody>
			<td><?php echo $ids;  ?></td>
			<td> <?php echo $nos; ?></td>
			<td> <?php echo $dess; ?> </td>
			<td>       Insumo         </td>
			<td> <?php echo $st; ?></td>
			<td><?php echo $pres; ?></td>
			<td><a class="btn btn-success" href="Suministro_Modificar.php?id=<?php echo $ids; ?>&all=<?php echo $nsb; ?>&flag=<?php echo "1"?>">Editar</a></td>
 </tbody>
 <?php } if(!empty($idm)) { ?>
	 <tbody>
			<td><?php echo $idm;  ?></td>
			<td> <?php echo $nomt; ?></td>
			<td> <?php echo $desm; ?> </td>
			<td>   Materia prima         </td>
			<td> <?php echo $stm; ?></td>
			
			
			<td><?php echo $prem; ?></td>
			<td><a class="btn btn-success" href="Suministro_Modificar.php?id=<?php echo $idm; ?>&all=<?php echo $nsb; ?> &flag=<?php echo "2"?>">Editar</a></td>
 </tbody>
<?php }} ?>
  
                </table>

