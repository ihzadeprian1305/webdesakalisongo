<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/admin/profil') }}" class="brand-link">
      <img src="{{asset('admin/dist/img/logokabupatenmalang.png')}}" alt="AdminLTE Logo" class="brand-image elevation-3"
           style="width: 70; height: 85; opacity: .8">
      <h6 class="brand-text font-weight-light mt-1">Pemerintah Desa Kalisongo</h6>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{ url('/admin/profil') }}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Profil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/arsip') }}" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Arsip Desa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/berita') }}" class="nav-link">
              <i class="nav-icon fas fa-bullhorn"></i>
              <p>
                Berita Desa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/foto') }}" class="nav-link">
              <i class="nav-icon fas fa-image"></i>
              <p>
                Galeri Foto
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/kritikdansaran') }}" class="nav-link">
              <i class="nav-icon fas fa-comment"></i>
              <p>
                Kritik dan Saran
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/struktur') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Struktur
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/admin/user') }}" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                User
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a onclick="event.preventDefault(); document.getElementById('logout').submit()" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Log Out
              </p>
              <form action="{{ url('/admin/logout') }}" method="POST" id="logout" class="display: none;">
            @csrf
              </form>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>