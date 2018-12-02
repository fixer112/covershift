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
			<p><span class="name">Total Cost</span><span class="value total"> £{{$invoice->total}}</span></p>

		</div>
	</div>
	<div class="alert alert-warning">
	<p><center><strong>If you have an update or correction for this order or would rather pay through an invoice, please send us a <a href="mailto:helpinghands@cover-shift.co.uk"> mail</a>. Thank you.</strong></center></p>
	</div>
	@if($invoice->paid())
	<a href="{{url('/reciept/'.$invoice->invoice_id.'.pdf')}}"><button class="btn btn-success">
		Download receipt
	</button>
	@else
	<a href="{{url('/make_payment/'.$invoice->id)}}"><button class="btn btn-success">
		Continue
	</button></a>
	@endif
	
</div>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post">

  <!-- Identify your business so that you can collect the payments. -->
  <input type="hidden" name="business" value="helpinghands@cover-shift.co.uk">

  <!-- Specify a Buy Now button. -->
  <input type="hidden" name="cmd" value="_xclick">

  <!-- Specify details about the item that buyers will purchase. -->
  <input type="hidden" name="item_name" value="{{$invoice->description}}">
  <input type="hidden" name="item_number" value="{{$invoice->invoice_id}}">
  <input type="hidden" name="amount" value="{{$invoice->total}}">
  <input type="hidden" name="currency_code" value="GBP">
  <input type="hidden" name="cancel_return" value="{{url('/cancel')}}">
  <input type="hidden" name="return" value="{{url('/success')}}">
  <!-- Display the payment button. -->
  <input type="image" name="submit" border="0"
  src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
  alt="Buy Now">
  <img alt="" border="0" width="1" height="1"
  src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >

</form>


@endsection
