@extends('layout-app.admin-app.appadmin')
@section('title', 'Admin Profile')

@section('content')
  @include('layout-app.admin-app.headeradmin')
      @if (session('success'))
          <div class="alert alert-success" role="alert">
              {{ session('success') }}
          </div>
      @endif

      @if (session('fail'))
          <div class="alert alert-danger" role="alert">
              {{ session('fail') }}
          </div>
      @endif

      <div class="row">
          <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                  <div class="card-body">
                      <h4 class="card-title">Profile Information</h4>

                      @isset($editMode)  {{-- Check if edit mode is active --}}
                      <form class="forms-sample" method="POST" action="{{ route('profile_admin') }}">  {{-- Update route with ID --}}
                          @csrf  {{-- CSRF token for security --}}
                          @method('PUT')  {{-- HTTP method for update --}}

                          <div class="form-group">
                              <label for="username">Username</label>
                              <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $admin->Username) }}" disabled>  {{-- Display username, disabled for security --}}
                          </div>

                          <div class="form-group">
                              <label for="email">Email Address</label>
                              <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $admin->email) }}">  {{-- Pre-fill email, editable --}}
                          </div>

                          <div class="form-group">
                              <label for="name">Name</label>
                              <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $admin->name) }}">  {{-- Pre-fill name, editable --}}
                          </div>

                          <div class="form-group">
                              <label for="profile_picture">Profile Picture (Optional)</label>
                              <input type="file" class="form-control" id="profile_picture" name="profile_picture">  {{-- File input for profile picture --}}
                          </div>

                          <button type="submit" class="btn btn-primary mr-2">Update Profile</button>
                      </form>
                      @else  {{-- If not in edit mode --}}
                      <form class="forms-sample" method="POST" action="{{ route('profile_admin') }}">  {{-- Update route with ID --}}
                          @csrf  {{-- CSRF token for security --}}
                          @method('PUT')  {{-- HTTP method for update --}}

                          <div class="form-group">
                              <label for="username">Username</label>
                              {{-- <span>{{ $admin->Username }}</span>  Display username as text --}}
                          </div>

                          <div class="form-group">
                              <label for="email">Email Address</label>
                              {{-- <span>{{ $admin->email }}</span>  Display email as text --}}
                          </div>

                          <div class="form-group">
                              <label for="name">Name</label>
                              <span>{{ $admin->name }}</span>  {{-- Display name as text --}}
                          </div>

                          <a href="{{ route('profile_admin') }}" class="btn btn-primary">Edit Profile</a>  {{-- Edit link --}}
                      </form>
                      @endif

                      {{-- Password Change Section --}}
                      <hr>
                      <h4 class="card-title">Change Password</h4>

                      <form class="forms-sample" method="POST" action="{{ route('admin.password.update') }}">  {{-- Password update route --}}
                          @csrf  {{-- CSRF token for security --}}

                          <div class="form-group">
                              <label for="current_password">Current Password</label>
                              <input type="password" class="form-control" id="current_password" name="current_password" required>  {{-- Required field --}}
                          </div>

                          <div class="form-group">
                              <label for="new_password">New Password</label>
                              <input type="password" class="form-control"


@endsection
