@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Register</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Register</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage">
    <div class="main-singin-box w-100 float-start">
        <div class="container">
            <div class="singin-box">
                <div class="singin-left">

                    <ul class="login-btns">
                        <li>
                            <a href="{{url('auth/facebook')}}" class="btn-fb">Login with Facebook</a>
                        </li>
                        <li>
                            <a href="{{url('auth/google')}}" class="btn-g">Login with Google</a>
                        </li>
                    </ul>
                    <a href="{{('login')}}" class="tag">Log In</a>
                </div>
                <div class="singin-right">
                    <div class="main-form">
                        <h4>Swanhearth Signup</h4>
                        <p>Create your free account in online dating portal to find your true love</p>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        @if(session('success'))
                        <h5 class="errorsal w-100" style="color: green;">
                            {{ session('success') }}
                        </h5>
                        @endif
                        <form action="{{url('user-register')}}" method="post" enctype=multipart/form-data>
                            @csrf
                            <div class="form-input">
                                <input type="text" name="name" id="validationCustom01" class="username" placeholder="Display name *" autocomplete="off">
                                <label for="validationCustom01"><i class="fa fa-user"></i></label>
                                <h6 class="usernameerror error"></h6>
                            </div>
                            <div class="form-input">
                                <input type="email" name="email" class="email" id="email" placeholder="Email Address *">
                                <label for="validationCustom02"><i class="fa fa-envelope"></i></label>
                                <h6 class="emailerror error" id="emailerror"></h6>
                            </div>
                            <div class="form-input">
                                <input placeholder="Date of Birthday *" name="dob" class="dob" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date" />
                                <label for="validationBirthday"><i class="fa fa-calendar"></i></label>
                                <h6 class="doberror error"></h6>
                            </div>

                            <div class="form-input">
                                <span class="for-upload-label float-start">Profile Image <small>(jpg,png)</small></span>
                                <input type="file" name="profile_img" class="profile_img form-control" id="profile_img" accept=".jpeg, .jpg, .png">
                                <label for="validationCustom02"><i class="fa fa-user"></i></label>
                            </div>

                            <!-- <div class="form-input">
                                <input type="text" id="pincode" name="pincode" placeholder="Pin Code *" class="pincode">
                                <label for="validationPin"><i class="fa-solid fa-map-pin"></i></label>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-input">
                                        <input type="text" id="state" placeholder="State" name="state" class="state" readonly>
                                        <label for="validationState"><i class="fa-solid fa-map-location"></i></label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-input">
                                        <input type="text" id="city" placeholder="City" name="city" class="city" readonly>
                                        <label for="validationCity"><i class="fa fa-location-dot"></i></label>
                                    </div>
                                </div>
                            </div> -->

                            <input type="text" id="pincode" name="pincode" placeholder="Pin Code *" class="pincode" value="{{$location->zipCode}}" hidden>
                            <input type="text" id="countryName" placeholder="countryName" name="country" class="countryName" value="{{$location->countryName}}" hidden>
                            <input type="text" id="state" placeholder="State" name="state" class="state" value="{{$location->regionName}}" hidden>
                            <input type="text" id="city" placeholder="City" name="city" value="{{$location->cityName}}" class="city" hidden>
                            <input type="text" placeholder="" class="" id="latitude" name="latitude" value="{{$location->latitude}}" hidden>
                            <input type="text" placeholder="" class="" id="longitude" name="longitude" value="{{$location->longitude}}" hidden>



                            <div class="row">
                                <div class="form-input">
                                    <div class="custum-select">
                                        <select name="gender" class="input gender" id="selEducation">
                                            <option value="">select gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <h6 class="genderError error"></h6>

                            <div class="form-input">
                                <input type="password" class="password" name="password" id="password" placeholder="Password *">
                                <label for="validationCustom04"><i class="fa fa-lock"></i></label>
                                <h6 class="passworderror error" id="passworderror"></h6>
                            </div>
                            <div class="form-input">
                                <input type="password" class="confirm-password" name="password" id="confirm-password" placeholder="Confirm Password *">
                                <label for="validationConfirm"><i class="fa fa-lock"></i></label>
                                <h6 class="conpassword error" id="conpassword"></h6>
                            </div>

                            <!-- captcha -->

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-input forcaptcha">
                                        <img id="imgCaptcha" src="{{ url('captcha') }}" alt="Captcha Image" style="height: 44px;">
                                        <img src="{{asset('assets/images/arrows-rotate-solid.svg')}}" id="reloadchap" type="button" alt="reload" style="width:20px;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-input">
                                        <input type="text" placeholder="Captcha" name="captcha_value" class="captach_value chaptcha pl-2" id="chapcha">
                                        <h6 id="chapmessage" class="error"></h6>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="validchapcha" id="submit-btn" data-check="register" hidden>check</button>
                            <!-- captscha -->



                            <div class="form-input-checkbox">
                                <input type="checkbox" name="myCheckbox" id="rememberme">
                                <label for="rememberme">I agree to <a href="{{('terms-and-condition')}}" target="_blank">terms and conditions</a></label>
                                <br>
                                <h6 class="myCheckboxerror error"></h6>
                            </div>
                            <div class="form-input">
                                <button class="main-btn sign" type="button" style="width:60%;"><img src="{{asset('assets/images/loader2.gif')}}" class="loading-spinner" width="20" alt="Loading..." />Sign up</button>
                                <button class="main-btn register" type="submit" style="width:60%;" hidden>Sign up</button>
                            </div>
                        </form>
                        <p>Already A member? <a href="{{('login')}}">Login</a> </p>
                        <p><a href="{{('forgot-password')}}">Forgot Password</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')

