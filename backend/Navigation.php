<!-- Topbar -->
        <?php
        $fec=date('Y-m-d');
        
        $cli=$_SESSION['cl']['nom'];
        $ape=$_SESSION['cl']['ape'];
require ("../basededatos/connectionbd.php");
$query="SELECT nombre FROM CatProducto WHERE stock=0 ";
$result=mysqli_query($conn,$query);
$i = 0;
$ind=100;
$tar=0;  
$flag=0; 
$flag2=0; 
$flag3=0;
      while($fila=mysqli_fetch_array($result)){     
        $nom = $fila['nombre'];
$flag=1;
        $i++; 
        $tar=$tar+5;
}
$query2="SELECT Max(Venta.fecha) as fecha,CatProducto.nombre,(CatProducto.precio*VENTA_PRODUCCION.cantidad)as tot FROM Venta,CatProducto,Produccion,VENTA_PRODUCCION WHERE Venta.ID_VENTA=VENTA_PRODUCCION.FK_ID_VENTA and VENTA_PRODUCCION.FK_ID_PRODUCCION=Produccion.ID_PRODUCCION and Produccion.FK_ID_CATPRODUCTO=CatProducto.ID_CATPRODUCTO ";
$result2=mysqli_query($conn,$query2);

      
      while($fila2=mysqli_fetch_array($result2)){     
        $nom2 = $fila2['nombre'];
        $gan=$fila2['tot'];
          $i++; 
}
$query3="SELECT nombre FROM MateriaPrima WHERE stock=0 ";
$result3=mysqli_query($conn,$query3);

      
      while($fila3=mysqli_fetch_array($result3)){     
        $nom3 = $fila3['nombre'];
        $flag2=1;
        $i++;
       $tar=$tar+10;
       
}
$query4="SELECT nombre FROM Insumo WHERE stock=0 ";
$result4=mysqli_query($conn,$query4);

      
      while($fila4=mysqli_fetch_array($result4)){     
        $nom4 = $fila4['nombre'];
          $i++; 
          $flag3=1;
          $tar=$tar+10;
       
}
$sd="";
$query5="SELECT COUNT(*) as cont FROM Bodega";
$result5=mysqli_query($conn,$query5);

      
      while($fila5=mysqli_fetch_array($result5)){     
        $bode = $fila5['cont'];
       
}

