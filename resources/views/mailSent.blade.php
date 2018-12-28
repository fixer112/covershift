<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
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

    <!-- Fonts -->
    <meta name="description" content="Book Online or contact us today for that Temporary shift cover: Event Assistants, Postroom & Facilities Assistants. London's best hands to cover staff absences">

    <link href="https://fonts.googleapis.com/css?family=Anton:200,600" rel="stylesheet" type="text/css">
    <title>London's flexible Event, Postroom & Facilities Assistants for hire</title>
    
</head>
<body>
    <div class="container">
        <div id="app" class="row">
            <div class="col-12 mx-auto">
                 @if (session('mail'))
                 <div class="alert alert-success col-10 mx-auto">
                    <center>
                        <div style="font-size: 20px">
                         <p>Great!</p>
                         <p>Message Successfully sent</p>
                        </div>

                        <div style="font-size: 16px">
                            <p>Thanks for contacting us<br>we will get back to you shortly.</p>
                            <p>-{{session('ser')}}</p>
                        </div>
                    </center>
                 </div>
                 @endif
            </div>
        </div>
    </div>
</body>
</html>