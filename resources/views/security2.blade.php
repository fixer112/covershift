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
<style type="text/css">
    body{
        background-color: #cee5f32b;
    }
</style>
    <link href="https://fonts.googleapis.com/css?family=Anton:200,600" rel="stylesheet" type="text/css">
    <title>London's flexible Event, Postroom & Facilities Assistants for hire</title>
    
</head>
<body>
    <div class="container">
        <div id="app" class="row">
            <div class="col-12 mx-auto">
                
                <div class="row">

                    <div class="col-6" style="margin-bottom: 0px">
                        
                    <p style="text-align: center;"><span style="color: red;font-size: 25px">
                    Thanks for visiting the Vacant Property Security Contact Page
                    <br>
                    <span style="color: black;text-align: center;">@</span>
                    <br>
                     CoverShift Security Solutions</span> 
                        <br>
                        <span>(A division of CoverShift: www.cover-shift.co.uk)</span>
                        <br> 
                         34 New House, <br>
                         Hatton Garden,<br>
                         London, EC1N 8JY,<br>
                         United Kingdom<br> Tel: 020 333 20135
                     </p>
                        

                    </div>

                   

                     <div class="col-6 client" style="margin-bottom: 10%">
                        <img src="{{ asset('/sia.jpeg')}}" alt="security" style="height: 100px;width: 150px;">
                        </div>

               

                    
                     

                    <div class="col-md-6" style="margin-bottom: 0px">

                    <div class="plane-border" style="margin-bottom: 10%">
                     <p style="text-align: center;"><span style="color: red;font-size: 20px">Why use our Empty Property Security Services?</span></p>
                     <ul style="margin-left: 10%;">
                        <li>Affordable & negotiable rates</li>
                        <li>Reliable manned guarding</li>
                        <li>SIA Licensed</li>
                     </ul>
                    </div>

                    <div class="plane-border" style="margin-bottom: 10%">
                     <p style="text-align: center;"><span style="color: red;font-size: 20px">CoverShift is a spe­cial­ist provider of security solutions in London & surrounding counties for :</span></p>
                     <ul style="margin-left: 10%;">
                        <li>Vacant, unoc­cu­pied and void prop­er­ties</li>
                        <li>Buildings undergoing refurbishment</li>
                        <li>Sites undergoing construction</li>
                        <li>Land guardianship</li>
                        <li>Occupy with court order</li>
                     </ul>
                 </div>

                    <div class="plane-border" style="margin-bottom: 10%">
                     <p style="text-align: center;"><span style="color: red;font-size: 20px;">We offer 5 core services in this regard :</span></p>
                     <ul style="margin-left: 10%;">
                        <li>24 /7 Security</li>
                        <li>Cleaning the property</li>
                        <li>Live -in- Guardian</li>
                        <li>Care for, Protect, manage and monitor any assets</li>
                        <li>Act as a deterrent against trespassers</li>
                        <li>Property Boarding-up Services</li>

                     </ul>
                 </div>
                 <div style="font-size: 18px">
                     <p>Our cus­tomers rely on our expert ser­vices to reduce the security costs of vacant properties as this could become long term projects.</p>

                     <p>Why pay so much when you can negotiate with us for an affordable quality security solution?</p>
                     </div>
                 </div>


                    <div class="col-md-6 client" style="margin-bottom: 0px">
                        <p style="color: blue; font-size: 16px">Please fill the short form below and we will get back to you with a budget quote. We take your privacy seriously. No details will be shared. <br> In the alternative you can send a quick email to: <br>covershiftservices@cover-shift.co.uk </p>

                        <div class="half">
                            <h4 style="text-align: center;text-align: center;font-weight: bold;color: red;">CONTACT FORM</h4>
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

                                <div class="form-group" id="spam">
                                    <input type="text" name="spam" value="">
                                </div>

                                <input type="text" name="msg" value="New Client Applied To security contact page" hidden>
                                <input type="text" name="ser" value="Covershift Security Solutions" hidden>
                                
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

                        <div class="client" style="margin-bottom: 0px">
                        <img src="{{ asset('/security2.jpeg')}}" alt="security" style="height: 250px">

                    </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
</html>