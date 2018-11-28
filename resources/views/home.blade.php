@extends('layouts.app')

@section('title')
Home
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

    @if (session('failed'))
    <div class="alert alert-danger  mx-auto">
        {{ session('failed') }}
    </div>
    @endif
    
</div>
<div class="col-sm-5 ml-auto">
    <div class="half">
        <div class="work">
            <p class="half-head">Welcome to Booking Service Page</p>

            <p class="half-sub">Please click on a service and continue</p>
            <form v-on:keydown.enter.prevent.self :action="book_staff" method="get" accept-charset="utf-8">
                {{ csrf_field() }}
                <div class="form-group services row">
                    <div class="info col-6">
                        <input ref="1" type="checkbox" name="service" class="check" value="Office Porter" @click="check(1,'13.50')"> <span class="service"><strong>Office Porter</strong> <p>(Load & Unload goods, Documents sorting & Storage, Adhoc labourer, Store Clearance & Removals, Office dismantling etc)</p></span> 
                    </div>

                    {{-- <div class="price col-6"><span>£13.50/hr</span></div> --}}
                </div>

                <div class="form-group services row">
                    <div class="info col-6">
                        <input ref="2" type="checkbox" name="service" class="check" value="SIA Security" @click="check(2,'14.50')"> <span class="service"><strong>SIA Security</strong> <p>(Events, Door Supervisor, Deterrent, Buildings, House Party, Wedding, Close Protection)</p></span>
                    </div>

                    {{-- <div class="price col-6"><span>£14.50/hr</span></div> --}}
                </div>

                <div class="form-group services row">
                    <div class="info col-6">
                        <input ref="3" type="checkbox" name="service" class="check" value="Helping Hands" @click="check(3,'13.00')"> <span class="service"><strong>Helping Hands</strong><p>(Load & Unload goods,Ad hoc Labourers, Errand & Odd jobs)</p></span> 
                    </div>

                    {{-- <div class="price col-6"><span>£13.00/hr</span></div> --}}
                </div>

                <div class="form-group services row">
                    <div class="info col-6">
                        <input  ref="4" type="checkbox" name="service" class="check" value="Facilities Assistant" @click="check(4,'13.50')"> <span class="service"><strong>Facilities Assistant</strong></span>
                    </div>

                    {{-- <div class="price col-6"><span >£13.50/hr</span></div> --}}
                </div>

                <div class="form-group services row">
                    <div class="info col-6">
                        <input ref="5" type="checkbox" name="service" class="check" value="Postroom Assistant" @click="check(5,'13.00')"> <span class="service"><strong>Postroom Assistant</strong></span>
                    </div>

                    {{-- <div class="price col-6"><span >£13.00/hr</span></div> --}}
                </div>

                <div class="form-group services row">
                    <div class="info col-6">
                        <input ref="6" type="checkbox" name="service" class="check" value="Event Assistant" @click="check(6,'13.00')"> <span class="service"><strong>Event Assistant</strong> <p>(Event Steward)</p></span> 
                    </div>

                    {{-- <div class="price col-6"><span>£13.00/hr</span></div> --}}
                </div>

                <div class="form-group services row">
                    <div class="info col-6">
                        <input ref="7" type="checkbox" name="service" class="check" value="Kitchen Porter" @click="check(7,'12.50')"> <span class="service"><strong>Kitchen Porter</strong></span> 
                    </div>

                    {{-- <div class="price col-6"><span>£12.50/hr</span></div> --}}
                </div>

                <div class="form-group services row">
                    <div class="info col-6">
                        <input ref="8" type="checkbox" name="service" class="check" value="Kitchen Assistant" @click="check(8,'12.50')"> <span class="service"><strong>Kitchen Assistant</strong></span> 
                    </div>

                    {{-- <div class="price col-6"><span class="price">£12.50/hr</span></div> --}}
                </div>

                <button type="submit" class="btn btn-success" :disabled="book_staff ==''">
                    <strong>Continue  to Complete booking</strong>
                </button>
            </form>
        </div>
    </div>
</div>

<div class="mr-auto col-sm-5">
    <div class="half">
        <div class="work">
            <p class="half-head">WORK FOR US</p>

            <p class="half-sub">Work when you want <br> Earn £8 - £10.50</p>

            <form {{-- v-on:keydown.enter.prevent.self --}} class="form-horizontal" method="POST" action="/work">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('fname') ? ' has-error' : '' }}">

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
                        <input type="email" class="form-control" name="fname" value="{{ old('fname') }}"required autofocus>
                    </div>
                </div>

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

                <div class="form-group{{ $errors->has('accept') ? ' has-error' : '' }}">

                    <div class="input">
                        <input type="checkbox" name="accept" required autofocus>
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
@endsection

@section('script')
<script>
    var app = new Vue({
      el: '#app',
      data: {
        book_staff:"",
    },
    methods:{
        check(num,price){
            num = num.toString();
            var number = 1;
            var checked = this.$refs[num].checked;
            var service = this.$refs[num].value.replace(" ", "-");

            while (number <= 8) {
                number = number.toString();
                if (number == num) {
                    this.$refs[number].checked = checked;
                    if (checked) {
                        this.book_staff = "{{url('/book_staff/')}}/"+service;
                    }else{
                        this.book_staff= "";
                    }
                }else{
                    this.$refs[number].checked = false;
                }
                number++
            }
        //console.log(num.toString());
        //if ( this.$refs[num].checked == false) {}
        //this.$refs[num].checked = !checked;
    }
},
mounted(){
    //console.log(!this.$refs['1'].checked);
}
});
</script>
{{-- <script src="/js/main.js" type="text/javascript"></script> --}}
@endsection