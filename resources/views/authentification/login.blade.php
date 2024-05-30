@extends('layout-app.form-template.layout-form')
@section('title', 'login')
@section('content')

<link rel="stylesheet" href={{asset("assets/css/bootstrap.min.css")}}>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">


<div class="d-flex justify-content-start mb-3">
    <a class="btn btn-primary text-white text-decoration-none" href="{{ route('homepage') }}">
        <i class="bi bi-arrow-left"></i>
    </a>
</div>
<div class="container">
    <section class="d-flex justify-content-center">
        <span class="span1"></span>
        <span class="span1"></span>
        <span class="span1"></span>
        <span class="span1"></span>
        <span class="span1"></span>
    </section>
    <div class="row justify-content-center">
        <div class="limiter">
            <div class="container">
                <div class="form-container">
                    <h5 class="text-primary text-center mb-3" style="letter-spacing: 5px;">Login</h5>
                    <form class="login100-form validate-form" action="{{ route('login_action') }}" method="POST">
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                        @if (Session::has('fail'))
                            <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                        @endif
                        @csrf
                        <div class="wrap-input100">
                            <label for="email" class="form-label text-light">Email</label>
                            <span class="text-danger">
                                @error('Email') {{ $message }} @enderror
                            </span>
                            <input type="email" class="input100 btn-circle" id="email" name="email" placeholder="Email" required>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="wrap-input100">
                            <label for="password" class="form-label text-light">Password</label>
                            <input type="password" class="input100 btn-circle" id="password" name="password" placeholder="Password" required>
                            <span class="focus-input100"></span>
                        </div>
                        <div class="d-grid wrap-input100">
                            <button class="btn btn-primary btn-block btn-circle" type="submit">Login</button>
                        </div>
                        <div class="text-center mt-3">
                            <a class="text-secondary" href="{{ route('ForGetpassword') }}">Forgot Username / Password?</a>
                        </div>
                        <div class="text-center mt-3">
                            <span class="text-secondary">Don't have an account?</span>
                            <a class="text-primary" href="{{ route('signup') }}">Create your Account <i class="fa fa-long-arrow-right ms-1" aria-hidden="true"></i></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
