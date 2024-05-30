@extends('layout-app.form-template.layout-form')
@section('title', 'Forgetpassword')
@section('content')
    <div class="limiter">
        <div class="container-login100  ">
            <div class="wrap-login100 ">
                <div class="login100-pic ">
                    <img src={{ asset('assets/formtempalte/images/img-01.png') }} alt="IMG">
                </div>

                <form class="login100-form validate-form" action="{{route('forget_action')}}" method="POST">
                    @if (Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if (Session::has('fail'))
                        <div class="alert alert-danger">{{ Session::get('fail') }}</div>
                    @endif
                    @csrf
                    <!--span class="login100-form-title">
                        Login
                    </span-->
                    <span class="symbol-input100">
                        <i class="fa fa-envelope text-primary" aria-hidden="true"></i>
                    </span>
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100 btn-circle" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn btn-block  btn-circle " type="submit">
                            send
                        </button>
                    </div>

                    <div class="text-center my-2 p-t-136">
                        <a class="txt2  text-secondary" href="{{ route('login') }}">
                            Do you have acount ,Login
                            <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
