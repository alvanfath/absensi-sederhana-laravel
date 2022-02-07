<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-white">{{auth()->user()->name}}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('storage/post-foto/' . auth()->user()->foto ) }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               @if (auth()->user()->level =="student")

               
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="masuk" class="nav-link">
                <i class="fas fa-sign-in-alt"></i>
                  <p>Masuk</p>
                </a>
              </li>
            </ul>
          </li>
               @endif
               
          @if (auth()->user()->level =="admin")
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Laporan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href='tampilan' class="nav-link">
                <i class="fas fa-calendar-week"></i>
                  <p>Keseluruhan</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Data
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('student.index') }}" class="nav-link">
                <i class="fas fa-user-clock"></i>
                  <p>Data Student</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rombel.index') }}" class="nav-link">
                <i class="fas fa-user-friends"></i>
                  <p>Data Rombel</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('rayon.index') }}" class="nav-link">
                <i class="fas fa-map"></i>
                  <p>Data Rayon</p>
                </a>
              </li>
            </ul>
          </li>
        
          @endif
        
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="far fa-caret-square-left"></i>
              <p>
                logout
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">
                <i class="fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>
              </li>
            </ul>
              @if (auth()->user()->level =="admin")
              <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fas fa-user-plus"></i>
              <p>
                Registrasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('register') }}" class="nav-link">
                <i class="fas fa-user-clock"></i>
                  <p>Registrasi Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('student.create') }}" class="nav-link">
                <i class="fas fa-user-friends"></i>
                  <p>Tambah Siswa</p>
                </a>
              </li>
            </ul>
          </li>
              @endif
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>