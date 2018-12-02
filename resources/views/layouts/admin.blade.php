<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <link rel="icon" href="./favicon.ico" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="./favicon.ico" />
    <!-- Generated: 2018-04-16 09:29:05 +0200 -->
    <title>CoverShift | @yield('title')</title>
    <link href="{{ asset('/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    {{-- <link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <script src="{{ asset('/js/app.js')}}" type="text/javascript" charset="utf-8"></script>
    {{-- <script src="{{ asset('/js/require.min.js')}}"></script> --}}
    <script>
      requirejs.config({
          baseUrl: '.'
      });
    </script>
    <!-- Dashboard Core -->
    <link href="{{ asset('/css/dashboard.css')}}" rel="stylesheet" />
    <script src="{{ asset('/js/dashboard.js')}}"></script>
    {{-- <link href="{{ asset('/css/app.css')}}" rel="stylesheet" type="text/css"> --}}
    {{-- <link href="{{ asset('/css/style.css')}}" rel="stylesheet" type="text/css"> --}}
    <!-- c3.js Charts Plugin -->
    {{-- <link href="{{ asset('/plugins/charts-c3/plugin.css')}}" rel="stylesheet" />
    <script src="{{ asset('/plugins/charts-c3/plugin.js')}}"></script>
    <!-- Google Maps Plugin -->
    <link href="{{ asset('/plugins/maps-google/plugin.css')}}" rel="stylesheet" />
    <script src="{{ asset('/plugins/maps-google/plugin.js')}}"></script>
    <!-- Input Mask Plugin -->
    <script src="{{ asset('/plugins/input-mask/plugin.js')}}"></script> --}}
  </head>
  <body class="">
    <div class="page">
      <div class="page-main">
        <div class="header py-4">
          <div class="container">
            <div class="">
              <a class="header-brand" href="{{url('/admin')}}">
                <img src="{{ asset('/logo.jpg')}}" class="header-brand-img" alt="tabler logo">
              </a>
              
                
                <div class="dropdown">
                  <a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
                    {{-- <span class="avatar" style="background-image: url(./demo/faces/female/25.jpg)"></span> --}}
                    <span class="ml-2 d-none d-lg-block">
                      <span class="text-default">{{Auth::user()->fname}}</span>
                      <small class="text-muted d-block mt-1">Administrator</small>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    
                    <a class="dropdown-item" href="{{url('/logout')}}">
                      <i class="dropdown-icon fe fe-log-out"></i> Sign out
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" class="header-toggler d-lg-none ml-3 ml-lg-0" data-toggle="collapse" data-target="#headerMenuCollapse">
                <span class="header-toggler-icon"></span>
              </a>
            </div>
          </div>
        </div>
        <div class="header collapse d-lg-flex p-0" id="headerMenuCollapse">
          <div class="container">
            <div class="row align-items-center">
              {{-- <div class="col-lg-3 ml-auto">
                <form class="input-icon my-3 my-lg-0">
                  <input type="search" class="form-control header-search" placeholder="Search&hellip;" tabindex="1">
                  <div class="input-icon-addon">
                    <i class="fe fe-search"></i>
                  </div>
                </form>
              </div> --}}
              <div class="col-lg order-lg-first">
                <ul class="nav nav-tabs border-0 flex-column flex-lg-row">
                  <li class="nav-item">
                    <a href="./index.html" class="nav-link active"><i class="fe fe-home"></i> Home</a>
                  </li>
                  
                  {{-- <li class="nav-item dropdown">
                    <a href="javascript:void(0)" class="nav-link" data-toggle="dropdown"><i class="fe fe-calendar"></i> Components</a>
                    <div class="dropdown-menu dropdown-menu-arrow">
                      <a href="./maps.html" class="dropdown-item ">Maps</a>
                      <a href="./icons.html" class="dropdown-item ">Icons</a>
                      <a href="./store.html" class="dropdown-item ">Store</a>
                      <a href="./blog.html" class="dropdown-item ">Blog</a>
                      <a href="./carousel.html" class="dropdown-item ">Carousel</a>
                    </div>
                  </li> --}}
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="my-3 my-md-5">
          <div class="container">
            <div class="page-header">
              <h1 class="page-title">
                Dashboard
              </h1>
            </div>
            <div class="row row-cards">
              <div class="col-6  col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    {{-- <div class="text-right text-green">
                      6%
                      <i class="fe fe-chevron-up"></i>
                    </div> --}}
                    <div class="h1 m-0">{{count($paids)}}</div>
                    <div class="text-muted mb-4">No of paid</div>
                  </div>
                </div>
              </div>
              <div class="col-6  col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    {{-- <div class="text-right text-red">
                      -3%
                      <i class="fe fe-chevron-down"></i>
                    </div> --}}
                    <div class="h1 m-0">{{count($unpaids)}}</div>
                    <div class="text-muted mb-4">No of Unpaid</div>
                  </div>
                </div>
              </div>
              <div class="col-6  col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    {{-- <div class="text-right text-green">
                      9%
                      <i class="fe fe-chevron-up"></i>
                    </div> --}}
                    <div class="h1 m-0">£@money($paids->sum('total'))</div>
                    <div class="text-muted mb-4">Amounts Paid</div>
                  </div>
                </div>
              </div>
              <div class="col-6  col-lg-3">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    {{-- <div class="text-right text-green">
                      3%
                      <i class="fe fe-chevron-up"></i>
                    </div> --}}
                    <div class="h1 m-0">£@money($unpaids->sum('total'))</div>
                    <div class="text-muted mb-4">Amounts Unpaid</div>
                  </div>
                </div>
              </div>
              {{-- <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                      -2%
                      <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">$95</div>
                    <div class="text-muted mb-4">Daily Earnings</div>
                  </div>
                </div>
              </div>
              <div class="col-6 col-sm-4 col-lg-2">
                <div class="card">
                  <div class="card-body p-3 text-center">
                    <div class="text-right text-red">
                      -1%
                      <i class="fe fe-chevron-down"></i>
                    </div>
                    <div class="h1 m-0">621</div>
                    <div class="text-muted mb-4">Products</div>
                  </div>
                </div>
              </div> --}}
              
            <div class="row row-cards row-deck">
              
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Paid Invoices</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table text-nowrap" id="data">
                     {{--  card-table table-vcenter text-nowrap --}}
                      <thead>
                        <tr>
                          <th class="w-1">Invoice No</th>

                          <th>Title</th>
                          <th>Price</th>
                          <th>Total</th>
                          <th>Van Hour</th>
                          <th>From To</th>
                          <th>Days Needed</th>
                          <th>Dates</th>
                          <th>No of staff</th>
                          <th>Shift Hour</th>
                          <th>Summary</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Number</th>
                          <th>Company Name</th>
                          <th>Work Address</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($paids as $paid)
                          @php
                          $user = $users->where('id', $paid->user_id)->first();
                          @endphp
                        <tr>
                          <td><span class="text-muted"><a href="{{url('/summary/'.$paid->invoice_id)}}">{{$paid->invoice_id}}</a></span></td>
                          <td><a href="{{url('/summary/'.$paid->invoice_id)}}" class="text-inherit">{{$paid->title}}</a></td>
                          <td>{{$paid->price}}</td>
                          <td>{{$paid->total}}</td>
                          <td>{{$paid->van ? $paid->van_hour: '0' }}</td>
                          <td>{{$paid->from.' to '.$paid->to}}</td>
                          <td>{{$paid->days_needed}}</td>
                          <td>{{$paid->dates}}</td>
                          <td>{{$paid->staff_num}}</td>
                          <td>{{$paid->shift_hour}}</td>
                          <td>{{$paid->summary}}</td>
                          <td>{{$paid->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$paid->mobile}}</td>
                            <td>{{$paid->company_name}}</td>
                            <td>{{$paid->address}}</td>
                        </tr>
                          @endforeach
                          {{-- <tr>
                          <td><span class="text-muted">001401</span></td>
                          <td><a href="invoice.html" class="text-inherit">Design Works</a></td>
                          <td>
                            Carlson Limited
                          </td>
                          <td>
                            87956621
                          </td>
                          <td>
                            15 Dec 2017
                          </td>
                          <td>
                            <span class="status-icon bg-success"></span> Paid
                          </td>
                          <td>$887</td>
                          <td class="text-right">
                            <a href="javascript:void(0)" class="btn btn-secondary btn-sm">Manage</a>
                            <div class="dropdown">
                              <button class="btn btn-secondary btn-sm dropdown-toggle" data-toggle="dropdown">Actions</button>
                            </div>
                          </td>
                          <td>
                            <a class="icon" href="javascript:void(0)">
                              <i class="fe fe-edit"></i>
                            </a>
                          </td>
                        </tr> --}}
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">UnPaid Invoices</h3>
                  </div>
                  <div class="table-responsive">
                    <table class="table text-nowrap" id="data" style="width: 100%;cursor: pointer;" cellspacing="0">
                     {{--  card-table table-vcenter text-nowrap --}}
                      <thead style="width: 100%">
                        <tr>
                          <th class="w-1">Invoice No</th>

                          <th>Title</th>
                          <th>Price</th>
                          <th>Total</th>
                          <th>Van Hour</th>
                          <th>From To</th>
                          <th>Days Needed</th>
                          <th>Dates</th>
                          <th>No of staff</th>
                          <th>Shift Hour</th>
                          <th>Summary</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Number</th>
                          <th>Company Name</th>
                          <th>Work Address</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach($unpaids as $unpaid)
                          @php
                          $user = $users->where('id', $unpaid->user_id)->first();
                          @endphp
                        <tr>
                          <td><span class="text-muted"><a href="{{url('/summary/'.$unpaid->invoice_id)}}">{{$unpaid->invoice_id}}</a></span></td>
                          <td><a href="{{url('/summary/'.$unpaid->invoice_id)}}" class="text-inherit">{{$unpaid->title}}</a></td>
                          <td>{{$unpaid->price}}</td>
                          <td>{{$unpaid->total}}</td>
                          <td>{{$unpaid->van ? $unpaid->van_hour: '0' }}</td>
                          <td>{{$unpaid->from.' to '.$unpaid->to}}</td>
                          <td>{{$unpaid->days_needed}}</td>
                          <td>{{$unpaid->dates}}</td>
                          <td>{{$unpaid->staff_num}}</td>
                          <td>{{$unpaid->shift_hour}}</td>
                          <td>{{$unpaid->summary}}</td>
                          <td>{{$unpaid->name}}</td>
                          <td>{{$user->email}}</td>
                          <td>{{$unpaid->mobile}}</td>
                          <td>{{$unpaid->company_name}}</td>
                          <td>{{$unpaid->address}}</td>
                        </tr>
                          @endforeach
                          
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-8">
              <div class="row">
                <div class="col-6 col-md-3">
                  <ul class="list-unstyled mb-0">
                    <li><a href="#">First link</a></li>
                    <li><a href="#">Second link</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3">
                  <ul class="list-unstyled mb-0">
                    <li><a href="#">Third link</a></li>
                    <li><a href="#">Fourth link</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3">
                  <ul class="list-unstyled mb-0">
                    <li><a href="#">Fifth link</a></li>
                    <li><a href="#">Sixth link</a></li>
                  </ul>
                </div>
                <div class="col-6 col-md-3">
                  <ul class="list-unstyled mb-0">
                    <li><a href="#">Other link</a></li>
                    <li><a href="#">Last link</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0">
              Premium and Open Source dashboard template with responsive and high quality UI. For Free!
            </div>
          </div>
        </div>
      </div> --}}
      <footer class="footer">
        <div class="container">
          <div class="row align-items-center flex-row-reverse">
           {{--  <div class="col-auto ml-lg-auto">
              <div class="row align-items-center">
                <div class="col-auto">
                  <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item"><a href="./docs/index.html">Documentation</a></li>
                    <li class="list-inline-item"><a href="./faq.html">FAQ</a></li>
                  </ul>
                </div>
                <div class="col-auto">
                  <a href="https://github.com/tabler/tabler" class="btn btn-outline-primary btn-sm">Source code</a>
                </div>
              </div>
            </div> --}}
            <div class="col-12 col-lg-auto mt-3 mt-lg-0 text-center">
              Copyright © 2018 <a href=".">CoverShift</a>. Theme by <a href="https://codecalm.net" target="_blank">codecalm.net</a> All rights reserved.
            </div>
          </div>
        </div>
      </footer>
    </div>
    {{-- <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script> --}}


    <script src="{{ asset('/vendor/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/sb-admin-datatables.min.js') }}"></script>
    @yield('js')
  </body>
</html>