$query6="SELECT COUNT(*) as cont FROM CatProducto WHERE estado=1";
$result6=mysqli_query($conn,$query6);

      
      while($fila6=mysqli_fetch_array($result6)){     
        $prod = $fila6['cont'];
       
       
}
$query7="SELECT COUNT(*) as cont FROM agenda";
$result7=mysqli_query($conn,$query7);

      
      while($fila7=mysqli_fetch_array($result7)){     
        $item = $fila7['cont'];
        
       
}
if($tar>100){
$veri=0;
}else if($tar<100){
 $veri=$ind-$tar; 
}
        ?>
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Sidebar Toggle (Topbar) -->
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>

  <!-- Topbar Search -->
  <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
      <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Buscar" aria-describedby="basic-addon2">
      <div class="input-group-append">
        <button class="btn btn-primary" type="button">
          <i class="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
  </form>

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
    <li class="nav-item dropdown no-arrow d-sm-none">
      <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-search fa-fw"></i>
      </a>
      <!-- Dropdown - Messages -->
      <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
        <form class="form-inline mr-auto w-100 navbar-search">
          <div class="input-group">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar por..." aria-label="Buscar" aria-describedby="basic-addon2">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button">
                <i class="fas fa-search fa-sm"></i>
              </button>
            </div>
          </div>
        </form>
      </div>
    </li>

    <!-- Nav Item - Calendar -->
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="calendario/" id="alertsDropdown" role="button">
        <i class="far fa-calendar-alt"></i>

        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter"><?php echo $item;?>+</span>
      </a>
    </li>

    <!-- Nav Item - Alerts -->
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-bell fa-fw"></i>
        <!-- Counter - Alerts -->
        <span class="badge badge-danger badge-counter">3</span>
      </a>
      <!-- Dropdown - Alerts -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
        <h6 class="dropdown-header">
          Centro de Alertas 
        </h6>

        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="mr-3">
            <div class="icon-circle bg-primary">
              <i class="fas fa-file-alt text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500"><?php echo $fec; ?></div>
            <?php if($flag==1){ ?>
            <span class="font-weight-bold">Alerta: Fabricar <?php echo $nom; ?></span>
          <?php }?>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="mr-3">
            <div class="icon-circle bg-success">
              <i class="fas fa-donate text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500"><?php echo $fec; ?></div>
            La ultima Venta fue de <?php echo $nom2; ?> con una ganancia de <?php echo $gan; ?>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="mr-3">
            <div class="icon-circle bg-warning">
              <i class="fas fa-exclamation-triangle text-white"></i>
            </div>
          </div>
          <div>
            <div class="small text-gray-500"><?php echo $fec; ?></div>
            <?php if($flag2==1){ ?>
            Alerta Roja: No hay <?php echo $nom3; ?> .
          <?php } ?>
          </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500" href="calendario/">Mostrar Todo</a>
      </div>
    </li>

    <!-- Nav Item - Messages -->
    <li class="nav-item dropdown no-arrow mx-1">
      <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-envelope fa-fw"></i>
        <!-- Counter - Messages -->
        <span class="badge badge-danger badge-counter">4</span>
      </a>
      <!-- Dropdown - Messages -->
      <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
        <h6 class="dropdown-header">
          Centro de Mensajes
        </h6>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="../img/bot.jpg" alt="">
            <div class="status-indicator bg-success"></div>
          </div>
          <div class="font-weight-bold">
 <?php if($flag3==1){ ?>
            <div class="text-truncate">Se agoto el Insumo: <?php echo $nom4; ?>.</div>
          <?php }?>
            <div class="small text-gray-500">Sistema · 1m</div>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="../img/man.png" alt="">
            <div class="status-indicator"></div>
          </div>
          <div>
            <div class="text-truncate">Bodega(s) actualmente activas : <?php echo $bode; ?></div>
            <div class="small text-gray-500">Bot · 2d</div>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="../img/lñ.jpg" alt="">
            <div class="status-indicator bg-warning"></div>
          </div>
          <div>
            <div class="text-truncate">Producto(s) activos : <?php echo $prod; ?></div>
            <div class="small text-gray-500">Morgan Alvarez · 2d</div>
          </div>
        </a>
        <a class="dropdown-item d-flex align-items-center" href="#">
          <div class="dropdown-list-image mr-3">
            <img class="rounded-circle" src="../img/perro.jpg" alt="">
            <div class="status-indicator bg-success"></div>
          </div>
          <div>
            <div class="text-truncate">Revise el calendario</div>
            <div class="small text-gray-500">Chicken the Dog · 2w</div>
          </div>
        </a>
        <a class="dropdown-item text-center small text-gray-500" href="#">Leer Mas</a>
      </div>
    </li>

    <div class="topbar-divider d-none d-sm-block"></div>

    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
      <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $cli; ?> <?php echo $ape; ?> </span>
        <img class="img-profile rounded-circle" src="../img/panadero.jpg">
      </a>
      <!-- Dropdown - User Information -->
      <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
        <a class="dropdown-item" href="Perfil.php">
          <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
          Perfil
        </a>
        <a class="dropdown-item" href="Configuracion.php">
          <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
          Configuración
        </a>
        <a class="dropdown-item" href="Log.php">
          <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
          Registro de actividades
        </a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../salir.php" data-toggle="modal" data-target="#logoutModal">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Salir 
        </a>
      </div>
    </li>

  </ul>

</nav>
<!-- End of