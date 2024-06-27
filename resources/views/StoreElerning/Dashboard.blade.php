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
            @foreach ($tests as $item)
          
            <div class="col-md-6">
                <h1 class="display-4 text-primary mb-4">Hi  {{ $item->user->Username }}</h1>

                @if ($item->score >= $item->playlist->questions->count()/2)
                <h1 class="display-4 text-primary mb-4">You passed the test {{ $item->playlist->name }}</h1>
                    @else
                    <h1 class="display-4 text-primary mb-4">You failed the test {{ $item->playlist->name }}</h1>

                @endif
                <p>Nous offrons une variété de cours dans les domaines de l'informatique, du développement web, du design graphique, du marketing numérique et bien plus encore. Notre équipe d'experts est là pour vous guider à chaque étape du chemin.</p>           <p>Merci d'avoir créé et partagé votre quiz avec nous. Que vos étudiants réussissent ou échouent, nous sommes ici pour les soutenir et pour vous aider à améliorer votre contenu. Rejoignez-nous aujourd'hui et découvrez comment nous pouvons collaborer pour atteindre nos objectifs d'apprentissage et de carrière !</p>                         <!-- Modify the href attribute with your contact page URL or phone number -->
                <h4>Num questions : {{ $item->playlist->questions->count() }}</h4>
                <h4>your score : {{ $item->score }}</h4>
                @if ($item->score >= $item->playlist->questions->count() / 2)
                <a href="{{ route('Diplôme') }}" class="btn btn-primary btn-lg mt-4">Download Diploma</a>

                @else
                <a href="{{ route('Storepage') }}" class="btn btn-primary btn-lg mt-4">Try again</a>

            @endif
            </div>
            <div class="col-md-6 d-flex align-items-center justify-content-center imgABOUT">
                <img src="./assets1/images/img/eset2.jpeg" alt="ESET Marrakech" class="img-fluid " style="width: 450px; height: 450px;">
            </div>

                  
            @endforeach

        </div>
    </div>
</div>

</div>



</div>

@include('layout-app.homepage.foother')
@endsection
