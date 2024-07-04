@extends('layout-app.formateur-app.formateurapp')
@section('title', 'Dashbord')
@section('content')
@include('layout-app.formateur-app.headerformateur')

  @include('layout-app.formateur-app.side-bar')
  <section class="welcome-section" style="text-align: center; padding: 50px 0; background-color: #f7f7f7;">
   <div class="container">
       <h1 style="font-size: 48px; color: #333;">Bonjour et Bienvenue !</h1>
       <p style="font-size: 24px; color: #666;">Nous sommes ravis de vous revoir</p>
       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300" style="width: 50%; margin-top: 30px;">
           <!-- Character Body -->
           <g id="character">
               <!-- Head -->
               <circle cx="200" cy="100" r="50" fill="#E2B27B"/>
               <!-- Body -->
               <rect x="175" y="150" width="50" height="100" fill="#E2B27B"/>
               <!-- Arms -->
               <rect x="150" y="150" width="25" height="100" fill="#E2B27B"/>
               <rect x="225" y="150" width="25" height="100" fill="#E2B27B"/>
               <!-- Legs -->
               <rect x="185" y="250" width="30" height="50" fill="#E2B27B"/>
               <rect x="205" y="250" width="30" height="50" fill="#E2B27B"/>
           </g>
           <!-- Speech Bubble -->
           <g id="speech-bubble">
               <path d="M100 200 Q 150 150, 200 200 Q 210 220, 200 240 Q 150 290, 100 240 Q 90 220, 100 200" fill="#f7f7f7" stroke="#333" stroke-width="2"/>
               <text x="200" y="210" font-family="Arial, sans-serif" font-size="24" fill="#333" text-anchor="middle">Bienvenue !</text>
           </g>
       </svg>
   </div>
</section>






 <footer class="footer">
 
   <p class="mb-0">&copy; 2024 ESET School. All Rights Reserved.</p> 
 </footer>
@endsection