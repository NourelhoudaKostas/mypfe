@extends('layout-app.homepage.app')
@section('title', 'Store Elearning')
@section('content')
@include('layout-app.homepage.header')
<!-- Make sure you have included Font Awesome library -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<br>
<br>

<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1 class="display-4 text-primary mb-4">À propos de nous</h1>
                <p class="lead">Bienvenue chez ESET Marrakech. votre partenaire de formation en ligne. Nous sommes passionnés par l'éducation et nous nous engageons à fournir des formations de qualité supérieure pour aider nos étudiants à réussir dans leur carrière.</p>
                <p>Nous offrons une variété de cours dans les domaines de l'informatique, du développement web, du design graphique, du marketing numérique et bien plus encore. Notre équipe d'experts est là pour vous guider à chaque étape du chemin.</p>
                <p>Rejoignez-nous aujourd'hui et découvrez comment nous pouvons vous aider à réaliser vos objectifs d'apprentissage et de carrière !</p>
                <!-- Modify the href attribute with your contact page URL or phone number -->
                <a href="tel:+212694265558" class="btn btn-primary btn-lg mt-4">Nous Contacter</a>
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center imgABOUT">
                <img src="./assets1/images/img/eset2.jpeg" alt="ESET Marrakech" class="img-fluid " style="width: 450px; height: 450px;">
            </div>
        </div>
    </div>
</div>

</div>

<div class="container my-5">
    <div class="row">
        <div class="col-md-12 text-center">
            <h2 class="display-4 text-dark mb-5">Pourquoi Nous Choisir</h2>
        </div>
    </div>
   

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card border-2 shadow-sm h-250">
            <div class="card-body text-center">
                <i class="fas fa-laptop  display-1 mb-3"></i>
                <h3 class="card-title">Formation en ligne</h3>
                <p class="card-text">Apprenez à votre rythme, où que vous soyez. Nos cours flexibles vous permettent d'accéder à l'apprentissage selon votre emploi du temps.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card border-2 shadow-sm h-250">
            <div class="card-body text-center">
                <i class="fas fa-award display-1 mb-3"></i>
                <h3 class="card-title">Qualité Supérieure</h3>
                <p class="card-text">Nos cours sont conçus et dispensés par des experts de l'industrie pour vous assurer une expérience d'apprentissage enrichissante.</p>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-4">
        <div class="card border-2 shadow-sm h-250">
            <div class="card-body text-center">
                <i class="fas fa-users  display-1 mb-3"></i>
                <h3 class="card-title">Communauté Active</h3>
                <p class="card-text">Rejoignez notre communauté d'apprenants passionnés et partagez vos expériences avec d'autres étudiants du monde entier.</p>
            </div>
        </div>
    </div>
</div>

</div>

@include('layout-app.homepage.foother')
@endsection
