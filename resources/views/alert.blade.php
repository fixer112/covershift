@extends('layouts.app')

@section('title')
Alert
@endsection

@section('content')
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
    
   


    @if (session('success'))
    <div class="alert alert-success  mx-auto">
        {{ session('success') }}
        @if(session('download'))
        <strong><a href="{{session('download')}}">Download Reciept</a></strong>
        @endif
    </div>
    @endif

    @if (session('verify'))
    <div class="alert alert-success mx-auto" style="text-align: center;font-weight: bold;">
        <p style="color: green">Verify your email address</p>
        <p style="color: black">Thanks for Booking a Service.<br>
        Please, go to your email now and confirm your email address, then complete the transaction.<br>
        Please, check  your spam box if this is not found in your inbox.</p>
        <p style="color: green">Thanks, <br>
        Team CoverShift</p>
    </div>
    @endif

    @if (session('failed'))
    <div class="alert alert-danger  mx-auto">
        {{ session('failed') }}
    </div>
    @endif
    
</div>

            
@endsection
