<?php
require ("connectionbd.php");
$idb=$_POST["idb"];

		$sql_comboprov="SELECT bodega.ID_BODEGA,insumo.ID_INSUMO,insumo.nombre as isn,insumo.descripcion as isdc,bodega_insumo.unidades as ick,insumo.precio,bodega_insumo.registro from bodega,insumo,bodega_insumo WHERE bodega.ID_BODEGA='$idb' and bodega_insumo.`FK_ID_BODEGA`=bodega.ID_BODEGA and bodega_insumo.FK_ID_INSUMO=insumo.ID_INSUMO;";
		$result_comboprov=mysqli_query($conn,$sql_comboprov);
?> 

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
    $ref=$fila_comboprov['registro'];
  	if(!empty($ids) ){
  	?> <tbody>
			<td><?php echo $ids;  ?></td>
			<td> <?php echo $nos; ?></td>
			<td> <?php echo $dess; ?> </td>
			<td>       Insumo         </td>
			<td> <?php echo $st; ?></td>
			<td><?php echo $pres; ?></td>
			<td><a class="btn btn-success" href="Suministro_Modificar.php?id=<?php echo $ids; ?>&all=<?php echo $nsb; ?>&r= <?php echo $ref; ?> &flag=<?php echo "1"?>">Editar</a></td>
 </tbody>
 <?php }}
$sql_comboprov2="SELECT bodega.ID_BODEGA,materiaprima.ID_MATERIAPRIMA, materiaprima.nombre as mtn,materiaprima.descripcion as dsm , bodega_materiaprima.unidades as mts,materiaprima.precio as prm,bodega_materiaprima.FK_ID_AGENDA from bodega,bodega_materiaprima,materiaprima WHERE bodega.ID_BODEGA='$idb' and  bodega_materiaprima.FK_ID_MATERIAPRIMA=materiaprima.ID_MATERIAPRIMA and bodega_materiaprima.`FK_ID_BODEGA`=bodega.ID_BODEGA;";
$result_comboprov2=mysqli_query($conn,$sql_comboprov2);
  while($fila_comboprov2=mysqli_fetch_array($result_comboprov2)){ 
$nsb=$fila_comboprov2['ID_BODEGA'];
$idm=$fila_comboprov2['ID_MATERIAPRIMA'];
    $nomt=$fila_comboprov2['mtn'];
    $stm=$fila_comboprov2['mts'];
    $desm=$fila_comboprov2['dsm'];
    $prem=$fila_comboprov2['prm'];
    $agenda=$fila_comboprov2['FK_ID_AGENDA'];
  if(!empty($idm)) { ?>
	 <tbody>
			<td><?php echo $idm;  ?></td>
			<td> <?php echo $nomt; ?></td>
			<td> <?php echo $desm; ?> </td>
			<td>   Materia prima         </td>
			<td> <?php echo $stm; ?></td>
			
			
			<td><?php echo $prem; ?></td>
			<td><a class="btn btn-success" href="Suministro_Modificar.php?id=<?php echo $idm; ?>&all=<?php echo $nsb; ?>&agenda= <?php echo $agenda; ?> &flag=<?php echo "2"?>">Editar</a></td>
 </tbody>
<?php }} ?>
  
                </table>

