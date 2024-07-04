<header class="header">
   
  <section class="flex">

     <a  class="logo"> ESET</a>

     <form action="search.html" method="post" class="search-form">
        <input type="text" name="search_box" required placeholder="search courses..." maxlength="100">
        <button type="submit" class="fas fa-search"></button>
     </form>
     <style>
      .icons {
          display: flex;
          align-items: center;
      }
      .icons .fas, .icons a.fas {
          font-size: 1.5rem; /* Adjust size as needed */
          cursor: pointer;
         
      }
      .icons .fas:last-child, .icons a.fas:last-child {
        
      }
  </style>

     <div class="container mt-4">
      <div class="d-flex align-items-center icons">
          <div id="menu-btn" class="fas fa-bars"></div>
          <div id="search-btn" class="fas fa-search"></div>
          <div id="user-btn"><a class="fas fa-sign-out-alt" href="{{ route('logout') }}"></a></div>
          <div id="toggle-btn" class="fas fa-sun"></div>
      </div>
  </div>

     {{-- <div class="profile">
        <img src="images/pic-1.jpg" class="image" alt="">
        <button class="flex-btn">
           <a href="login.html" class="option-btn">login</a>
           <a href="{{route('logout')}}" class="option-btn"></a>
           <a class="nav-link" href="{{ route('logout') }}">
            <i class="fas fa-sign-out-alt">logout</i>
           </a>
        </button>
     </div> --}}
  </section>

</header> 