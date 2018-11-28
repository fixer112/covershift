@extends('layouts.app')

@section('title')
Login Admin
@endsection

@section('content')
<div class="col-12 mx-auto">
	@if (session('success'))
    <div class="alert alert-success  mx-auto">
        {{ session('success') }}
    </div>
    @endif

    @if (session('failed'))
    <div class="alert alert-danger  mx-auto">
        {{ session('failed') }}
    </div>
    @endif
	<form class="form-horizontal" method="POST" action="/admin-login">
	    {{ csrf_field() }}
	    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

	        <div class="input">
	            <label for="email" class="control-label">Email</label>
	            <input type="email" class="form-control" name="email" value="{{ old('email') }}"required autofocus>
	        </div>
	    </div>

	    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">

	        <div class="input">
	            <label for="password" class="control-label">Password</label>
	            <input type="password" class="form-control" name="password" value="{{ old('password') }}"required autofocus>
	        </div>
	    </div>
	    <button type="submit" class="btn btn-success">
	        Login
	    </button>
	</form>

</div>

@endsection
