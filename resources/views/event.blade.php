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
    <title>Event Security & Steward Services</title>

</head>
<body>
    <div class="container">
        <div id="app" class="row">
            <div class="col-12 mx-auto">
                <div style="margin-bottom:30px;text-align:center">

                        <h2 style="color:blue">Thanks for visiting our<br>
                            Event Security & Steward Services<br>
                            Contact Page<br>
                                    <span style="color:black">@</span>
                        <h2>
                        <h3 style="color:red">CoverShift Services <h3>
                        <h4>
                                ( www.cover-shift.co.uk)<br>
                                34 New House,<br>
                                Hatton Garden,<br>
                                London, EC1N 8JY,<br>
                                United Kingdom<br>
                                Tel: 020 333 20135

                        </h4>

                </div>
                <div style="margin-bottom:30px">
                    <p style="color:blue;font-size:20px;font-weight: bold;">
                        We are your one-stop shop in London & its Counties for affordable Event Security staff,
                        Event Steward & Vacant Property Security.
                    </p>
                </div>

                <div class="row">
                    <div class="col-6 client" style="">
                        <img src="{{ asset('/event1.jpg')}}" alt="security" style="height: 70%;">
                    </div>

                    <div class="col-6 client" style="">
                            <img src="{{ asset('/event2.jpg')}}" alt="security" style="height: 70%;">
                        </div>
                </div>

                <div class="plane-border col-12 mx-auto" style="margin-bottom:30px;font-weight:bold;font-size:17px;padding-left: 20px;">

                    <h4 style="color:red;font-weight:bold;text-decoration:underline;">Our Event Security & Steward Services:</h4>
                    <ul>
                        <li>Cost effective & Negotiable</li>
                        <li>Reliable</li>
                        <li>Professional</li>
                        <li>Safety focused</li>
                        <li>Skilled crowd control</li>

                    </ul>

                </div>

                <div class="plane-border col-12 mx-auto" style="margin-bottom:30px;font-weight:bold;font-size:17px;padding-left: 20px;">

                    <h4 style="color:red;font-weight:bold;text-decoration:underline;">Our Empty or Void Building Security Services offer:</h4>
                    <ul>
                        <li>Affordable & Negotiable 24 /7 Security</li>
                        <li>Cleaning the property</li>
                        <li>Live -in- Guardians + Regular Patrol</li>
                        <li>Care for, Protect, manage and monitor any assets</li>
                        <li>Act as a deterrent against trespassers & vandalism</li>
                        <li>Property Boarding-up Services</li>


                    </ul>

                </div>

                <div class="col-10 mx-auto">

                        <p style="color:blue;font-size:18px;font-weight: bold;">
                            Please fill the short form below and we will get back to you shortly. We take your privacy seriously. No details will be shared.<br>
                            In the alternative you can send a quick email to: covershiftservices@cover-shift.co.uk

                        </p>
                        <div class="half">
                            <h4 style="text-align: center;text-align: center;font-weight: bold;color: red;">CONTACT FORM</h4>
                            <form  class="form-horizontal" method="POST" action="/kec-mail">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mx-auto">

                                    <div class="input">
                                        <label for="name" class="control-label">Name</label>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') }}"required autofocus>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('req') ? ' has-error' : '' }}">

                                    <div class="input">
                                        <label for="req" class="control-label">Request</label>
                                        <textarea name="req" class="form-control" required autofocus>{{ old('req') }}</textarea>{{--
                                        <input type="text" class="form-control" name="request" value="{{ old('request') }}"required autofocus> --}}
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                                    <div class="input">
                                        <label for="email" class="control-label">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"required autofocus>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('email_confirmation') ? ' has-error' : '' }}">

                                    <div class="input">
                                        <label for="email_confirmation" class="control-label">Confirm Email</label>
                                        <input type="email" class="form-control" name="email_confirmation" value="{{ old('email_confirmation') }}"required autofocus>
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">

                                    <div class="input">
                                        <label for="number" class="control-label">Contact Number (Optional)</label>
                                        <input type="text" class="form-control" name="number" value="{{ old('number') }}" autofocus>
                                    </div>
                                </div>

                                <input type="text" name="msg" value="New Client Applied To Event Security & Steward Services" hidden>
                                <input type="text" name="ser" value="Event Security & Steward Services" hidden>

                                <button type="submit" class="btn btn-success">
                                    Send
                                </button>
                            </form>
                        </div>

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                </div>
            </div>

        </div>
    </div>
</body>
</html>
