@extends('layouts.app')

@section('title')
Order Service
@endsection

@section('content')
<div class="col-12">
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

    <form action="{{url('/payment')}}" method="post" accept-charset="utf-8">
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
                <input type="email" class="form-control" name="email" value="{{ old('email') }}"required autofocus>
            </div>
        </div>

        <div class="form-group{{ $errors->has('addr') ? ' has-error' : '' }}">

            <div class="input">
                <label for="addr" class="control-label">Full Address of Work Venue</label>
                <input type="text" class="form-control" name="addr" value="{{ old('addr') }}"required autofocus>
            </div>
        </div>

        <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">

            <div class="input">
                <label for="mobile" class="control-label">Mobile Number</label>
                <input type="text" class="form-control" name="mobile" value="{{ old('mobile') }}"required autofocus>
            </div>
        </div>

        <div class="form-group{{ $errors->has('company_name') ? ' has-error' : '' }}">

            <div class="input">
                <label for="company_name" class="control-label">Company name (optional)</label>
                <input type="text" class="form-control" name="company_name" value="{{ old('company_name') }}">
            </div>
        </div>


        <div style="font-size: 12px; font-weight: bold; padding: 20px;color:green">
          All bookings are processed automatically onliine, saving both time and costs for all.
      </div>


      <div class="form-group">
        <label class="control-label">Start and Finish time</label>
        <div class="form-control">

            <input class="time" type="time" v-model="from" required>


            <input class="time" type="time" v-model="to" required>
            <input type="hidden" :value="to_time" name="to">
            <input type="hidden" :value="from_time" name="from">
        </div>
    </div>

    <div class="form-group{{ $errors->has('days_needed') ? ' has-error' : '' }}">

        <div class="input">

            <label for="days_needed" class="control-label">Total Number of Days Needed</label>
            <select name="days_needed" class="form-control" v-on:change="reset" v-model="days_needed" required>
                @php
                $num = 1;
                while ($num <= 31) {
                    echo'<option value="'.$num.'">'.$num.'</option>';
                    $num++ ;
                }
                @endphp
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="dates" class="control-label">Dates Staff Will be Needed</label>
        <strong class="half-sub"><p>You have  @{{days}} remaining to pick</p></strong>
        <input type="date" v-model="date" :disabled="days < 1" class="form-control" :required="days >= 1">
        <input type="hidden" name="dates" :value="dates">
        <div style="margin-top: 20px">
            <span v-for="d in dates">
                <div class="d">
                    <strong class="dates">@{{d}} <i @click="remove_date(index)" style="color:green" class="fa fa-times-circle"></i></strong></div>
                </div>
            </span>

        </div>

        <div class="form-group">
            <label class="control-label">Numbers of staff needed</label>
            <select name="staff_num" class="form-control" v-model="staff_num" @change="cal" required>
                @php
                $num = 1;
                while ($num <= 10) {
                    echo'<option value="'.$num.'">'.$num.'</option>';
                    $num++ ;
                }
                @endphp
            </select>
        </div>

        <div class="form-group">
            <label class="control-label">Numbers of hours for each shift</label>
            <select name="shift_hour" class="form-control" v-model="hours" @change="cal" required>
             {{--  <option selected="true" disabled value="">Select Hour</option> --}}
             @php
             $num = 5;
             $first = true;
             $services = ['SIA-Security', 'Kitchen-Porter', 'Kitchen-Assistant'];
                //['SIA-Security', 'Postroom-Assistant', 'Facilities-Assistant', 'Office-Porter'];
             while ($num <= 12) {
                if ($num == 5) {
                    if (!in_array($service, $services)) {
                        //$first = false;
                        $num++;
                        continue;
                    }
                }
                $select = $first ? 'selected' : '';
                echo'<option '.$select.' value="'.$num.'">'.$num.'</option>';

                $first = false;
                $num++ ;
            }
            @endphp
        </select>
    </div>

    <div class="form-group">
        <label class="control-label">Will you need a van (£30/hr)</label>
        <select class="form-control" name="van" v-model="van" @change="cal" required>
            <option value="0">NO</option>
            <option value="1">Yes</option>
        </select>
    </div>

    <div class="form-group" v-if="van!=0">
        <label class="control-label">Hours needed for van</label>
        <select class="form-control" name="van_hour" v-model="van_hour" @change="cal" :disabled="van == 0" :required="van == 1">
            @php
            $num = 2;
            while ($num <= 12) {
                echo'<option value="'.$num.'">'.$num.'</option>';
                $num++ ;
            }
            @endphp
        </select>
    </div>

    <div class="form-group">
        <label class="control-label">Please summarise duties expected of staff or any instructions</label>
        <textarea class="form-control" name="summary" v-model="summary" required></textarea>
    </div>


    <input type="hidden" name="service" value="{{$service}}">
    <input type="hidden" name="price" value="{{$price}}">
    <input type="hidden" name="total" :value="total">

    <div class="row">
        <div class="alert alert-success col-12 mx-auto">
            <div style="text-align: center;">
                <h2>Summary</h2> <br> <span style="font-size: 10px;font-weight: bold" v-if="from && to">From @{{from_time}} To @{{to_time}}</span>
            </div>
            <div class="summary">
                <p><span class="name">Service</span> <span class="value">{{str_replace('-', ' ', str_replace('_', '/', $service))}}</span></p>
                <p><span class="name">Price per hour</span> <span class="value">£{{$price}}</span></p>
                <p><span class="name">Total Number of Days</span> <span class="value">@{{days_needed}}</span></p>
                <p><span class="name">Total number of staff(s)</span> <span class="value">@{{staff_num}}</span></p>
                <p><span class="name">Summary to Staff</span> <span class="value">@{{summary}}</span></p>
                <p><span class="name">Total number of hour(s) daily</span> <span class="value">@{{hours}}</span></p>
                <p v-if="van == 1"><span class="name">Total number of hour(s) needed for van</span> <span class="value">@{{van_hour}}</span></p>
                <p><span class="name">Total Cost</span><span class="value total"> £@{{total}}</span></p>
            </div>

        </div>
    </div>
    <div class="alert alert-warning" style="">
            <p>Thanks for booking a service with CoverShift. You will get a payment invoice shortly and staff
            will be on your site as booked. Please do email us if you need futher clarifacation.</p>
            {{-- <p>Regards,<br>Team CoverShift</p> --}}
    </div>

    <div class="form-group">
        <button class="btn btn-success">
            Continue
        </button>
    </div>

