@extends('layout-app.formateur-app.formateurapp')
@section('title', 'Dashbord')
@section('content')
@include('layout-app.formateur-app.headerformateur')

@include('layout-app.formateur-app.side-bar')
<!-- resources/views/course/form.blade.php -->

{{-- <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Courses</h1>
            <h1></h1>
        </div>
        --}} 
        <section class="playlist-details">

            <h1 class="heading">playlist details</h1>
         
            <div class="row">
         
               <div class="column">
                  <form action="" method="post" class="save-playlist">
                     <button type="submit"><i class="far fa-bookmark"></i> <span>save playlist</span></button>
                  </form>
            
                  <div class="thumb">
                     <img src="images/thumb-1.png" alt="">
                     <span>10 videos</span>
                  </div>
               </div>
               <div class="column">
                  <div class="tutor">
                     <img src="images/pic-2.jpg" alt="">
                     <div>
                        <h3>john deo</h3>
                        <span>21-10-2022</span>
                     </div>
                  </div>
            
                  <div class="details">
                     <h3>complete HTML tutorial</h3>
                     <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum minus reiciendis, error sunt veritatis exercitationem deserunt velit doloribus itaque voluptate.</p>
                     <a href="teacher_profile.html" class="inline-btn">view profile</a>
                  </div>
               </div>
            </div>
         
         </section>
         @if($playlistes->count()>0)
         @foreach ($playlistes as $playliste)
         <section class="playlist-videos">
            <h1 class="heading">{{$playliste->name}}</h1>
            <div class="box-container">
             @foreach ($courses as $course)
             <a class="box" href="{{route('course.lire',['id'=>$course->id])}}">
                <i class="fas fa-play"></i>
                <img src="{{Storage::url($course->image_path)}}" alt="">
                <h3>{{$course->title}}</h3>
                <h4>{{$course->description}}</h4>
             </a>
             @endforeach
            </div>
         </section>
         @endforeach
         @else
         <section class="playlist-videos">
            <h1 class="heading">playlist videos not found</h1>
         </section>
         @endif
@endsection
@section('scripte')
    <script>
        function slectfiliere(){
            var module = ;
        }
    </script>
@endsection