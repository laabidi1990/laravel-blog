<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <title>
        @yield('title')
    </title>

    <!-- Styles -->
    <link href="{{ asset('css/page.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css')}}" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="{{ asset('img/apple-touch-icon.png') }}">
    <link rel="icon" href="{{ asset('img/favicon.png') }} ">
  </head>

  <body>


    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-stick-dark" data-navbar="sticky">
      <div class="container">

        <div class="navbar-left">
          <button class="navbar-toggler" type="button">&#9776;</button>
          <a class="navbar-brand" href="{{ route('welcome') }}">
            <img class="logo-dark" src="{{ asset('img/logo-dark.png') }}" alt="logo">
            <img class="logo-light" src="{{ asset('img/logo-light.png') }}" alt="logo">
          </a>
        </div>

        <section class="navbar-mobile">
          <span class="navbar-divider d-mobile-none"></span>
   
        </section>
        @guest
          <a class="btn btn-xs btn-round btn-success mr-2" href="{{ route('login')}}">Login</a>
          @if (Route::has('register'))
            <a class="btn btn-xs btn-round btn-success" href="{{ route('register') }}">{{ __('Register') }}</a>
          @endif
          @else
          <li class="nav-item dropdown" style="list-style-type:none">
              <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" style="display:block; width:150%" href="#" role="button" 
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }} <span class="caret"></span>
              </a>

              <div class="dropdown-menu dropdown-menu-right text-center" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('edit-profile') }}">
                      My profile
                  </a>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" 
                          style="display: none;">
                      @csrf
                  </form>
              </div>
          </li>
        @endguest

      </div>
    </nav><!-- /.navbar -->


    <!-- Header -->

    @yield('header')

    <!-- /.header -->


    <!-- Main Content -->
    @yield('content')


    <!-- Footer -->
    <footer class="footer">
      <div class="container">
        <div class="row gap-y align-items-center">

          <div class="col-6 col-lg-3">
            <a href="../index.html"><img src="{{ asset('img/logo-dark.png') }}" alt="logo"></a>
          </div>

          <div class="col-6 col-lg-3 text-right order-lg-last">
            <div class="social">
              <a class="social-facebook" href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
              <a class="social-twitter" href="https://twitter.com"><i class="fa fa-twitter"></i></a>
              <a class="social-instagram" href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
              <a class="social-dribbble" href="https://dribbble.com"><i class="fa fa-dribbble"></i></a>
            </div>
          </div>

        </div>
      </div>
    </footer><!-- /.footer -->


    <!-- Scripts -->
    <script src="{{ asset('js/page.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e8777b769e9194b"></script>

  </body>
</html>
