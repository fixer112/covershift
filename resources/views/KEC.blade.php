@extends('layouts.app')

@section('title')
Kitchen Equipment Cleaning
@endsection

@section('content')
<div class="col-12 mx-auto">
	<h2 style="color: blue;text-align: center;">Thanks for visiting our Kitchen Equipment & Kitchen Deep Clean Page</h2>
	<h3 style="color: red;text-align: center;">CoverShift</h3>
	<div class="row">
		<div class="col-3 client">
			<img src="{{ asset('/kec1.jpeg')}}" alt="">
		</div>
		<div class="col-3 client">
			<img src="{{ asset('/kec2.jpeg')}}" alt="">
		</div>
		<div class="col-3 client">
			<img src="{{ asset('/kec3.jpeg')}}" alt="">
		</div>
		<div class="col-3 client">
			<img src="{{ asset('/kec4.jpeg')}}" alt="">
		</div>
	</div>
	<div>
		<p>We are UK's best hands in:</p> 

		<p>*Deep cleaning accumulated grease and fat on commercial and domestic kitchen equipment.</p>

		<p>*Kitchen ventilation clean</p>

		<p>*Deep clean less accessible  surfaces and fittings to rid your kitchen of any  potential breeding ground for bacteria.</p>

		<p>*Full certification provided for regulatory and insurance purposes.</p>

	</div>

	<div>
	<p>This keeps you inline with the Hygiene Standards set out by the Food Safety Act 1990 and the Food Hygiene Regulations 2006.</p>

	<p style="color: blue">Our rates are affordable and negotiable. We operate with minimum disruption to your schedule.</p>

	<p style="color: green">Please fill the short form below and we will get back to you shortly. We take your privacy seriously. No details will be shared. In the alternative you can send a quick email to: helpinghands@cover-shift.co.uk </p>
</div>

	<form {{-- v-on:keydown.enter.prevent.self --}} class="form-horizontal" method="POST" action="/kec-mail">
	    {{ csrf_field() }}
	    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} mx-auto">

	        <div class="input">
	            <label for="name" class="control-label">Name</label>
	            <input type="text" class="form-control" name="name" value="{{ old('name') }}"required autofocus>
	        </div>
	    </div>

	    <div class="form-group{{ $errors->has('request') ? ' has-error' : '' }}">

	        <div class="input">
	            <label for="request" class="control-label">Request</label>
	            <textarea name="request" class="form-control" required autofocus>{{ old('request') }}</textarea>{{-- 
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
	            <label for="number" class="control-label">Contact Number</label>
	            <input type="text" class="form-control" name="number" value="{{ old('number') }}"required autofocus>
	        </div>
	    </div>

	    
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


@endsection

@section('script')
<script>
	var app = new Vue({
		el: '#header',
		data: {
			
		},
		methods:{

		},
		watch:{

		},
		mounted(){

			this.$refs.header.src = location.origin +'/kec.jpg';
			console.log(this.$refs.header.src);
		},
		created(){
		}
	});
	/*console.log(location);
	if (location.origin + location.pathname  == location.origin +'/kec') {
		
	}*/
</script>
@endsection
