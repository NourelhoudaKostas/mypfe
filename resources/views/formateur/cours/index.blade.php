@extends('layout-app.formateur-app.formateurapp')
@section('title', 'Dashbord')
@section('content')
@include('layout-app.formateur-app.headerformateur')

@include('layout-app.formateur-app.side-bar')
<!-- resources/views/course/form.blade.php -->

<style>
   /* Form container */
   .form-container {
       max-width: 500px;
       margin: 20px auto;
       padding: 20px;
       border: 1px solid #ccc;
       border-radius: 8px;
       background-color: #f9f9f9;
       box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   }

   /* Form labels */
   .form-container label {
       font-weight: bold;
       margin-bottom: 8px;
       display: block;
       font-size: 18px;
       /* Adjust label font size */
   }

   /* Form input fields */
   .form-container input[type="text"],
   .form-container textarea,
   .form-container select,
   .form-container input[type="file"] {
       width: calc(100% - 12px);
       padding: 10px;
       margin-bottom: 15px;
       border: 1px solid #ccc;
       border-radius: 4px;
       box-sizing: border-box;
       font-size: 16px;
   }

   /* Form input fields focus */
   .form-container input[type="text"]:focus,
   .form-container textarea:focus,
   .form-container select:focus,
   .form-container input[type="file"]:focus {
       outline: none;
       border-color: #007bff;
   }

   /* Form submit button */
   .form-container button[type="submit"] {
       width: 100%;
       background-color: #007bff;
       color: white;
       padding: 12px 20px;
       border: none;
       border-radius: 4px;
       cursor: pointer;
       font-size: 18px;
       transition: background-color 0.3s ease;
   }

   /* Form submit button hover */
   .form-container button[type="submit"]:hover {
       background-color: #0056b3;
   }

   /* Error message */
   .text-danger {
       color: #dc3545;
       font-size: 14px;
       margin-top: 4px;
   }
   .details_title{
    display: flex;
    justify-content: space-between
   }
   .text-denger{
    
    font-size: 30px;
   
    
   }
   .accordion {
  background-color: #a3ccf0;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 25px;
  transition: 0.4s;
  border-radius: 20px;
  margin-top: 50px ;
 
  
}

.active, .accordion:hover {
  background-color: #574ddb; 
  color: #ffffff;
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
</style>

{{-- <div class="container-fluid py-5">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Courses</h1>
            <h1></h1>
        </div>
        --}} 
        <div class="form-container ">
         <form method="POST" action="{{ route('course.create.store') }}" class="p-4" enctype="multipart/form-data">
             @csrf
            
 
           
 
            <div class="mb-3">
                 <label for="title" class="form-label">Course Title:</label>
                 <input type="text" id="title" name="title" class="form-control">
                 <span class="text-danger">
                     @error('title')
                         {{ $message }}
                     @enderror
                 </span>
             </div>
 
 
             <div class="mb-3">
                 <label for="videoid" class="form-label">Video:</label>
                 <input type="file" id="videoid" name="video" class="form-control">
                 <span class="text-danger">
                     @error('video')
                         {{ $message }}
                     @enderror
                 </span>
             </div> 

             <select name="playlist_id" class="form-select" aria-label="Default select example">
               <option selected>Select playliste</option>
               @foreach ($playliste as $playlist)
                   
               <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
               @endforeach
           
             </select>
           
             
 
             <div class="mb-3">
                 <label for="description" class="form-label">Description:</label>
                 <textarea id="description" name="description" class="form-control"></textarea>
                 <span class="text-danger">
                     @error('description')
                         {{ $message }}
                     @enderror
                 </span>
             </div>
 
             <button type="submit" class="btn btn-primary">Submit</button>
         </form>
     </div>
        <section class="playlist-details">

            <h1 class="heading">Cours details</h1>




         
            @foreach ($playlistsWithCoures as $item)
         

                <button class="accordion details_title">{{ $item->name }}
                    <i class="fa-solid fa-circle-chevron-down"></i>
                </button>
                
          
            <div class="panel">
            <div class="row">
               
              
                   
              
              
               @foreach ($item->course as  $key => $course)
                          

               <div class="column">
              
            
                <div class="thumb">
                   {{-- <img src="images/thumb-1.png" alt=""> --}}
                   <video width="500" height="320" controls>
                      <source src="{{asset('storage/'.$course->video_path)}}" type="video/mp4">
                      Your browser does not support the video tag.
                  </video>
                   {{-- <span>10 videos</span> --}}
                </div>
             </div>
             <div class="column">
                {{-- <div class="tutor">
                   <img src="images/pic-2.jpg" alt="">
                   <div>
                      <h3>john deo</h3>
                      <span>21-10-2022</span>
                   </div>
                </div> --}}
          
                <div class="details">
                    <div class="details_title">
                        <h3>{{ $course->title }}</h3>
                        <h1 class="text-denger"><a href="{{ route('delete_course',$course->id) }}"><i class="fa-solid fa-trash-can" style="color: #c70000;"></i></a></h1>

                    </div>
                   <p>{{ $course->description }}</p>
                   <a href="teacher_profile.html" class="inline-btn">{{ $key + 1 }}</a>
                </div>
                
                
            </div>
            @endforeach
         
        </div>
    </div>
        @endforeach
         
         </section>
         {{-- @if($playlistes->count()>0)
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
         @endif --}}
@endsection
@section('scripte')
    <script>
        function slectfiliere(){
            var module = ;
        }
    </script>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;
        
        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
              panel.style.display = "none";
            } else {
              panel.style.display = "block";
            }
          });
        }
        </script>
@endsection