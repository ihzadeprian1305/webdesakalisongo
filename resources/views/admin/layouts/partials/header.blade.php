  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/admin/profil') }}" class="nav-link">Home</a>
      </li>
      <!--<li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>-->
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
      <a href="{{ url('/admin/profil') }}"><img src="{{asset('public/foto_user/'.Auth::user()->foto)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8; width: 40px; height: 40px"></a>
      </li>
      <li class="nav-item">
      <a onclick="event.preventDefault(); document.getElementById('logout').submit()" class="nav-link">
          <i class="fas fa-sign-out-alt"></i>
          <form action="{{ url('/admin/logout') }}" method="POST" id="logout" class="display: none;">
            @csrf
          </form>
      </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->