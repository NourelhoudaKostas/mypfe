
     
<link rel="stylesheet" href={{asset("assets/css/bootstrap.min.css")}}>
<link rel="stylesheet" href={{("assets/css/signup.css")}}>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">



<body> 
    <button class="btn btn-primary">
        <a class="text-white text-decoration-none" href="{{ route('homepage') }}">
            <i class="bi bi-arrow-left"></i> 
        </a>
    </button>  
    <div id="solar-system">
        <div class="sun"><img src="./assets1/images/signup/sun.jpg" alt="Sun"></div>
        <div id="mercury" class="planet"><img src="./assets1/images/signup/mercury1.jpg" alt="Mercury"></div>
        <div id="venus" class="planet"><img src="./assets1/images/signup/venus.jpeg" alt="Venus"></div>
        <div id="earth" class="planet"><img src="./assets1/images/signup/earth.jpg" alt="Earth"></div>
        <div id="mars" class="planet"><img src="./assets1/images/signup/mars.jpg" alt="Mars"></div>
        <div id="jupiter" class="planet"><img src="./assets1/images/signup/jupiter.jpeg" alt="Jupiter"></div>
        <div id="saturn" class="planet"><img src="./assets1/images/signup/saturn.jpg" alt="Saturn"></div>
        <div id="uranus" class="planet"><img src="./assets1/images/signup/uranus.png" alt="Uranus"></div>
        <div id="neptune" class="planet"><img src="./assets1/images/signup/neptune.png" alt="Neptune"></div>
    </div>

    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="form-container">
            <h5 class="text-primary text-uppercase mb-3 text-center" style="letter-spacing: 5px;">Sign Up</h5>
            <form  action="{{route('register_action')}}" name="signUpForm" id="signUpForm" novalidate="novalidate" class="form" method="POST" autocomplete="off">
                @csrf
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" class="form-control" placeholder="Your Name" required="required" autocomplete="off" data-validation-required-message="Please enter your name" />
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Your Email</label>
                    <input type="email" id="email" name="email" class="form-control" placeholder="Your Email" required="required" autocomplete="off" data-validation-required-message="Please enter your email" />
                    @error('email')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required" autocomplete="off" data-validation-required-message="Please enter a password" />
                    @error('password')
                        {{ $message }}
                    @enderror
                </div>
                <div class="form-group">
                    <label for="confirmPassword">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="confirmPassword" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" data-validation-required-message="Please confirm your password" />
                    @error('password_confirmation')
                        {{ $message }}
                    @enderror
                </div>
                
                <select name="playlist_id" class="form-select" aria-label="Default select example">
                    <option selected>Select playliste</option>
                    @foreach ($playlists as $playlist)
                        
                    <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                    @endforeach
                
                  </select>

                <button class="btn btn-primary" type="submit">Sign Up</button>
            </form>
        </div>
    </div>
</body>


