
    <!-- Header -->
    <style>
        .activer{
            color: rgb(255, 51, 0) !important ; 
           
          
        }
    </style>
    <nav class="navbar navbar-expand-lg navbar-light shadow fixed-top bg-light">
        <div class="container d-flex justify-content-between align-items-center">

            <div class="navbar-brand text-success logo h1 align-self-center">
            <img src="./assets1/images/img/images/ESET.png">

        </div>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item ">
                            <a class="nav-link {{ (Route::currentRouteName() == 'homepage') ? 'activer' : '' }}" href="{{ route('homepage') }}">Home</a>
                        </li>
                        @if (session('LoginId_U'))
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::currentRouteName() == 'Dashboard') ? 'activer' : '' }}" href="{{ route('Dashboard') }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::currentRouteName() == 'Storepage') ? 'activer' : '' }}" href="{{route('Storepage')}}">courses</a>
                        </li>
                        @endif
                       
                     
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::currentRouteName() == 'contact') ? 'activer' : '' }}" href="{{route('contact')}}">Contact</a>
                        </li>
                        <!-- Dropdpwn    Menu  {New Student, Admin} -->
                      @if (session('LoginId_U'))
                      <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">logout</a>
                    </li>
                      @else
                      <li class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          Join now
                        </a>
                      
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li class="nav-item"><a class="dropdown-item" href="{{route('signup')}}">New Student</a></li>
                            <li class="nav-item"><a class="dropdown-item" href="{{route('login')}}">login</a></li>
                        </ul>
                    </li>
                      @endif
                     
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li> -->
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    {{-- <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                    </a> --}}
                    <!--a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-user text-dark mr-3"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">+99</span>
                    </a-->
                </div>
            </div>

        </div>
    </nav>
    <!-- Close Header -->