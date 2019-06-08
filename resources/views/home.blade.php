@extends('layouts.app')

@section('title')
London's best Office Helping Hands: Load & Unload goods, Ad hoc & Manual Tasks
@endsection

@section('head')
<meta name="description" content="Our office & domestic support services help with Removals, Office dismantling, Adhoc labourers, help with documents sorting & archiving. Book Online or contact us today
">
@endsection

@section('content')

<div class="col-12 mx-auto">
    {{-- <div class="col-6 mx-auto"> --}}

    @if (session('failed'))
    <div class="alert alert-danger  mx-auto">
        {{ session('failed') }}
    </div>
    @endif

    <div class="half">
        <div class="work">
            <h3 class="half-head" style="color: red">Welcome to Booking Service Page</h3>


            <div class="half-sub bord" style="margin-top: 20px;text-align: left">
                <ul style="    padding-top: 20px;">
                    <li style="margin-bottom: 10px">Welcome to CoverShift - an on-demand staffing system that provides
                        flexible Office, ad hoc Labour Staff & Event set-up
                        helping hands to London businesses in a simplified process. We are based in London's central
                        business district of Hatton
                        Garden, EC1N.</li>

                    <li style="margin-bottom: 10px">This page allows you to book and process any Service automatically
                        (You will get a payment Invoice after booking),
                        thereby saving time.
                        In the alternative you can send us an email with your request:
                        covershiftservices@cover-shift.co.uk</li>

                    {{--  <li style="margin-bottom: 10px">We provide London offices with flexible Office Labour Staff, Event
                        Security staff, Event Stewards & Help with Manual Handling Tasks. We also provide security for
                        vacant properties.</li>

                    <li style="margin-bottom: 10px">This Services include providing ad hoc Office Porters, Facilities
                        Assistants, Postroom Assistants, Load & Unload of goods, Office Dismantling, Meetings Setup,
                        Sorting & Storage etc</li>

                    <li style="">We help bring the flow to Office Ad hoc Tasks & Event Management Services so you can do
                        more important things.</li>  --}}
                </ul>
            </div>
            <div class="half-sub" style="margin-top: 30px;color:blue">
                <ul>
                    <li>Please click on a service and continue. </li>
                    <li> You will get a Payment invoice at the end</li>
                    <li>If you would rather discuss your request before booking please send an email to:
                        covershiftservices@cover-shift.co.uk.
                        <br>We will contact you immediately.</li>
                    {{--  <li>If you are not ok with booking online;</li>  --}}
                    {{--  <li>Or would rather discuss your request before booking please send an email to:
                        covershiftservices@cover-shift.co.uk. We will contact you immediately</li>  --}}
                    {{--  <li>Or the request is a bit ongoing, please send a mail to: covershiftservices@cover-shift.co.uk. We
                        will contact you immediately</li>  --}}
                </ul>

            </div>
            <form v-on:keydown.enter.prevent.self :action="book_staff" method="get" accept-charset="utf-8">
                {{ csrf_field() }}
                {{-- <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="1" type="checkbox" name="service" class="check" value="Labour-Staff_Office-Porter" @click="check(1,'13.50')"> <span class="service"><strong>Labour Staff/Office Porter</strong> <p>(Load & Unload goods, Documents sorting & Storage, Adhoc labourer, Store Clearance & Removals, Office dismantling etc)</p></span>
                    </div>

                    
                </div>

                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="2" type="checkbox" name="service" class="check" value="SIA-Security" @click="check(2,'14.50')"> <span class="service"><strong>SIA Security</strong> <p>(Events, Door Supervisor, Deterrent, Buildings, House Party, Wedding, Close Protection)</p></span>
                    </div>

                    
                </div>

                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="3" type="checkbox" name="service" class="check" value="Helping-Hands" @click="check(3,'13.00')"> <span class="service"><strong>Helping Hands</strong><p>(Load & Unload goods,Ad hoc Labourers, Errand & Odd jobs)</p></span>
                    </div>

                    
                </div>

                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input  ref="4" type="checkbox" name="service" class="check" value="Facilities-Assistant" @click="check(4,'13.50')"> <span class="service"><strong>Facilities Assistant</strong></span>
                    </div>

                    
                </div>

                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="5" type="checkbox" name="service" class="check" value="Postroom-Assistant" @click="check(5,'13.00')"> <span class="service"><strong>Postroom Assistant</strong></span>
                    </div>

                    
                </div>

                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="6" type="checkbox" name="service" class="check" value="Event-Assistant" @click="check(6,'13.00')"> <span class="service"><strong>Event Assistant</strong> <p>(Event Steward)</p></span>
                    </div>

                    
                </div>

                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="7" type="checkbox" name="service" class="check" value="Kitchen-Porter" @click="check(7,'12.50')"> <span class="service"><strong>Kitchen Porter</strong></span>
                    </div>

                    
                </div>

                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="8" type="checkbox" name="service" class="check" value="Kitchen-Assistant" @click="check(8,'12.50')"> <span class="service"><strong>Kitchen Assistant</strong></span>
                    </div>

                    
        </div> --}}

                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="1" type="checkbox" name="service" class="check" value="Office-Porter"
                            @click="check(1,'14.00')">
                        <span class="service"><strong>Office Porter</strong>
                            <p>(Meeting Set-up, Office clearance, Postroom & Ad hoc office tasks.)</p>
                        </span>
                    </div>
                </div>
                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="2" type="checkbox" name="service" class="check" value="Event_Conference-Porters"
                            @click="check(2,'14.00')">
                        <span class="service"><strong>Event/Conference Porters</strong>
                            <p>(Set-up, Load, Dismantle, General tasks.)</p>
                        </span>
                    </div>
                </div>
                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="3" type="checkbox" name="service" class="check" value="Event-Security"
                            @click="check(3,'14.00')">
                        <span class="service"><strong>Event Security</strong>
                            <p>(Events, Door Supervisor, Deterrent, Buildings, House Party, Wedding, Close Protection)
                            </p>
                        </span>
                    </div>
                </div>
                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="4" type="checkbox" name="service" class="check" value="Removal-Porter"
                            @click="check(4,'14.00')">
                        <span class="service"><strong>Removal Porter</strong>
                            <p>(Load/unload, General manual handling tasks.)</p>
                        </span>
                    </div>
                </div>
                <div class="form-group services row">
                    <div class="info col-6 mx-auto">
                        <input ref="5" type="checkbox" name="service" class="check" value="Facility-Assistants"
                            @click="check(5,'14.00')">
                        <span class="service"><strong>Facility Assistant</strong>
                            <p>(Building checks, Meeting room set-up, Clean ups.)</p>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-success book mx-auto" :disabled="book_staff ==''" style="">
                        <strong>Continue to Complete booking</strong>
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- </div> --}}

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
            var service = this.$refs[num].value/*.replace(" ", "-")*/;

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