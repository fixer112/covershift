<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Contact us today for Deep Kitchen Clean, Cleanup of accumulated grease, fat & Kitchen Ventilation on commercial and domestic kitchen. Certification will be provided.">
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
    <link href="https://fonts.googleapis.com/css?family=Anton:200,600" rel="stylesheet" type="text/css">
    <title>Affordable Kitchen Equipment Deep Cleaning Services</title>
    <link rel="stylesheet" href="">
</head>
<body>
    <div class="container">
    <div id="app" class="row">
    <div class="col-12 mx-auto">
        <p style="color: blue;text-align: center;font-size: 20px">Thanks for visiting our Kitchen Equipment & Kitchen Deep Clean Contact Page</p>
        <p style="text-align: center;">@</p>
        <p style="text-align: center;"><span style="color: red;font-size: 25px">CoverShift Cleaning Services</span> <br>
        <span>(A division of CoverShift: www.cover-shift.co.uk)</span><br> 
        34 New House, Hatton Garden, London, EC1N 8JY, United Kingdom<br> Tel: 020 333 20135</p>

        <div class="row">
            <div class="col-6 client">
                <img src="{{ asset('/kec1.jpeg')}}" alt="">
                <p style="font-size: 14px;text-align: center;">Kitchen Equipment Deep Clean</p>
            </div>
            <div class="col-6 client">
                <img src="{{ asset('/kec2.jpeg')}}" alt="">
                <p style="font-size: 14px;text-align: center;">Fryers, Grills & Ovens</p>
            </div>
            {{-- <div class="col-3 client">
                <img src="{{ asset('/kec3.jpeg')}}" alt="">
            </div>
            <div class="col-3 client">
                <img src="{{ asset('/kec4.jpeg')}}" alt="">
            </div> --}}
        </div>
            <h3 style="color: red;font-weight: bold;margin-top: 30px;">OUR KITCHEN DEEP CLEANING OFFERS</h3> 
        <div style="border: solid 2px red;border-radius: 5px;">
            <ul style="font-size: 17px">
                <li>Deep cleaning accumulated grease and fat on commercial and domestic kitchen equipment.</li>
                <li>Kitchen ventilation clean.</li>
                <li>Deep clean less accessible  surfaces and fittings to rid your kitchen of any  potential breeding ground for bacteria.</li>
            </ul>
        </div>

        <div style="margin-top: 30px;font-size: 16px">
            <p style="">Full certification will be provided for regulatory and insurance purposes. This keeps you inline with the Hygiene Standards set out by the Food Safety Act 1990 and the Food Hygiene Regulations 2006.</p>

        <p style="color: blue">Our rates are affordable and negotiable. We operate with minimum disruption to your schedule.</p>

        <p style="color: green">Please fill the short form below and we will get back to you shortly. We take your privacy seriously. No details will be shared. <br> In the alternative you can send a quick email to: <br>covershiftservices@cover-shift.co.uk </p>
    </div>
    <div class="col-10 mx-auto">
        <h4 style="text-align: center;text-align: center;font-weight: bold;margin-top: 50px;color: red;">CONTACT FORM</h4>
        <div style="" class="half">
        <form {{-- v-on:keydown.enter.prevent.self --}} class="form-horizontal" method="POST" action="/kec-mail">
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

            <input type="text" name="msg" value="New Client Applied To Kitchen Equipment Cleaning" hidden>
            <input type="text" name="ser" value="Covershift Cleaning Services" hidden>
            
            <button type="submit" class="btn btn-success">
                Send
            </button>
        </form>
    

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
</div>
</body>
</html>