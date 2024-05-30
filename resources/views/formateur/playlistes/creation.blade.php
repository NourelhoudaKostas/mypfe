@extends('layout-app.formateur-app.formateurapp')
@section('title', 'Dashbord')
@section('content')
    @include('layout-app.formateur-app.headerformateur')

    @include('layout-app.formateur-app.side-bar')

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
        .table{
            width: 80%;
            margin: auto;
            text-align: start;
            background-color: white;
            padding: 10px;
            margin-bottom: 30px
        }
        .table thead tr th{
          
            text-align: start;
            padding-bottom: 10px
        }
    </style>


    <div class="form-container ">
        <form method="POST" action="{{ route('playlistes.create.store') }}" class="p-4" enctype="multipart/form-data">
            @csrf
           

            <div class="mb-3"  id="divnewplayliste">
                <label for="newplayliste" class="form-label" >new playliste:</label>
                <input type="text" id="newplayliste" name="newplayliste" class="form-control">
                <span class="text-danger">
                    @error('newplayliste')
                        {{ $message }}
                    @enderror
                </span>
            </div>

         
            <div class="mb-3">
                <label for="imageid" class="form-label">Image:</label>
                <input type="file" id="imageid" name="image" class="form-control">
                <span class="text-danger">
                    @error('image')
                        {{ $message }}
                    @enderror
                </span>
            </div> 
       

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
  
    <div>
        <table class="table">
            <thead>
                <tr>
                   
                    <th scope="col">image</th>
                    <th scope="col">playliste</th>
                    <th scope="col">description</th>
                    <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($playliste as $item)
                    <tr>
                        
                        <td>
                            <img src="{{ asset('Admin/images/' . basename($item->image_path)) }}" alt="" width="100px" height="100px">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td><a href="{{ route('delete_playlist',$item->id) }}"><i class="fa-solid fa-trash-can" style="color: #b7060f;"></i></a></td>
                    
                    </tr>
                    @endforeach
                    </tbody>
                    </table>

    </div>


@endsection
@section('scripte')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: "success",
                //title: "Oops...",
                title: '{{ session('success') }}',

            })
        </script>
    @endif
    <script>
        var playlistes = document.getElementById('playliste');
        var newplaylistes = document.getElementById('divnewplayliste');

        function checkplayliste() {
            if(playlistes.value == 0){
                newplaylistes.style.display = "block";
            }else{
                newplaylistes.style.display = "none"; 
            }
        }
    </script>
@endsection
