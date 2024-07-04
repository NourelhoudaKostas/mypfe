@extends('layout-app.admin-app.appadmin')
@section('title', 'Dashboard')

@section('content')
    @include('layout-app.admin-app.headeradmin')
    <div class="container-fluid page-body-wrapper">
        @include('layout-app.admin-app.side-bar')
        <div class="container mt-2 col-12">
            <div>
                <div class="d-flex justify-content-between mb-3">
                    <h4>Formateurs</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFormateurModal">
                        Add New Formateur
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-primary"> <!-- Adding the table-primary class for a beautiful blue background -->
                            <tr>
                                <th>#</th>
                                <th>Profile Picture</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>specialite</th>
                                <th>Telephone</th>
                                <th>CIN</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($formateurs as $formateur)
                                <tr>
                                    <td>{{ $formateur->id }}</td>
                                    <td><img src="{{ $formateur->profile_picture }}" alt="{{ $formateur->Username }}"  class="img-thumbnail" style="width: 50px;"></td>
                                    <td>{{ $formateur->Username }}</td>
                                    <td>{{ $formateur->email_formateur }}</td>
                                    <td>{{ $formateur->specialite }}</td>
                                    <td>{{ $formateur->telephone }}</td>
                                    <td>{{ $formateur->cin }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="{{'#updateFormateurModal'.$formateur->id}}">
                                            edit 
                                        </button>                                        
                                        <td>
                                            <form action="{{ route('deleteformateur') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="formateur_id" value="{{ $formateur->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this formateur?')">Delete</button>
                                            </form>
                                        </td>
                                        
                                    </td>
                                </tr>
                                 <!-- Modal for Editing Formateur -->
                                <div class="modal fade" id="{{'updateFormateurModal'.$formateur->id}}"  tabindex="-1" aria-labelledby="updateFormateurModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editFormateurModalLabel">Edit Formateur</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editFormateurForm" action="{{route('updateformateur',['id'=>$formateur->id])}}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="profile_picture">Image</label>
                                                        <input class="modalInput" type="file" name="profile_picture" id="editprofile_picture" value="{{$formateur->profile_picture}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_Username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="edit_Username"  value="{{$formateur->Username}}"  name="Username">
                                                        
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="edit_email" name="email" value="{{ $formateur->email_formateur }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_email" class="form-label">password</label>
                                                        <input type="password" class="form-control" id="edit_email" name="password" >
                                                        <span
                                                        class="text-danger" >
                                                        @error('password')
                                                            {{ $message }}
                                                        @enderror </span>
                                                    </div>
                                                    {{-- <div class="mb-3">
                                                        <label for="edit_type_cours" class="form-label">Type of Course</label>
                                                        <input type="text" class="form-control" id="edit_type_cours" name="type_cours" value="{{$formateur->type_cours}}"  >
                                                    </div> --}}
                                                    <div class="mb-3">
                                                        <label for="edit_specialite" class="form-label">specialité</label>
                                                        <select class="form-select" aria-label="Default select example" id="edit_specialite" name="specialite">
                                                          
                                                            
                                                            <option  value="devlopement">devlopement</option>
                                                                 <option  value="gestion">gestion</option>

                                                        
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_telephone" class="form-label">Telephone Number</label>
                                                        <input type="text" class="form-control" id="edit_telephone" name="telephone" value="{{$formateur->telephone}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_cin" class="form-label">CIN</label>
                                                        <input type="text" class="form-control" id="edit_cin" name="cin" value="{{ $formateur->cin }}">
                                                    </div>
                                                    {{-- <div class="mb-3">
                                                        <label for="edit_course_code" class="form-label">Course Code</label>
                                                        <input type="text" class="form-control" id="edit_course_code" name="Course_Code" value="{{$formateur->Course_Code}}">
                                                    </div> --}}
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- @section('scripts') 
                                @parent
                                @if ($errors->has('password'))
                                    <script>
                                        $(function() {
                                            $('addFormateurModal'.$formateur->id).modal({
                                                show: true
                                            });
                                        });
                                    </script>
                                @endif
                                @endsection--}}
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding Formateur -->
    <div class="modal fade" id="addFormateurModal" tabindex="-1" aria-labelledby="addFormateurModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addFormateurModalLabel">Edit Formateur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editFormateurForm" action="{{route('addformateur')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_Username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="edit_Username" name="Username" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="edit_email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_email" class="form-label">password</label>
                            <input type="password" class="form-control" id="edit_email" name="password" required>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="edit_type_cours" class="form-label">Type of Course</label>
                            <input type="text" class="form-control" id="edit_type_cours" name="type_cours" required>
                        </div> --}}
                        <div class="mb-3">
                            <label for="edit_specialite" class="form-label">specialité</label>
                            <select class="form-select" aria-label="Default select example" id="edit_specialite" name="specialite">
                               
                                
                                <option  value="devlopement">devlopement</option>
                                <option  value="gestion">gestion</option>

                           
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_telephone" class="form-label">Telephone Number</label>
                            <input type="text" class="form-control" id="edit_telephone" name="telephone" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_cin" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="edit_cin" name="cin" required>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="edit_course_code" class="form-label">Course Code</label>
                            <input type="text" class="form-control" id="edit_course_code" name="Course_Code"  required>
                        </div> --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripte')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('fail'))
<script>
        Swal.fire({
        icon: "error",
        //title: "Oops...",
        title: '{{ session('fail') }}',

        })
</script>
@endif
@endsection

