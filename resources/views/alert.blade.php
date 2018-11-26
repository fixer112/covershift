@extends('layouts.app')

@section('title')
Alert
@endsection

@section('content')
<div class="col-12 mx-auto">
    @if (session('success'))
    <div class="alert alert-success  mx-auto">
        {{ session('success') }}
        @if(session('download'))
        <strong><a href="{{session('download')}}">Download Reciept</a></strong>
        @endif
    </div>
    @endif

    @if (session('verify'))
    <div class="alert alert-success mx-auto" style="text-align: center;">
        <p style="color: green">Verify your email address</p>
        <p style="color: black">Thanks for Booking a Service. Please go to your email now and confirm your email address, then complete the transaction.
        Please check  tour spam box if this is not found in your inbox.</p>
        <p style="color: green">Thanks <br>
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
