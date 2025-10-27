@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Forgot Password</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Forgot Password</span></span>
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
                    <a href="{{url('login')}}" class="tag">Log In</a>
                </div>
                <div class="singin-right">
                    <div class="main-form">
                        <h4>Forgot password</h4>
                        @if(session('success'))
                        <h5 class="errorsal w-100 error">
                            {{ session('success') }}
                        </h5>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="form-input">
                                <input type="text" name="email" id="validationCustom01" placeholder="Email*" class="email forgotEmail">
                                <label for="validationCustom01"><i class="fa fa-user"></i></label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <br>
                            <h6 class="forgotEmailError error"></h6>
                            <!-- <div class="form-input">
                                <input type="email" name="email" id="validationCustom02" placeholder="OTP *" required="">
                                <label for="validationCustom02"><i class="fa-solid fa-unlock-keyhole"></i></label>
                            </div> -->

                            <div class="form-input">
                                <!-- <a href="questionnaire.html" class="main-btn" type="submit">Submit</a> -->
                                <button class="main-btn forgotlinkCheck" type="button" style="width: 60%;">Send Link</button>
                                <button class="main-btn forgotlinkSend" type="submit" style="width: 60%;" hidden>Send Link</button>
                            </div>
                        </form>
                        <p>Already A member? <a href="{{('login')}}">Login</a> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')