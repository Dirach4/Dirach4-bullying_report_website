<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link"style="background: #419CFF">
      <img src="../../dist/img/kelanalogo.png" alt="Admin_logo" class="brand-image img-circle elevation-1"style="background: white" >
      <span class="brand-text"style="color: #ffff">ADMIN KELANA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ route('dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Pelaporan
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('laporan.index', ['status' => 'masuk']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Masuk</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporan.index', ['status' => 'proses']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Proses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('laporan.index', ['status' => 'selesai']) }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Selesai</p>
                </a>
              </li>
            </ul>

          </li>
          <li class="nav-item">
            <a href="{{ route('user') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Pengguna
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>