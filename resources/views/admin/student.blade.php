@extends('layout-app.admin-app.appadmin')
@section('title', 'Dashboard')

@section('content')
    @include('layout-app.admin-app.headeradmin')
    <div class="container-fluid page-body-wrapper">
        @include('layout-app.admin-app.side-bar')
        <div class="container mt-2 col-12">
            <div>
                <div class="d-flex justify-content-between mb-3">
                    <h4>Students</h4>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addStudentModal">
                        Add New Student
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Profile Picture</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>cin</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td><img src="{{ $student->profile_picture }}" alt="{{ $student->Username }}" class="img-thumbnail" style="width: 50px;"></td>
                                    <td>{{ $student->Username }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>{{ $student->cin }}</td>
                                    <td>
                                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="{{'#updateStudentModal'.$student->id}}">
                                            Edit
                                        </button>
                                        <form action="{{ route('deletestudent') }}" method="POST" class="d-inline">
                                            @csrf
                                            <input type="hidden" name="student_id" value="{{ $student->id }}">
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal for Editing Student -->
                                <div class="modal fade" id="{{'updateStudentModal'.$student->id}}" tabindex="-1" aria-labelledby="updateStudentModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editStudentModalLabel">Edit Student</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editStudentForm" action="{{ route('updatestudent',['id'=>$student->id]) }}" method="POST">
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label for="edit_profile_picture">Profile Picture</label>
                                                        <input class="form-control" type="file" name="profile_picture" id="edit_profile_picture" value="{{$student->profile_picture}}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_Username" class="form-label">Username</label>
                                                        <input type="text" class="form-control" id="edit_Username" value="{{$student->Username}}" name="Username">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_email" class="form-label">Email</label>
                                                        <input type="email" class="form-control" id="edit_email" name="email" value="{{ $student->email }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="edit_cin" class="form-label">cin</label>
                                                        <input type="text" class="form-control" id="edit_cin" name="cin" value="{{$student->cin}}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Adding Student -->
    <div class="modal fade" id="addStudentModal" tabindex="-1" aria-labelledby="addStudentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addStudentForm" action="{{ route('addstudent') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="profile_picture" class="form-label">Profile Picture</label>
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="Username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="Username" name="Username" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="cin" class="form-label">cin</label>
                            <input type="text" class="form-control" id="cin" name="cin" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Student</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
