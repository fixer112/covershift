@extends('layouts.app')

@section('title')
Alert
@endsection

@section('content')
<div class="col-12 mx-auto">
    
         @if (session('id'))
         <div class="alert alert-warning col-10 mx-auto">
            Order #{{session('id')}} successfully booked, please click the link below to confirm your email. We will send the payment invoice shortly.
            <p>Thank you!<br>Team CoverShift</p>
         </div>
         @endif
    
</div>

            
@endsection
