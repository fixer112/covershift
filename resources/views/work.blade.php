@extends('layouts.app')

@section('title')
Hire our temporary Kitchen Porters and Kitchen Assistants
@endsection

@section('head')
<meta name="description" content="We offer reliable Kitchen Porters & Kitchen Assistants that help out during staff shortages. Book Online or contact us now.">
@endsection

@section('content')
<div class="col-12">
    {{-- mr-auto col-sm-5 --}}
<div class="mx-auto col-12">
    <div class="half">
        <div class="work">
            <div class="row">
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
            <h3 class="half-head">WORK FOR US</h3>

            <p class="half-sub">Work when you want <br> </p>

            <form {{-- v-on:keydown.enter.prevent.self --}} class="form-horizontal" method="POST" action="/work">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }} mx-auto">

                    <div class="input">
                        <label for="fname" class="control-label">First Name</label>
                        <input type="text" class="form-control" name="fname" value="{{ old('fname') }}"required autofocus>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('lname') ? ' has-error' : '' }}">

                    <div class="input">
                        <label for="lname" class="control-label">Last Name</label>
                        <input type="text" class="form-control" name="lname" value="{{ old('lname') }}"required autofocus>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                    <div class="input">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}"required autofocus>
                    </div>
                </div>

                {{-- <div class="form-group{{ $errors->has('addr') ? ' has-error' : '' }}">

                    <div class="input">
                        <label for="addr" class="control-label">Full Address of Work Venue</label>
                        <input type="text" class="form-control" name="addr" value="{{ old('addr') }}"required autofocus>
                    </div>
                </div> --}}

                <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">

                    <div class="input">
                        <label for="postcode" class="control-label">Postcode</label>
                        <input type="text" class="form-control" name="postcode" value="{{ old('postcode') }}"required autofocus>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">

                    <div class="input">
                        <label for="number" class="control-label">Mobile Number</label>
                        <input type="text" class="form-control" name="number" value="{{ old('number') }}"required autofocus>
                    </div>
                </div>

                <div class="form-group{{ $errors->has('service') ? ' has-error' : '' }}">

                    <div class="input">
                        <label for="service" class="control-label">Specialisation</label>
                        {{-- <textarea class="form-control" name="postcode" value="{{ old('special') }}"required autofocus></textarea> --}}
                        <select name="service" class="form-control">
                            <option value="" selected disabled>Please pick a skill</option>
                            <option value="Office Porter">Office Porter</option>
                            <option value="SIA Security">SIA Security</option>
                            <option value="Helping Hands">Helping Hands</option>
                            <option value="Facilities Assistant">Facilities Assistant</option>
                            <option value="Postroom Assistant">Postroom Assistant</option>
                            <option value="Event Assistant">Event Assistant</option>
                            <option value="Kitchen Porter">Kitchen Porter</option>
                            <option value="Kitchen Assistant">Kitchen Assistant</option>
                        </select>
                    </div>
                </div>

                <div class="form-group" id="spam">
                    <input type="text" name="spam" value="">
                </div>

                <div class="form-group{{ $errors->has('accept') ? ' has-error' : '' }}">

                    <div class="input">
                        <input type="checkbox" name="accept"  value="1" required autofocus>
                        <span>By submitting you accept the <a href="{{url('/terms')}}">terms and conditions</a></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">
                    Submit
                </button>
            </form>

        </div>
    </div>
</div>
</div>
   
@endsection

