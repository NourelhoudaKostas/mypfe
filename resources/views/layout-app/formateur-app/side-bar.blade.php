<div class="side-bar">

  <div id="close-btn">
     <i class="fas fa-times"></i>
  </div>

  {{-- <div class="profile">
     <img src="images/pic-1.jpg" class="image" alt="">
     <h3 class="name">{{$formateur->Username}}</h3>
     <p class="role">studen</p>
     <a href="profile.html" class="btn">view profile</a>
  </div> --}}

  <nav class="navbar">
     <a class="{{ (Route::currentRouteName() == 'dashbord_formateur') ? 'activee' : '' }}" href="{{ route('dashbord_formateur')}}"><i class="fas fa-home"></i><span>home</span></a>
     {{-- <a href="about.html"><i class="fas fa-question"></i><span>about</span></a> --}}
     <a class="{{ (Route::currentRouteName() == 'playlistes.create') ? 'activee' : '' }}" href="{{ route('playlistes.create')}}"><i class="fas fa-graduation-cap  "></i><span>creation</span></a>
     <a class="{{ (Route::currentRouteName() == 'course.view') ? 'activee' : '' }}" href="{{ route('course.view')}}"><i class="fas fa-graduation-cap "></i><span>coureses</span></a>
     <a class="{{ (Route::currentRouteName() == 'Question.view') ? 'activee' : '' }}" href="{{ route('Question.view')}}"><i class="fas fa-chalkboard-user "></i><span>Question</span></a>

     {{-- <a href="{{ route('Answer.view')}}"><i class="fas fa-chalkboard-user"></i><span>Answer</span></a> --}}
     {{-- <a href="contact.html"><i class="fas fa-headset"></i><span>contact us</span></a> --}}
  </nav>

</div>
