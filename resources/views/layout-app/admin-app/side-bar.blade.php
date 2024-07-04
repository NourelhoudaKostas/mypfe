  <!-- partial:partials/_sidebar.html -->
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      
      <li class="nav-item">
        <a class="nav-link " href="{{ route('dashbord_admin') }}">Tableau de bord
        
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Basic UI Elements</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link" href="{{route('formateurs.view')}}">
          <span class="menu-title">Formateurs</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        {{-- <a class="nav-link" href="{{route('student.view')}}">
          <span class="menu-title">Students</span>
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        </a> --}}
        
        {{-- <div class="dropdown nav-link">
          <button class="nav-link dropdown-toggle"  id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Student
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="{{route('student.view')}}">Student view</a></li>
            <li><a class="dropdown-item" href="{{route('student.activation')}}">Student activation</a></li>
          </ul>
        </div> --}}
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('student.view')}}">
          <span class="menu-title">Student view</span>
          <i class="mdi mdi-account menu-icon"></i>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('certificat') }}">
          <span class="menu-title">Certificate</span>
          <i class="mdi mdi-chart-bar menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        {{-- <a class="nav-link" href="pages/tables/basic-table.html">
          <span class="menu-title">Annonces</span>
          <i class="mdi mdi-table-large menu-icon"></i>
        </a> --}}
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Sample Pages</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li> --}}
    </ul>
  </nav>
  <!-- partial -->