</form>



</div>

@endsection

@section('script')
<script>
    var app = new Vue({
      el: '#app',
      data: {
        days_needed:1,
        days:1,
        date:"",
        dates:[],
        hours:4,
        staff_num:1,
        from:"",
        to:"",
        to_time:"",
        from_time:"",
        price:"",
        total:"",
        van:0,
        van_hour:2,
        summary:"",
    },
    methods:{
        remove_date(day){

            this.dates.splice(day, 1);
            this.days++;
        },
        reset(){
            this.dates = [];
            this.days = this.days_needed;
            this.cal();
            ///alert('work');
        },
        disable_hour(){
            if ("{{$service}}" == "SIA-Security") {}
                switch ("{{$service}}") {
                    case "SIA-Security":
                    this.hours =5;
                    break;
                    case "Office-Porter":
                    this.hours =5;
                    break;
                    case "Postroom-Assistant":
                    this.hours =5;
                    break;
                    case "Facilities-Assistant":
                    this.hours =5;
                    break;
                    default:
                    break;
                }
            },
            cal(){
                var van = this.van == 1 ? this.van_hour : 1;
                this.total = this.price * this.hours * this.days_needed * this.staff_num * van;
            }
        },
        watch:{
            date(n,old){
                var d = new Date(n);
                d.toDateString();
                this.dates.push(d.toDateString());
                this.dates.sort();
                this.days--
            },
            from(n, old){
                var h = n[0]+n[1];
                h = parseInt(h);
                m = n[3]+n[4];
                if (h<13) {
                    this.from_time = h.toString()+":"+m+" AM";
                }else{
                   h = h-12;
                   this.from_time = h.toString()+":"+m+" PM";
               }

           },
           to(n, old){
        //var d = new Date();
        var h = n[0]+n[1];
        h = parseInt(h);
        m = n[3]+n[4];
        if (h<13) {
            this.to_time = h.toString()+":"+m+" AM";
        }else{
           h = h-12;
           this.to_time = h.toString()+":"+m+" PM";
       }
       /* d.setHours(h, m);
        this.to_time = d;
        if (this.from != '') {
            var hours = (this.to_time - this.from_time)/1000/60;
            Math.abs(hours);
            this.h = hours/60;
            this.m = hours%60;
            if (hours > this.hours) {

            }
        }*/
    },

    /*days_needed(){
        this.dates = [];
        alert('work');
    }*/
},
mounted(){
    //$('#picker').multiDatesPicker();
    this.price = {{$price}};
    this.cal();
    this.disable_hour();
},
created(){
    //$("#date").multiDatesPicker();
}
});
</script>
{{-- <script src="/js/main.js" type="text/javascript"></script> --}}
@endsection
