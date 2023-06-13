<div class="wrapper ">
    <div class="sidebar" data-color="orange">
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          CT
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper" id="sidebar-wrapper">
        <ul class="nav">
          <li class="{{ request()->is('dashboard') ? 'active' : '' }} ">
            <a href="/dashboard">
              <i class="now-ui-icons design_app"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="{{ request()->is('outlet') ? 'active' : '' }} ">
            <a href="/outlet">
              <i class="now-ui-icons shopping_shop"></i>
              <p>Outlet</p>
            </a>
          </li>
          <li class="{{ request()->is('paket') ? 'active' : '' }} ">
            <a href="/paket">
              <i class="now-ui-icons education_paper"></i>
              <p>paket </p>
            </a>
          </li>
          <li class="{{ request()->is('pengguna') ? 'active' : '' }} ">
            <a href="/pengguna">
              <i class="now-ui-icons users_single-02"></i>
              <p>Pengguna</p>
            </a>
          </li>
          <li class="{{ request()->is('pelanggan') ? 'active' : '' }} ">
            <a href="/pelanggan">
              <i class="now-ui-icons users_circle-08"></i>
              <p>Pelanggan</p>
            </a>
          </li>
          <li class="{{ request()->is('transaksi') ? 'active' : '' }} ">
            <a href="/transaksi">
              <i class="now-ui-icons business_money-coins"></i>
              <p>Transaksi</p>
            </a>
          </li>
          <li class="{{ request()->is('backup') ? 'active' : '' }} ">
            <a href="/backup">
              <i class="now-ui-icons design_bullet-list-67"></i>
              <p>Backup</p>
            </a>
          </li>
          {{-- <li class="active-pro">
            <a href="./upgrade.html">
              <i class="now-ui-icons arrows-1_cloud-download-93"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li> --}}
        </ul>
      </div>
    </div>
    <div class="main-panel" id="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">@yield('header')</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                  </div>
                </div>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  {{-- <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a> --}}
                  <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item">
                        <i class="icon-key"></i>
                        <span class="ml-2">Logout </span>
                    </button>
                </form>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <div class="panel-header" style="height: 10px;">
      </div>
      <div class="content py-5 ">
          @yield('content')
      </div>
      <footer class="footer">
        <div class=" container-fluid ">
          {{-- <nav>
            <ul>
              <li>
                <a href="https://www.creative-tim.com">
                  Creative Tim
                </a>
              </li>
              <li>
                <a href="http://presentation.creative-tim.com">
                  About Us
                </a>
              </li>
              <li>
                <a href="http://blog.creative-tim.com">
                  Blog
                </a>
              </li>
            </ul>
          </nav> --}}
          <div class="copyright" id="copyright">
            &copy; <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed  <a href="https://www.invisionapp.com" target="_blank"></a> <a href="https://www.creative-tim.com" target="_blank"></a>
          </div>
        </div>
      </footer>
    </div>
  </div>