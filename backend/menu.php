
<ul class="navbar-nav bg-gradient-design sidebar sidebar-light accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Panaderia <sup>ERP</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
          aria-controls="collapseTwo">
          <i class="far fa-folder-open "></i>
          <span>Productos</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Productos:</h6>
            <a class="collapse-item" href="Productos_Agregar.php">Agregar</a>
            <a class="collapse-item" href="Productos_Ver.php">Ver</a>
          </div>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLotes" aria-expanded="true"
          aria-controls="collapseCuentas">
          <i class="far fa-chart-bar"></i>
          <span>Producción</span>
        </a>
        <div id="collapseLotes" class="collapse" aria-labelledby="headingLotes" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Producción:</h6>
            <a class="collapse-item" href="lotes_agregar.php">Agregar</a>
            <a class="collapse-item" href="lotes_ver.php">Ver</a>
          </div>
        </div>
        <div id="collapseLotes" class="collapse" aria-labelledby="headingLotes" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Ventas:</h6>
            <a class="collapse-item" href="Ventas_agregar.php">Agregar</a>
            <a class="collapse-item" href="Ventas_ver.php">Ver</a>
          </div>
        </div>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInventarios" aria-expanded="true"
          aria-controls="collapseInventarios">
          <i class="fas fa-boxes"></i>
          <span>Inventario</span>
        </a>
        <div id="collapseInventarios" class="collapse" aria-labelledby="headingBodegas" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Bodega:</h6>
            <a class="collapse-item" href="Bodegas_Agregar.php">Agregar</a>
            <a class="collapse-item" href="Bodegas_Ver.php">Ver</a>
          </div>
        </div>
        <div id="collapseInventarios" class="collapse" aria-labelledby="headingMateria" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Materia Prima:</h6>
            <a class="collapse-item" href="materia_agregar.php">Agregar</a>
            <a class="collapse-item" href="materia_ver.php">Ver</a>
          </div>
        </div>
        <div id="collapseInventarios" class="collapse" aria-labelledby="headingInsumos" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Insumo:</h6>
            <a class="collapse-item" href="insumo_agregar.php">Agregar</a>
            <a class="collapse-item" href="insumo_ver.php">Ver</a>
          </div>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseContacts"
          aria-expanded="true" aria-controls="collapseContacts">
          <i class="far fa-address-card"></i>
          <span>Proveedores</span>
        </a>
        <div id="collapseContacts" class="collapse" aria-labelledby="headingContacts" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Proveedores:</h6>
            <a class="collapse-item" href="Clientes_Agregar.php">Agregar</a>
            <a class="collapse-item" href="Clientes_Ver.php">Ver</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCuentas"
          aria-expanded="true" aria-controls="collapseCuentas">
          <i class="far fa-calendar-alt"></i>
          <span>Pedidos</span>
        </a>
        <div id="collapseCuentas" class="collapse" aria-labelledby="headingCuentas" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Pedidos:</h6>
            <a class="collapse-item" href="Pedidos_Agregar.php">Agregar</a>
            <a class="collapse-item" href="Pedidos_ver.php">Ver</a>
          </div>
        </div>
        <div id="collapseCuentas" class="collapse" aria-labelledby="headingCuentas" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Facturas:</h6>
            <a class="collapse-item" href="Facturas_agregar.php">Agregar</a>
            <a class="collapse-item" href="Facturas_ver.php">Ver</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDevoluciones"
          aria-expanded="true" aria-controls="collapseDevoluciones">
          <i class="far fa-edit"></i>
          <span>Devoluciones</span>
        </a>
        <div id="collapseDevoluciones" class="collapse" aria-labelledby="headingDevoluciones"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Devoluciones:</h6>
            <a class="collapse-item" href="Devoluciones_Agregar.php">Agregar</a>
            <a class="collapse-item" href="Devoluciones_Ver.php">Ver</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHerramientas" aria-expanded="true"
          aria-controls="collapseCuentas">
          <i class="fas fa-paste"></i>
          <span>Herramientas</span>
        </a>
        <div id="collapseHerramientas" class="collapse" aria-labelledby="headingHerramientas" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Hojas:</h6>
            <a class="collapse-item" href="Tools_Documentos.php">Documentos</a>
            <a class="collapse-item" href="Tools_Calculo.php">Calculo</a>
            <a class="collapse-item" href="Tools_Presentacion.php">Presentación</a>
            <a class="collapse-item" href="Tools_Dibujo.php">Dibujo</a>
            <a class="collapse-item" href="Tools_Formulario.php">Formulario</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

<!-- Switch 
      <button class="switch" id="switch">
					<span><i class="fas fa-sun"></i></span>
					<span><i class="fas fa-moon"></i></span>
			</button>

      
<!-- Divider 
<hr class="sidebar-divider">

-->
      
      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    </ul>