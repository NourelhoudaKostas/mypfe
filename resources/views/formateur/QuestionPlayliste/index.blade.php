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

.details_title2 {
    display: flex;
    justify-content: end
   
     
}
.details_title2 label{
   margin-left: 10px;
   margin-right: 10px;
   
     
}
.qsm{
    
    padding-left: 20px;
    padding-right: 20px;
    padding-top: 24px
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
         <form method="POST" action="{{ route('Question.create.store') }}" class="p-4" enctype="multipart/form-data">
             @csrf
            
 
           
             @if ($errors->any())
             <div class="alert alert-danger">
                 <ul>
                     @foreach ($errors->all() as $error)
                         <li>{{ $error }}</li>
                     @endforeach
                 </ul>
             </div>
         @endif
        
 
 
          

             <select name="playlist_id" class="form-select" aria-label="Default select example">
               <option selected>Select playliste</option>
               @foreach ($playliste as $playlist)
                   
               <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
               @endforeach
           
             </select>
           
             
             <div class="mb-3">
                <label for="title" class="form-label">Question :</label>
                <input type="text" id="title" name="question" class="form-control">
                <span class="text-danger">
                    @error('title')
                        {{ $message }}
                    @enderror
                </span>
            </div>

            <div class="mb-3">
                <label class="form-label">Answers:</label>
                <div class="answer-container">
                    @for ($i = 1; $i <= 4; $i++)
                    <div class="answer">
                        <label>Answer {{ $i }}</label>
                        <input type="text" name="answer_{{ $i }}" class="form-control">
                        <div class="details_title2">
                        <label for="correct_answer_{{ $i }}">True</label>
                        <input id="correct_answer_{{ $i }}" type="radio" name="correct_answer_{{ $i }}" value="true">
                        <label for="correct__{{ $i }}">False</label>
                        <input id="correct__{{ $i }}" type="radio" name="correct_answer_{{ $i }}" value="false">
                    </div>
                    </div>
                    @endfor
                </div>
            </div>
        
 
             <button type="submit" class="btn btn-primary">Submit</button>
         </form>
     </div>
        <section class="playlist-details">

            <h1 class="heading">Question + answers</h1>



            @foreach ($playliste as $item)
         

            <button class="accordion details_title">{{ $item->name }}
                <i class="fa-solid fa-circle-chevron-down"></i>
            </button>
            
      
        <div class="panel">
            @foreach ($item->questions as $questions)
                <div class="details_title qsm">
           <h1>{{ $questions->question_text }}</h1>
           <h1 class="text-denger"><a href="{{ route('delete_Question',$questions->id) }}"><i class="fa-solid fa-trash-can" style="color: #c70000;"></i></a></h1>
        </div>
        <div class="row">
           
          
               
          
          
          @foreach ($questions->answers as  $answers)
                      

       
         <div class="column">
          
      
            <div class="details">
                <div class="details_title">
                    <h3>{{ $answers->answer_text }}</h3>

                </div>
               @if ($answers->is_correct == 1)
                   <p>true</p>
                   @else 
                   <p>false</p>
               @endif
            </div>
            
            
        </div>
        @endforeach 
     
    </div>
    @endforeach
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