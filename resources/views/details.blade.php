@extends('layouts.app')

@section('head')

@endsection

@section('title')
Order Service
@endsection

@section('content')
<div class="col-12">

    <div class="row">
        <div class="alert alert-success col-12 mx-auto">
        <div style="text-align: center;">
        <h2>Summary</h2> <br> <span style="font-size: 10px;font-weight: bold" v-if="from && to">From @{{from_time}} To @{{to_time}}</span>
        </div> 
        <div class="summary">
        <p><span class="name">Service</span> <span class="value">{{str_replace('-', ' ', $service)}}</span></p>
        <p><span class="name">Price per hour</span> <span class="value">£{{$price}}</span></p>
        <p><span class="name">Total Number of Days</span> <span class="value">@{{days}}</span></p>
        <p><span class="name">Total number of staff(s)</span> <span class="value">@{{staff_num}}</span></p>
        <p><span class="name">Total number of hour(s) daily</span> <span class="value">@{{hours}}</span></p>
        <p><span class="name">Total Price</span><span class="value total"> £@{{total}}</span></p>
        </div>

    </div>
</div>
<form action="/payment" method="post" accept-charset="utf-8">
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
            <input type="email" class="form-control" name="fname" value="{{ old('email') }}"required autofocus>
        </div>
    </div>

    <div class="form-group">
        <label class="control-label">Start and Finish time</label>
        <div class="form-control">
            <span>From </span><input class="" type="time" v-model="from" required>


            <span>To </span><input class="" type="time" v-model="to" required>
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
        <input type="hidden" name="dates[]" :value="dates">
        <div style="margin-top: 20px">
            <v-template v-for="d in dates">
                <div class="d">
                    <strong class="dates">@{{d}} <i @click="remove_date(index)" style="color:green" class="fa fa-times-circle"></i></strong></div>
                </v-template>
            </div>

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
            <select name="hours" class="form-control" v-model="hours" @change="cal" required>
                @php
                $num = 4;
                while ($num <= 12) {
                    echo'<option value="'.$num.'">'.$num.'</option>';
                    $num++ ;
                }
                @endphp
            </select>
        </div>

        <div class="form-group">
            <label class="control-label">Please summarise duties expected of staff or any instructions</label>
            <textarea class="form-control" name="summarise" required></textarea>
        </div>


        <input type="hidden" name="service" value="{{$service}}">
        <input type="hidden" name="price" value="{{$price}}">
        <input type="hidden" name="total" :value="total">

    </form>

    <div class="row">
        <div class="alert alert-success col-12 mx-auto">
            <div style="text-align: center;">
        <h2>Summary</h2> <br> <span style="font-size: 10px;font-weight: bold" v-if="from && to">From @{{from_time}} To @{{to_time}}</span>
        </div> 
        <div class="summary">
        <p><span class="name">Service</span> <span class="value">{{str_replace('-', ' ', $service)}}</span></p>
        <p><span class="name">Price per hour</span> <span class="value">£{{$price}}</span></p>
        <p><span class="name">Total Number of Days</span> <span class="value">@{{days}}</span></p>
        <p><span class="name">Total number of staff(s)</span> <span class="value">@{{staff_num}}</span></p>
        <p><span class="name">Total number of hour(s) daily</span> <span class="value">@{{hours}}</span></p>
        <p><span class="name">Total Price</span><span class="value total"> £@{{total}}</span></p>
        </div>

    </div>
</div>
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
        cal(){
            this.total = this.price * this.hours * this.days * this.staff_num;
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
},
created(){
    //$("#date").multiDatesPicker();
}
});
</script>
{{-- <script src="/js/main.js" type="text/javascript"></script> --}}
@endsection