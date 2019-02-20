<header role="banner">
      <div class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-9 social">
            @if (Route::has('login'))
              @auth
                <a href="{{ url('homesuper') }}"><span class="fa fa-home">&nbsp;Home</span></a>
              @else
                <a href="{{ route('login') }}"><span class="fa fa-circle-o">&nbsp;Login</span></a>
                <a href="{{ route('register') }}"><span class="fa fa-plus-circle">&nbsp;Register</span></a>
              @endauth
            @endif
            </div>
            <div class="col-3 search-top">
              <!-- <a href="#"><span class="fa fa-search"></span></a> -->
              <form action="#" class="search-top-form">
                <span class="icon fa fa-search"></span>
                <input type="text" id="s" placeholder="Type keyword to search...">
              </form>
            </div>
          </div>
        </div>
      </div>

      <div class="container logo-wrap">
        <div class="row pt-5">
          <div class="col-12 text-center">
            <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
            <h1 class="site-logo"><a href="{{ route('beranda')}}"><h4><img src="/upload/Himafik.png" alt="Himafik" style="width:15%; height:15%;"></h4><h5><i>Himpunan Mahasiswa Fakultas Komputer</i></h5></a></h1>
          </div>
        </div>
      </div>
      
      <nav class="navbar navbar-expand-md  navbar-light bg-light">
        <div class="container">
          
         
          <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav mx-auto">
              <li class="nav-item">
                <a class="nav-link active" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
              </li>
            </ul>
            
          </div>
        </div
      </nav>
    </header>
    <!-- END header -->
