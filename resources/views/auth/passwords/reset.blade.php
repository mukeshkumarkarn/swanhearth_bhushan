@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Update Password</h2>
            <span><a href="/"> Home </a> &gt; <span class="font-color-pink">Update Password</span></span>
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
                        <h4>Request password</h4>
                        <p>We will immediately send you an email with a personal access link to your profile for renewal of your password.</p>
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-input">
                                <input id="email" type="email" class="@error('email') is-invalid @enderror" placeholder="email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                <label for="validationCustom01"><i class="fa fa-user"></i></label>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-input">
                                <input id="password" placeholder="enter new password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password"> <label for="validationCustom01"><i class="fa fa-user"></i></label>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-input">
                                <input id="password-confirm" placeholder="enter confirm password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"> <span class="invalid-feedback" role="alert">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="form-input">
                                <button class="main-btn" type="submit" style="width: 60%;">Update</button>
                            </div>
                        </form>
                        <p>Already A member? <a href="{{url('login')}}">Login</a> </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')