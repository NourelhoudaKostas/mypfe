<!-- partial:partials/_navbar.html -->
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
  <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
    <a class="navbar-brand brand-logo">
      <img src="{{ asset('assets1/images/img/images/images.png') }}" alt="logo" class="img-fluid" style="max-width: 150px;">
    </a>
    
    
    <a class="navbar-brand brand-logo-mini" href="index.html">
      <img src="{{ asset('assets1/images/logo-mini.svg') }}" alt="logo" />
    </a>
  </div>
  <div class="navbar-menu-wrapper d-flex align-items-stretch">
    <div class="search-field d-none d-md-block">
      
      <form class="d-flex align-items-center h-100" action="{{ route('student.search') }}">
        @csrf
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="input-group">
          
          <div class="input-group-prepend bg-transparent">
            <span class="input-group-text border-0">
              <i class="mdi mdi-magnify"></i>
            </span>
          </div>
          <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects" name="search">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </form>
    </div>
    <ul class="navbar-nav navbar-nav-right ms-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
          <i class="mdi mdi-logout text-primary"></i>
        </a>
      </li>
      <li class="nav-item d-lg-none">
        <button class="navbar-toggler navbar-toggler-right align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </li>
    </ul>
  </div>
</nav>
<!-- Header End -->
