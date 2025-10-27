@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Contact</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Contact</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage">
    <div class="contact-section w-100 float-start">
        <div class="container">
            <div class="heading center-heading">
                <h2>Get <strong>In</strong> Touch</h2>
                <div class="heart-line">
                    <i class="fas fa-heart"></i>
                </div>
                <p>You can contact us any time. We always consider users/customers in highest priority.</p>
            </div>
            <div class="w-100 float-start position-relative">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="contact-detail">
                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-12">
                                    <div class="contact-detail-box">
                                        <h4>Contact Details</h4>
                                        <div class="contact-detail-list">
                                            <div class="contact-detail-text">
                                                <p><i class="fas fa-envelope"></i>Email:</p>
                                                <p>
                                                    <a href="mailto:{{env('EMAIL')}}">{{env('EMAIL')}}</a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-12 col-12"></div>
                    <div class="col-lg-9 col-md-12 col-12">
                        <div class="form-box">
                            <div class="row">
                                <div class="col-lg-5 col-md-12 col-12"></div>
                                <div class="col-lg-7 col-md-12 col-12">
                                    <div class="main-form">
                                        <h4>For any Query Please Leave A Messege</h4>
                                        @if(session('success'))
                                        <h5 class="errorsal w-100 error">
                                            {{ session('success') }}
                                        </h5>
                                        @endif
                                        <form method="POST" action="{{ url('contact-save') }}">
                                            @csrf
                                            <div class="form-input">
                                                <input type="text" name="name" id="Cname" placeholder="Full Name *" value="{{ auth()->user()->name ?? '' }}">
                                                <label for="validationCustom01"><i class="fas fa-user"></i></label>
                                                <h6 id="firstname" class="error"></h6>
                                            </div>
                                            <div class="form-input">
                                                <input type="email" name="email" id="Cemail" placeholder="Email Address *" value="{{ auth()->user()->email ?? '' }}">
                                                <label for="validationCustom02"><i class="fas fa-envelope"></i></label>
                                                <h6 id="emailerror" class="error"></h6>
                                            </div>
                                            <div class="form-input">
                                                <input type="text" name="subject" id="subject" placeholder="Subject*">
                                                <label for="validationCustom03"><i class="fa-solid fa-book"></i></label>
                                                <h6 id="subjecterror" class="error"></h6>
                                            </div>
                                            <div class="form-input">
                                                <input type="tel" name="phone" id="Cphone" placeholder="Phone*">
                                                <label for="validationCustom04"><i class="fa-solid fa-mobile-screen"></i></label>
                                                <h6 id="phoneerror" class="error"></h6>
                                            </div>

                                            <div class="form-input">
                                                <textarea id="validationTextarea" class="message" name="message" placeholder="Message*"></textarea>
                                                <label for="validationTextarea"><i class="fa-solid fa-pen-nib"></i></label>
                                                <h6 id="messageerror" class="error"></h6>
                                            </div>

                                            <input type="text" name="user_id" value="{{ auth()->user()->id ?? '' }}" hidden>


                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-input forcaptcha">
                                                        <img id="imgCaptcha" src="{{ url('captcha') }}" alt="Captcha Image" style="height: 44px;">
                                                        <img src="{{asset('assets/images/arrows-rotate-solid.svg')}}" id="reloadchap" type="button" alt="reload" style="width:20px;">
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-input">
                                                        <input type="text" placeholder="Enter Captcha" name="captcha_value" class="captach_value chaptcha pl-2" id="chapcha">
                                                        <h6 id="chapmessage" class="error"></h6>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <button type="button" class="validcontact" id="submit-btn" data-check="register" hidden>check</button>
                                            <!-- captcha -->


                                            <div class="form-input">
                                                <button class="main-btn contact" type="button"><img src="{{asset('assets/images/loader2.gif')}}" class="loading-spinner" width="20" alt="Loading..." />Send Now</button>
                                                <button type="submit" class="savecontact" hidden>save</button>
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
                console.log(data);
                $('.loading-spinner').hide();
                $('.loginpage').prop('disabled', false).addClass('classDesign');
                if (data.message == "Captcha validation successful.") { // Captcha value is correct, submit the form
                    $('.loading-spinner').show();
                    $(".savecontact").click();
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