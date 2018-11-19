<div class="col-sm-5 ml-auto">
                <div class="half">
                    <div class="work">
                        <p class="half-head">BOOK A STAFF</p>

                        <p class="half-sub">Choose only a service</p>
                        <form action="welcome_submit" method="get" accept-charset="utf-8">
                            {{ csrf_field() }}
                            <div class="form-group services">
                                <input type="checkbox" name="service" class="check" value="1"> <span class="service">Office Porter</span> <span class="price">£13.50/hr</span>
                            </div>

                            <div class="form-group services">
                                <input type="checkbox" name="service" class="check" value="2"> <span class="service">SIA Security</span> <span class="price">£14.50/hr</span>
                            </div>

                            <div class="form-group services">
                                <input type="checkbox" name="service" class="check" value="3"> <span class="service">Helping Hands</span> <span class="price">£13.00/hr</span>
                            </div>

                            <div class="form-group services">
                                <input type="checkbox" name="service" class="check" value="4"> <span class="service">Facilities Assistant</span> <span class="price">£13.50/hr</span>
                            </div>

                            <div class="form-group services">
                                <input type="checkbox" name="service" class="check" value="5"> <span class="service">Postroom Assistant</span> <span class="price">£13.00/hr</span>
                            </div>

                            <div class="form-group services">
                                <input type="checkbox" name="service" class="check" value="6"> <span class="service">Event Assistant</span> <span class="price">£13.00/hr</span>
                            </div>

                            <div class="form-group services">
                                <input type="checkbox" name="service" class="check" value="7"> <span class="service">Kitchen Porter</span> <span class="price">£12.50/hr</span>
                            </div>

                            <div class="form-group services">
                                <input type="checkbox" name="service" class="check" value="8"> <span class="service">Kitchen Assistant</span> <span class="price">£12.50/hr</span>
                            </div>

                            <button type="submit" class="btn btn-success">
                                    Continue
                        </button>
                        </form>
                    </div>
                </div>
            </div>

            

            <div class="mr-auto col-sm-5">
                <div class="half">
                    <div class="work">
                        <p class="half-head">WORK FOR US</p>

                        <p class="half-sub">Work when you want to Earn £8 - £10.50</p>
                        <form v-on:keydown.enter.prevent.self class="form-horizontal" method="POST" action="/work">
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

                        {{-- <div class="form-group{{ $errors->has('email_confirmation') ? ' has-error' : '' }}">
                            <label for="email_confirmation" class="col-md-4 control-label">Confirm Email</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email_confirmation" value="{{ old('email_confirmation') }}" required>
                            </div>
                        </div>
                        --}}
                        <div class="form-group{{ $errors->has('postcode') ? ' has-error' : '' }}">

                            <div class="input">
                                <label for="postcode" class="control-label">Postcode</label>
                                <input type="text" class="form-control" name="postcode" value="{{ old('postcode') }}"required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">

                            <div class="input">
                                <label for="number" class="control-label">Mobile Number</label>
                                <input type="text" class="form-control" name="postcode" value="{{ old('postcode') }}"required autofocus>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('special') ? ' has-error' : '' }}">

                            <div class="input">
                                <label for="special" class="control-label">Specialization</label>
                                <textarea class="form-control" name="postcode" value="{{ old('special') }}"required autofocus></textarea>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('accept') ? ' has-error' : '' }}">

                            <div class="input">
                                <input type="checkbox" name="accept" required autofocus>
                                <span>By submitting you accept the <a href="">terms and conditions</a></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">
                                    Submit
                        </button>
                    </form>

                </div>
            </div>
        </div>