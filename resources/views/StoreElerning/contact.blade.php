@extends('layout-app.homepage.app')
@section('title', 'Store Elearning')
@section('content')
@include('layout-app.homepage.header')
<div class="container-fluid py-5 contact">
    <br>
    <br>
    <br>
    <div class="row "> 
            <div class="image col-lg-6">
                <img src="./assets1/images/img/contact-img.svg" alt="">
            </div>
        <div class="col-lg-6 box">
           
                <form name="sentMessage" action="{{route('contactus')}}" method="Post" id="contactForm" novalidate="novalidate">
                    @csrf
                    <div class="mb-4">
                        <h3 class="text-center text-info">Nous contacter</h3>
                        @if (Session::has('success'))
                            <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @endif
                    </div>
                    <div class="form-group control-group">
                        <input type="text" name="yourname" class="form-control border-0 p-4" id="name" placeholder=" Name" required="required" data-validation-required-message="Please enter your name" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group control-group">
                        <input type="email" name="email" class="form-control border-0 p-4" id="email" placeholder=" Email" required="required" data-validation-required-message="Please enter your email" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group control-group">
                        <input type="text" name="téléphone," class="form-control border-0 p-4" id="subject" placeholder="téléphone, " required="required" data-validation-required-message="Please enter a téléphone" />
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="form-group control-group">
                        <textarea class="form-control border-0 py-3 px-4" rows="5" name="message" id="message" placeholder="Message" required="required" data-validation-required-message="Please enter your message"></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary py-3 px-5" type="submit" id="sendMessageButton">Envoyez un message</button>
                    </div>
                </form>
            
        </div>
    </div>
</div>

    
    @include('layout-app.homepage.foother')
@endsection