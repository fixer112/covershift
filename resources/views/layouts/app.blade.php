<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/css/app.css" rel="stylesheet" type="text/css">
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <link href="/fontawesome/css/all.css" rel="stylesheet" type="text/css">
    <script src="/jquery/jquery.js" type="text/javascript" charset="utf-8"></script>
    {{-- <script src="/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script> --}}
    <script src="/js/app.js" type="text/javascript" charset="utf-8"></script>
    <script src="/js/vue.js" type="text/javascript" charset="utf-8"></script>
    @yield('head')

    <title>CoverShift | @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

</head>
<body>
    <header id="header" class="">
        <div>
            <img src="/covershift.jpeg" alt="" width="100%" height="100%">
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            {{-- <a class="navbar-brand" href="#">Hidden brand</a> --}}
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">

              <li class="nav-item menu-link">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item menu-link">
                <a class="nav-link" href="/hire">Hire Full Time Staff </a>
            </li>
            <li class="nav-item menu-link">
                <a class="nav-link" href="/about">About Us</a>
            </li>
            <li class="nav-item menu-link">
                <a class="nav-link" href="/contact">Contact </a>
            </li>
            
      {{-- <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
    </li> --}}
</ul>
    {{-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
  </form> --}}
</div>
</nav>
</header><!-- /header -->
<div class="container">
    <div id="app" class="row">

        @yield('content')

    </div>
</div>

<script>
    $(document).ready(function() {
      $('li.active').removeClass('active');
      $('a[href="' + location.pathname + '"]').closest('li').addClass('active'); 
  });

</script>
@yield('script')
<div class="row clients">
    <div class="col-12 mx-auto">
      <h2 style="text-align: center;font-weight: bold;color:white;margin-bottom: 20px;margin-top: 20px;">Trusted By</h2>  
  </div>
  <div class="col-12">
    <div class="row">
        <div class="col-3 client">
            <img src="/client1.jpg" alt="">
        </div>
        <div class="col-3 client">
            <img src="/client2.jpg" alt="">
        </div>
        <div class="col-3 client">
            <img src="/client3.jpg" alt="">
        </div>
        <div class="col-3 client ">
            <img src="/client4.jpg" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-3 client mx-auto">
            <img src="/client5.jpg" alt="">
        </div>
        <div class="col-3 client mx-auto">
            <img src="/client6.jpg" alt="">
        </div>
        <div class="col-3 client mx-auto">
            <img src="/client7.jpg" alt="">
        </div>
        <div class="col-3 client mx-auto">
            <img src="/client8.jpg" alt="">
        </div>
    </div>
</div>
</div>

<div class="footer">
    <div class="copyright">
        ©2016 CoverShift:34 New House,67-68 Hatton Garden, London, EC1N 8JY UK
    </div>
    
    <div class="feature">
        <span><i class="fa fa-thumbs-up"></i> Less Stress</span>
        <span><i class="fa fa-clock"></i> Save Time</span>
        <span><i class="fa fa-pound-sign"></i> Save Cost</span>

    </div>
    <div class="terms">
        <span><a href="/terms">Terms</a></span>
        <span><a href="/privacy">Privacy</a></span>
    </div>
    
</div>
</body>

</html>
