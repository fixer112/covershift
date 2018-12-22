@extends('layouts.app')

@section('title')
London's flexible Event, Postroom & Facilities Assistants for hire
@endsection

@section('head')
<meta name="description" content="Book Online or contact us today for that Temporary shift cover: Event Assistants, Postroom & Facilities Assistants. London's best hands to cover staff absences">
@endsection

@section('content')
{{-- <div class="col-12 mx-auto">
<p class="title">Contact</p>
   <div class="detail">
   	<p>For booking enquiries, questions & clarifications, please send us a mail to:</p>

   	<p>helpinghands@cover-shift.co.uk</p>


   	<strong>Phone:</strong>
   	<p>020 333 2015</p>
   </div>
</div> --}}
<div class="col-12 mx-auto">
				<h3 style="text-align: center;margin-bottom: 20px;color: blue;">Welcome to our Vacant Property Security <br> Contact Page</h3>
                <div class="row">

                    <div class="col-6" style="margin-bottom: 0px">
                    	<p style="font-size: 25px;font-weight: bold;text-align: center;">@</p>
                    <p style="text-align: center;"><span style="color: red;font-size: 25px">CoverShift Security Solutions</span> 
                        <br>
                        <span>(A division of CoverShift: www.cover-shift.co.uk)</span>
                        <br> 
                         34 New House, <br>
                         Hatton Garden,<br>
                         London, EC1N 8JY,<br>
                         United Kingdom<br> Tel: 020 333 2015
                     </p>
                        

                    </div>

                    <div class="col-6 client" style="margin-bottom: 0px">
                        <img src="{{ asset('/security1.jpeg')}}" alt="security" style="height: 70%">
                        {{-- <p style="font-size: 14px;text-align: center;">Kitchen Equipment Deep Clean</p> --}}

                    </div>

               

                    <div class="col-6" style="margin-bottom: 0px">
                     <p style="text-align: center;"><span style="color: red;font-size: 25px">Why use our Property Security Solutions</span></p>
                     <ul style="margin-left: 10%;">
                     	<li>Affordable & negotiable rates</li>
                     	<li>Reliable manned guarding</li>
                     	<li>SIA Licensed</li>
                     </ul>
                     </div>

                     <div class="col-6 client" style="margin-bottom: 0px">
                         <img src="{{ asset('/security2.jpeg')}}" alt="security" style="height: 70%">
                         <{{-- p style="font-size: 14px;text-align: center;">Fryers, Grills & Ovens</p> --}}
                     </div>

                

                     {{-- <div class="col-md-6 client"  style="margin-bottom: 0px">
                            <h4 style="color: red;font-weight: bold;">OUR KITCHEN DEEP CLEANING OFFERS</h4>
                        <div style="border: solid 2px red;border-radius: 5px;">
                            <ul style="font-size: 18px">
                                <li style="color: green">Deep cleaning accumulated grease and fat on commercial and domestic kitchen equipment.</li>
                                <li>Kitchen ventilation clean.</li>
                                <li style="color: blue">Deep clean less accessible  surfaces and fittings to rid your kitchen of any  potential breeding ground for bacteria.</li>
                            </ul>
                        </div>
                        <div style="margin-top: 30px;font-size: 17px;">
                            <p style="color: green">Full certification will be provided for regulatory and insurance purposes. This keeps you inline with the Hygiene Standards set out by the Food Safety Act 1990 and the Food Hygiene Regulations 2006.</p>

                            <p style="margin-top: 30px">Our rates are affordable and negotiable. We operate with minimum disruption to your schedule.</p>

                            
                        </div>
                    </div> --}}

                    <div class="col-md-6" style="margin-bottom: 0px">
                     <p style="text-align: center;"><span style="color: red;font-size: 20px">CoverShift is a spe­cial­ist provider of security solutions in London & surrounding counties for</span></p>
                     <ul style="margin-left: 10%;margin-bottom: 10%">
                     	<li>Vacant, unoc­cu­pied and void prop­er­ties</li>
                     	<li>Buildings undergoing refurbishment</li>
                     	<li>Sites undergoing construction</li>
                     	<li>Land guardianship</li>
                     	<li>Occupy with court order</li>
                     </ul>

                     <p style="text-align: center;"><span style="color: red;font-size: 20px;">We offer 5 core services in this regard</span></p>
                     <ul style="margin-left: 10%;margin-bottom: 10%">
                     	<li>24 /7 Security</li>
                     	<li>Cleaning the property</li>
                     	<li>Live -in- Guardian</li>
                     	<li>Care for, Protect, manage and monitor any assets</li>
                     	<li>Act as a deterrent against trespassers</li>
                     	<li>Property Boarding-up Services</li>

                     </ul>
                     <p>Our cus­tomers rely on our expert ser­vices to reduce the security costs of vacant properties  as this is could become long term projects.</p>

                     <p>Why pay so much when you can negotiate with us for even a better quality security solution.</p>
                     </div>


                    <div class="col-md-6 client" style="margin-bottom: 0px">
                        <p style="color: blue; font-size: 16px">Please fill the short form below and we will get back to you shortly. We take your privacy seriously. No details will be shared. <br> In the alternative you can send a quick email to: helpinghands@cover-shift.co.uk </p>

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
            
@endsection
