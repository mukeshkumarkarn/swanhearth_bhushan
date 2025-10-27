@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Admin Login</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Admin Login</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage">
    <!--- second form start -->

    <div class="form-two-wrapper float-start w-100 padd-200">

        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-5 col-md-12 col-sm-12 col-12">
                    <div class="form-two">
                        <form method="POST" action="{{ url('employes-login') }}" enctype=multipart/form-data>
                            @csrf
                            @if(session('success'))
                            <h5 class="errorsal w-100 error">
                                {{ session('success') }}
                            </h5>
                            @endif
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control adminEmail" id="exampleInputEmail2" placeholder="Your Email">
                                <h6 class="error adminEmailError"></h6>
                            </div>

                            <div class="mb-3">
                                <input type="password" name="password" class="form-control adminPassword" placeholder="Your Password" id="exampleInputPassword2">
                                <h6 class="error adminPasswordError"></h6>
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
                                        <input type="text" placeholder="Enter Captcha" name="captcha_value" class="captach_value chaptchas form-control" id="chapchas">
                                        <h6 id="chapmessages" class="error"></h6>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="Adminvalid" id="submit-btn" data-check="register" hidden>check</button>
                            <!-- captcha -->
                            <br>
                            <div class="form-input-checkbox">
                                <input type="checkbox" name="myCheckboxlogin" id="myCheckboxlogin">
                                <label for="myCheckboxlogin">I agree to <a href="{{url('admin/terms-and-condition')}}" target="_blank">terms and conditions</a></label>
                            </div>
                            <h6 class="error" id="myCheckboxlogincheck"></h6>
                            <br>
                            <div class="tb_es_btn_div">
                                <div class="tb_es_btn_wrapper os_contact_input">
                                    <button type="button" class="form-btn btn-two adminlogin">Login</button>
                                    <button type="submit" class="form-btn btn-two adminsucesslogin" hidden>submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--- second form end -->
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')

<script>
    $(document).ready(function() {
        $('#submit-btn').click(function() {
            var captchaValue = $('input[name="captcha_value"]').val();
            if (captchaValue === '') {
                $('#chapmessages').html('Please enter captcha value');
                $('#chapmessages').show();
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
                    $('.adminsucesslogin').click();
                } else {
                    $('#chapmessages').html('Invalid captcha value');
                    $('#chapmessages').show();
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