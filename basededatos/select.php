                  <select id="inputState" name="cat" class="form-control">
                    
                    <?php
require ("../basededatos/connectionbd.php");
$query="Select * from subtipoproducto";
$result=mysqli_query($conn,$query);
$i = 0;
while ($fila=mysqli_fetch_array($result)) {
        $noms=$fila['nombre'];
        $idt=$fila['ID_SUBTIPOPRODUCTO'];
         ?>
                    <option value="<?php echo $idt; ?>"><?php echo $noms; ?></option> 
                 <?php }?>
                  </select>
                       