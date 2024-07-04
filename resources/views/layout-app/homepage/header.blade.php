{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .activer { color: rgb(255, 51, 0) !important; }
        .nav-link .fa-sign-out-alt { font-size: 1.5rem; /* Adjust size as needed */ }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow fixed-top bg-light">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="navbar-brand text-success logo h1 align-self-center"><img src="./assets1/images/img/images/ESET.png"></div>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item"><a class="nav-link {{ (Route::currentRouteName() == 'homepage') ? 'activer' : '' }}" href="{{ route('homepage') }}">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('propos') }}">À propos</a></li>
                        @if (session('LoginId_U'))
                        <li class="nav-item"><a class="nav-link {{ (Route::currentRouteName() == 'Dashboard') ? 'activer' : '' }}" href="{{ route('Dashboard') }}">dashboard</a></li>
                        <li class="nav-item"><a class="nav-link {{ (Route::currentRouteName() == 'Storepage') ? 'activer' : '' }}" href="{{ route('Storepage') }}">Cours</a></li>
                        @endif
                       <li class="nav-item"><a class="nav-link {{ (Route::currentRouteName() == 'contact') ? 'activer' : '' }}" href="{{ route('contact') }}">Contact</a></li> 
                        @if (session('LoginId_U'))
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i></a></li>
                        @else
                        <li class="dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">S'inscrire</a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <li class="nav-item"><a class="dropdown-item" href="{{ route('signup') }}">Nouveau Étudiant</a></li>
                                <li class="nav-item"><a class="dropdown-item" href="{{ route('login') }}">Connexion</a></li>
                            </ul>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-4"><h1>Hello</h1></div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .activer { color: rgb(255, 51, 0) !important; }
        .nav-link .fa-sign-out-alt { font-size: 1.5rem; /* Adjust size as needed */ }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light shadow fixed-top bg-light">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="navbar-brand text-success logo h1 align-self-center">
                <img src="./assets1/images/img/images/ESET.png" alt="Logo">
            </div>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="templatemo_main_nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="align-self-center collapse navbar-collapse flex-fill d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::currentRouteName() == 'homepage') ? 'activer' : '' }}" href="{{ route('homepage') }}">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('propos') }}">À propos</a>
                        </li>
                        @if (session('LoginId_U'))
                            <li class="nav-item">
                                <a class="nav-link {{ (Route::currentRouteName() == 'Dashboard') ? 'activer' : '' }}" href="{{ route('Dashboard') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (Route::currentRouteName() == 'Storepage') ? 'activer' : '' }}" href="{{ route('Storepage') }}">Cours</a>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a class="nav-link {{ (Route::currentRouteName() == 'contact') ? 'activer' : '' }}" href="{{ route('contact') }}">Contact</a>
                        </li>
                        @if (session('LoginId_U'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt"></i>
                                </a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                    S'inscrire
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('signup') }}">Nouveau Étudiant</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="dropdown-item" href="{{ route('login') }}">Connexion</a>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Hello</h1>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
