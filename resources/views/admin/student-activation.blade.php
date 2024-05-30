@extends('layout-app.admin-app.appadmin')
@section('title', 'Dashboard')

@section('content')
    @include('layout-app.admin-app.headeradmin')
    <div class="container-fluid page-body-wrapper">
        @include('layout-app.admin-app.side-bar')
        <div class="container mt-2 col-12">
            <div>
                <div class="d-flex justify-content-between mb-3">
                    <h4>students</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addstudentModal">
                        Add New student
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
                                <th>module</th>
                                <th>Telephone</th>
                                <th>CIN</th>
                                <th>Course Code</th>
                                <th>age</th>
                                <th>gender</th>
                                <th>Action</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td><img src="{{ $student->profile_picture }}" alt="{{ $student->Username }}"  class="img-thumbnail" style="width: 50px;"></td>
                                    <td>{{ $student->Username }}</td>
                                    <td>{{ $student->email_student }}</td>
                                    <td>{{ $student->module }}</td>
                                    <td>{{ $student->telephone }}</td>
                                    <td>{{ $student->cin }}</td>
                                    <td>{{ $student->Course_Code }}</td>
                                    <td>{{ $student->age }}</td>
                                    <td>{{ $student->gender }}</td>
                                    
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="{{'#modalactiver'.$student->id}}">
                                            Activer 
                                        </button>   
                                    </td>
                                                                         
                                        {{-- <td>
                                            <form action="{{ route('deletestudent') }}" method="POST" class="d-inline">
                                                @csrf
                                                <input type="hidden" name="student_id" value="{{ $student->id }}">
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                            </form>
                                        </td> --}}
                                        
                                </tr>
                                 <!-- Modal for Editing student -->
                                <div class="modal fade" id="{{'modalactiver'.$student->id}}"  tabindex="-1" aria-labelledby="updatestudentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editstudentModalLabel">Edit student</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editstudentForm" action="{{route('student.activation.action',['id'=>$student->id])}}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="edit_Username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="edit_Username"  value="{{$student->Username}}"  name="Username">
                                                        
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="edit_email" name="email" value="{{ $student->email}}">
                                                    </div>
                                                    {{-- <div class="mb-3">
                                                        <label for="edit_email" class="form-label">password</label>
                                                        <input type="password" class="form-control" id="edit_email" name="password" >
                                                        <span
                                                        class="text-danger" >
                                                        @error('password')
                                                            {{ $message }}
                                                        @enderror </span>
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
                                            $('addstudentModal'.$student->id).modal({
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

    <!-- Modal for Adding student -->
    {{-- <div class="modal fade" id="addstudentModal" tabindex="-1" aria-labelledby="addstudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addstudentModalLabel">Edit student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editstudentForm" action="{{route('addstudent')}}" method="POST">
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
                        <div class="mb-3">
                            <label for="edit_module" class="form-label">module</label>
                            <input type="text" class="form-control" id="edit_module" name="module" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_specialite" class="form-label">filiere</label>
                            <select class="form-select" aria-label="Default select example" id="edit_specialite" name="specialite">
                                @foreach ( $specialte as $spe)
                                
                                <option  value="{{$spe->id}}">{{$spe->specialite}}</option>
                                
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="edit_course_code" class="form-label">Course Code</label>
                            <input type="text" class="form-control" id="edit_course_code" name="Course_Code"  required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_telephone" class="form-label">Telephone Number</label>
                            <input type="text" class="form-control" id="edit_telephone" name="telephone" required>
                        </div>
                        <div class="mb-3">
                            <label for="edit_cin" class="form-label">CIN</label>
                            <input type="text" class="form-control" id="edit_cin" name="cin" required>

                        </div>
                        </div>
                        <div class="mb-3">
                            <label for="edit_age" class="form-label">age</label>
                            <input type="text" class="form-control" id="edit_age" name="age" >
                        </div>
                         <div class="mb-3">
                            <label for="edit_gender" class="form-label">gender</label>
                            <input type="text" class="form-control" id="edit_gender" name="gender">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

@endsection

@section('scripte')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
    // Vérifier si un message de succès existe dans la session
    Swal.fire({
       // position: "top-end",
        icon: 'success',
        title: 'Succès!',
        text: '{{ session('success') }}',
        showConfirmButton: true,
        //timer: 1500 // Fermer automatiquement après 1.5 secondes
    });
</script>
@endif
@endsection



