@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Login</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Login</span></span>
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
                    <a href="{{('sign-up')}}" class="tag">Sign up</a>
                </div>
                <div class="singin-right">
                    <div class="main-form">
                        <h4>Welcome to Swanhearth</h4>
						<p>Login to online dating application to find someone you can love with simple mindset</p>
                        @if(session('success'))
                        <h5 class="errorsal w-100 error">
                            {{ session('success') }}
                        </h5>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-input">
                                <input type="email" name="email" id="email-login" class="email" placeholder="Email *">
                                <label for="validationCustom02"><i class="fa fa-envelope"></i></label>
                                <h6 class="error" id="useremail"></h6>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-input">
                                <input type="password" name="password" id="login-pass" class="password" placeholder="Password *">
                                <label for="validationCustom04"><i class="fa fa-lock"></i></label>
                                <h6 class="error" id="userpasswrd"></h6>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-input forcaptcha">
                                        <img id="imgCaptcha" src="{{ url('captcha') }}" alt="Captcha Image" style="height: 44px;">
                                        <img src="{{asset('assets/images/arrows-rotate-solid.svg')}}" id="reloadchap" type="button" alt="reload" style="width:20px;">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-input">
                                        <input type="text" placeholder="Captcha *" name="captcha_value" class="captach_value chaptcha pl-2" id="chapcha">
                                        <h6 id="chapmessage" class="error"></h6>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="button" class="valid" id="submit-btn" data-check="register" hidden>check</button>
                            <!-- captcha -->

                            <div class="form-input-checkbox">
                                <input type="checkbox" name="myCheckboxlogin" id="myCheckboxlogin">
                                <label for="myCheckboxlogin">I agree to <a href="{{('terms-and-condition')}}" target="_blank">terms and conditions</a></label>
                            </div>
                            <h6 class="error" id="myCheckboxlogincheck"></h6>
                            <div class="form-input">
                                <button class="main-btn loginpage" type="button" style="width: 60%;"><img src="{{asset('assets/images/loader2.gif')}}" class="loading-spinner" width="20" alt="Loading..." />Login</button>
                                <button class="main-btn sucesslogin" type="submit" style="width: 60%;" hidden>Login In</button>
                            </div>
                            <div class="form-input-checkbox">
                                <a href="forgot-password">Forgot Password</a>
                            </div>
                        </form>
                        <p>New member? <a href="{{('sign-up')}}">signup</a> </p>
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
                $('#chapmessage').html('Please enter captcha value');
                $('#chapmessage').show();
                return;
            }
            $.post('{{ route("validate-captcha") }}', {
                _token: '{{ csrf_token() }}',
                captcha_value: captchaValue
            }, function(data) {
                // console.log(data);
                $('.loading-spinner').hide();
                $('.loginpage').prop('disabled', false).addClass('classDesign');
                if (data.message == "Captcha validation successful.") {
                    $('.sucesslogin').click();
                } else {
                    $('#chapmessage').html('Invalid captcha value');
                    $('#chapmessage').show();
                    $('.loginpage').prop('enabled', false).addClass('classenabled');
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