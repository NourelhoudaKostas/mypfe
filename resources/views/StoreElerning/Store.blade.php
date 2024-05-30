@extends('layout-app.homepage.app')
@section('title', 'Store Elearning')
@section('content')
@include('layout-app.homepage.header')
<style>
      /* Error message */
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
    /* display: flex;
    justify-content: space-between; */
    text-align: center;

   }
   .qs{
    background-color: #0056b3;
    border-radius: 20px;
    padding: 10px;
   }
   .qs h3 {
    color: #fff ;
   }
   .text-denger{
    
    font-size: 30px;
   
    
   }
   .qsm h1{
    color: #343a40 !important;
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
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="get" class="modal-content modal-body border-0 p-0">
                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Courses Start -->
    <!-- Formation HTML -->
<div class="container-fluid py-5 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 class="text-primary text-uppercase mb-3" style="letter-spacing: 5px;">Formation Diplomé</h1>
        </div>
        <div class="row">
            <!-- Formation details -->
             
            @foreach ($playlistsWithCoures as $item)
         

                <button class="accordion details_title">{{ $item->name }} Coursera
                    <i class="fa-solid fa-circle-chevron-down"></i>
                </button>
                
          
            <div class="panel">
            <div class="row">
               
              
                   
              
              
               @foreach ($item->course as  $key => $course)
                          

               <div class="col-5">
              
            
                <div class="thumb">
                   {{-- <img src="images/thumb-1.png" alt=""> --}}
                   <video width="500" height="320" controls>
                      <source src="{{ asset('Admin/video/' . basename($course->video_path)) }}" type="video/mp4">
                      Your browser does not support the video tag.
                  </video>
                   {{-- <span>10 videos</span> --}}
                </div>
             </div>
             <div class="col-7">
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

                    </div>
                   <p>{{ $course->description }}</p>
                   <h5>episode {{ $key + 1 }}</h5>
                </div>
                
                
            </div>
            @endforeach
         
        </div>
    </div>
        @endforeach
       
        </div>
       @if ($test->score < $test->questionCount / 2)

           
       
        {{-- questions --}}
       

        @foreach ($playliste as $item)
        

        <button class="accordion details_title">{{ $item->name }} Quizzes
            <i class="fa-solid fa-circle-chevron-down"></i>
        </button>
        
        

    <div class="panel">
        @foreach ($item->questions as $questions)
            <div class="details_title qsm">
       <h1>{{ $questions->question_text }}</h1>
    </div>
    <form action="{{ route('tests.store') }}" method="POST">
        @csrf
        <input type="hidden" name="playlist_id" value="{{ $questions->playlist_id }}">
        

    <div class="row text-center">
       

      @foreach ($questions->answers as  $answers)

      
      <input type="hidden" name="question_id_{{ $answers->question_id }}" value="{{ $answers->question_id }}">

      <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
        <input value="{{ $answers->id }}" type="radio" class="btn-check" name="answers_{{ $questions->id }}" id="btnradio{{ $answers->id }}" autocomplete="off">
        <label class="btn btn-outline-primary" for="btnradio{{ $answers->id }}">{{ $answers->answer_text }}</label>
    </div>
@endforeach
            
    </div>
            @endforeach

            <button type="submit">Submit Test</button>
        </form>

            </div>
            @endforeach
      
    {{-- end questions --}}
    @endif
    </div>

</div>
<!-- Formation End -->

<style>
    /* Formation card animation */
    .formation-card {
        transition: transform 0.3s ease;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .formation-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }

    /* Fade-in animation for formation details */
    .fade-in {
        animation: fadeInAnimation 1s ease-in-out forwards;
    }

    @keyframes fadeInAnimation {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Styling for formation details */
    .formation-details {
        padding: 20px;
        border-radius: 0 0 10px 10px;
        background-color: #f8f9fa;
    }

    .formation-title {
        color: #343a40;
        font-size: 24px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .formation-description {
        color: #6c757d;
        font-size: 16px;
        line-height: 1.6;
        margin-bottom: 20px;
    }

    .formation-list {
        margin-bottom: 20px;
        padding-left: 20px;
    }

    .formation-list li {
        color: #6c757d;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .formation-button {
        background-color: #007bff;
        border: none;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-transform: uppercase;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }

    .formation-button:hover {
        background-color: #0056b3;
    }
</style>
    <!-- Courses End -->
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
        <script src="https://kit.fontawesome.com/e9ea9ee727.js" crossorigin="anonymous"></script>
    @include('layout-app.homepage.foother')
@endsection