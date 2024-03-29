      <!-- Navbar -->
      <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
        <div class="container-fluid">
  
          <!-- Brand -->
          <a class="navbar-brand waves-effect" href="https://mdbootstrap.com/docs/jquery/" target="_blank">
            <strong class="blue-text">Panel</strong>
          </a>
  
          <!-- Collapse -->
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
  
          <!-- Links -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
  
            <!-- Left -->
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link waves-effect" href="/admin">Dashboard
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link waves-effect" href="/admin/kategori">
                  Kategori
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link waves-effect" href="/admin/artikel">
                  Artikel
                </a>
              </li>
            </ul>
  
            <!-- Right -->
            <ul class="navbar-nav nav-flex-icons">
              <li class="nav-item">
                <a href="https://www.facebook.com/mdbootstrap" class="nav-link waves-effect" target="_blank">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="nav-item">
                <a href="https://twitter.com/MDBootstrap" class="nav-link waves-effect" target="_blank">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="nav-item dropdown ml-4">
                <a class="nav-link border border-light rounded waves-effect dropdown-toggle" id="userDropdownMenu" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" >
                  User <i class="fas fa-user-alt"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-default special-color" aria-labelledby="userDropdownMenu">
                    <a class="dropdown-item text-info" href="#">Info <span class="float-right"><i class="fas fa-info"></i></span> </a>
                    <a class="dropdown-item text-warning" href="#">Logout <span class="float-right"><i class="fas fa-sign-out-alt"></i></span></a>
                </div>
              </li>
            </ul>
  
          </div>
  
        </div>
      </nav>
      <!-- Navbar -->
  
      <!-- Sidebar -->
      <div class="sidebar-fixed position-fixed mt-n4">
  
        <a class="logo-wrapper waves-effect">
          <img src="https://mdbootstrap.com/img/logo/mdb-email.png" class="img-fluid" alt="">
        </a>
  
        <div class="list-group list-group-flush">
          <a href="/admin" class="list-group-item active waves-effect">
            <i class="fas fa-chart-pie mr-3"></i>Dashboard
          </a>
          <a href="admin/kategori" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-tag"></i> Kategori</a>
          <a href="admin/artikel" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-newspaper"></i> Artikel</a>
        </div>
  
      </div>
      <!-- Sidebar -->