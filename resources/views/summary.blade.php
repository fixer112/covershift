@extends('layouts.app')

@section('title')
Summary for #{{$invoice->invoice_id}}
@endsection

@section('content')
<div class="col-12 mx-auto">
	<div class="alert alert-success">
		<div class="row">
			<div class="mx-auto">
				<h2>Summary</h2> <br> <span style="font-weight: bold"> #{{$invoice->invoice_id}}</span> <br> <span style="font-size: 10px;font-weight: bold">From {{$invoice->from}} To {{$invoice->to}}</span>
			</div>
			<div class="mr-3">
				<h2 style="color:{{$invoice->paid() ? 'green' : 'red'}}">{{$invoice->paid() ? 'Paid' : 'Unpaid'}}</h2>
			</div>
		</div>

		<div class="summary">
			<p><span class="name">Service</span> <span class="value">{{str_replace('-', ' ', $invoice->title)}}</span></p>
			<p><span class="name">Price per hour</span> <span class="value">£{{$invoice->price}}</span></p>
			<p><span class="name">Total Number of Days</span> <span class="value">{{$invoice->days_needed}}</span></p>
			<p><span class="name">Total number of staff(s)</span> <span class="value">{{$invoice->staff_num}}</span></p>
			<p><span class="name">Total number of hour(s) daily</span> <span class="value">{{$invoice->shift_hour}}</span></p>
			@if($invoice->van)
			<p ><span class="name">Total number of hour(s) needed for van</span> <span class="value">{{$invoice->van_hour}}</span></p>
			@endif
			<p><span class="name">Dates</span> <span class="value">{{$invoice->dates}}</span></p>
			<p><span class="name">Summary to Staff</span> <span class="value">{{$invoice->summary}}</span></p>
			<p><span class="name">Total Price</span><span class="value total"> £{{$invoice->total}}</span></p>

		</div>
	</div>
	@if($invoice->paid())
	<a href="/reciept/{{$invoice->invoice_id}}.pdf"><button class="btn btn-success">
		Download receipt
	</button>
	@else
	<a href="/make_payment/{{$invoice->id}}"><button class="btn btn-success">
		Continue
	</button></a>
	@endif

</div>

@endsection
