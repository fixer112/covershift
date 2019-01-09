<!doctype html>
<!--CoverShift
Developed by Altechtic Solutions | altechtic.com.ng | +2348106813749
 -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/app.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/fontawesome/css/all.css')}}" rel="stylesheet" type="text/css">
    <script src="{{ asset('/jquery/jquery.js')}}" type="text/javascript" charset="utf-8"></script>
    {{-- <script src="/bootstrap/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script> --}}
    <script src="{{ asset('/js/app.js')}}" type="text/javascript" charset="utf-8"></script>
    <script src="{{ asset('/js/vue.js')}}" type="text/javascript" charset="utf-8"></script>
    @yield('head')

    <title>CoverShift | @yield('title')</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

</head>
<body>
    <header id="header" class="">
        <div>
            <img src="{{asset('/Covershift.jpg')}}" alt="" width="100%" height="100%" ref="header">
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            {{-- <a class="navbar-brand" href="#">Hidden brand</a> --}}
            <ul class="navbar-nav mx-auto mt-2 mt-lg-0">

              <li class="nav-item menu-link">
                <a class="nav-link" href="{{url('')}}/">Home</a>
            </li>
            <li class="nav-item menu-link">
                <a class="nav-link" href="{{url('/event')}}">Event Security & Steward</a>
            </li>
            <li class="nav-item menu-link">
                <a class="nav-link" href="{{url('/about')}}">About Us</a>
            </li>
            <li class="nav-item menu-link">
                <a class="nav-link" href="{{url('/contact')}}">Contact </a>
            </li>

            <li class="nav-item menu-link">
                <a class="nav-link" href="{{url('/labour')}}">General Labour Services </a>
            </li>
            <li class="nav-item menu-link">
                <a class="nav-link" href="{{url('/security')}}">Vacant Property Security</a>
            </li>

            <li class="nav-item menu-link">
                <a class="nav-link" href="{{url('/kec')}}">Kitchen Deep Cleaning</a>
            </li>
            {{-- <li class="nav-item menu-link">
                <a class="nav-link" href="{{url('/kec2')}}">KEC2</a>
            </li> --}}

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

        {{-- <div class="col-12 mx-auto">
            @if (session('success'))
            <div class="alert alert-success  mx-auto">
                {{ session('success') }}
                @if(session('download'))
                <strong><a href="{{session('download')}}">Download Reciept</a></strong>
                @endif
            </div>
            @endif

            @if (session('failed'))
            <div class="alert alert-danger  mx-auto">
                {{ session('failed') }}
            </div>
            @endif

        </div> --}}

        @yield('content')

    </div>
</div>

<script>
    var url = "{{url('/')}}";
    var home = "{{url('')}}";
    $(document).ready(function() {
      $('li.active').removeClass('active');
      $('a[href="' + url + location.pathname + '"]').closest('li').addClass('active');
  });

</script>
@yield('script')
<div class="row clients">
    <div class="col-12 mx-auto">
      <h5 style="text-align: center;font-weight: bold;margin-bottom: 20px;margin-top: 20px;">Trusted By</h5>
  </div>
  <div class="col-12">
    <div class="row">
        <div class="col-3 client">
            <img src="{{ asset('/client1.jpg')}}" alt="">
        </div>
        <div class="col-3 client">
            <img src="{{ asset('/client2.jpg')}}" alt="">
        </div>
        <div class="col-3 client">
            <img src="{{ asset('/client3.jpg')}}" alt="">
        </div>
        <div class="col-3 client ">
            <img src="{{ asset('/client4.jpg')}}" alt="">
        </div>
    </div>
    <div class="row">
        <div class="col-3 client mx-auto">
            <img src="{{ asset('/client5.jpg')}}" alt="">
        </div>
        <div class="col-3 client mx-auto">
            <img src="{{ asset('/client6.jpg')}}" alt="">
        </div>
        <div class="col-3 client mx-auto">
            <img src="{{ asset('/client7.jpg')}}" alt="">
        </div>
        <div class="col-3 client mx-auto">
            <img src="{{ asset('/client8.jpg')}}" alt="">
        </div>
    </div>
</div>
</div>

<div class="footer">
    <div class="paypal d-none d-sm-block">
        <img src="{{asset('/paypal.jpeg')}}" alt="" style="float: left;height: 50px;width: 100px">
    </div>
    <div class="copyright d-none d-sm-block">
        ©2016 CoverShift: 34 New House, 67-68 Hatton Garden, London, EC1N 8JY, United Kingdom.
    </div>

     <div class="copyright d-sm-none">
        ©2016 CoverShift: <br> 34 New House, <br> 67-68 Hatton Garden, <br> London,<br> EC1N 8JY, <br> United Kingdom.
    </div>

    <div class="paypal d-sm-none">
        <img src="{{asset('/paypal.jpeg')}}" alt="" class="mx-auto" style="height: 50px;width: 100px">
    </div>

    {{-- <div class="feature">
        <span><i class="fa fa-thumbs-up"></i> Less Stress</span>
        <span><i class="fa fa-clock"></i> Save Time</span>
        <span><i class="fa fa-pound-sign"></i> Save Cost</span>

    </div> --}}
    <div class="terms">
        <span><a href="{{url('/terms')}}">Terms</a></span>
        <span><a href="{{url('/privacy')}}">Privacy</a></span>
    </div>

</div>
</body>

</html>
