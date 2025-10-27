@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Settings</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Settings</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage ">
    <div class="blog-page pt-5 pb-5 w-100 float-start">
        <div class="container">
            <div class="row">
            @include('frontend.Account.left-menu')
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="my-profile tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="heading">
                                <h2><strong>Update</strong> Profile </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="input-info-box">
                                <div class="content">
                                    @if(session('success'))
                                    <h5 class="errorsal w-100" style="color:green;">
                                        {{ session('success') }}
                                    </h5>
                                    @endif

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <form method="POST" action="{{ url('profile-update') }}" enctype=multipart/form-data>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Display Name</label>
                                                    <input type="text" placeholder="Display Name" value="{{ Auth::user()->name }}" name="name">
                                                </div>
                                            </div>
                                            <input type="text" placeholder="id" value="{{ Auth::user()->id }}" name="user_id" hidden>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Display Email</label>
                                                    <input type="text" placeholder="Display Email" name="display_email" value="{{ Auth::user()->display_email }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Education Level</label>
                                                    <div class="custum-select">
                                                        <select name="high_qualificatoin" class="input" id="selEducation">
                                                            <option value="">select</option>
                                                            @foreach($education as $education)
                                                            @php
                                                            $selected = ($education->id == Auth::user()->high_qualificatoin) ? "selected" : "";
                                                            @endphp
                                                            <option value="{{$education->id}}" class="combo option" id="selEducation-0" {{$selected}}>{{$education->qualification_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Mobile Number </label>
                                                    <input type="text" placeholder="Mobile Number" name="mobile_no" value="{{ Auth::user()->mobile_no }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Zipcode/Pincode </label>
                                                    <input type="text" placeholder="Pin" id="pincode" value="{{ Auth::user()->pincode }}" name="pincode" class="pincode">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Birthday</label>
                                                    <div class="form-input">
                                                        <input placeholder="Date of Birthday *" value="{{ Auth::user()->dob }}" name="dob" class="dob" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>State </label>
                                                    <input type="text" id="state" placeholder="State" name="state" class="state" value="{{Auth::user()->state}}" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>City </label>
                                                    <input type="text" id="city" placeholder="City" name="city" value="{{Auth::user()->city}}" class="city" readonly>
                                                </div>
                                            </div>

                                            <div class="buttons  mt-4">
                                                <a class="custom-button" href="{{url('/')}}">Back</a>
                                                <button type="submit" class="main-btn">Save Changes</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')