<script>
    $(document).ready(function() {
        $('#submit-btn').click(function() {
            var captchaValue = $('input[name="captcha_value"]').val();
            if (captchaValue === '') {
                // Captcha value is empty, show an error message
                $('#chapmessage').html('Please enter captcha value');
                $('#chapmessage').show();
                return;
            }
            $.post('{{ route("validate-captcha") }}', {
                _token: '{{ csrf_token() }}',
                captcha_value: captchaValue
            }, function(data) {
                console.log(data);
                $('.loading-spinner').hide();
                $('.loginpage').prop('disabled', false).addClass('classDesign');
                if (data.message == "Captcha validation successful.") { // Captcha value is correct, submit the form
                    $('.loading-spinner').show();
                    $(".register").click();
                } else {
                    // Captcha value is incorrect, show an error message
                    $('#chapmessage').html('Invalid captcha value');
                    $('#chapmessage').show();
                }
            });
        });
    });
</script>

<script>
    // Get references to the login button and submit button
    const loginBtn = document.getElementById('login-btn');
    const submitBtn = document.getElementById('submit-btn');
    // Add a click event listener to the login button
    loginBtn.addEventListener('click', function() {
        // Trigger a click event on the submit button
        submitBtn.click();
    });
</script>



<script>
    document.getElementById("reloadBtn").addEventListener("click", function() {
        var captchaImg = document.getElementById("imgCaptcha");
        var captchaSrc = captchaImg.src;
        captchaImg.src = captchaSrc.split("?")[0] + "?" + new Date().getTime();
    });
</script>

<!-- chapcha reload function -->
<script>
    const reload = document.querySelector('#reloadchap');
    reload.addEventListener('click', function() {
        const captchaImg = document.querySelector('#imgCaptcha');
        captchaImg.src = "{{ url('captcha') }}?rand=" + Math.random();
    });
</script>

<script>
    const latitudeInput = document.getElementById("latitude");
    const longitudeInput = document.getElementById("longitude");

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        } else {
            showError("Geolocation is not supported by this browser.");
        }
    }

    function showPosition(position) {
        latitudeInput.value = position.coords.latitude;
        longitudeInput.value = position.coords.longitude;
        document.querySelector('').innerHTML = "Latitude: " + position.coords.latitude + "<br>Longitude: " + position.coords.longitude;
    }

    function showError(error) {
        document.querySelector('').innerHTML = error;
    }

    // Call getLocation when the page loads
    window.addEventListener("load", getLocation);
</script>