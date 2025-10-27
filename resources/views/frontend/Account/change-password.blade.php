@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>change password</h2>
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
                        <div class="tab-pane active show" id="tab-2">
                            <div class="heading">
                                <h2><strong>Change</strong> Password </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="input-info-box">
                                <div class="content">
                                    @if(session('success'))
                                    <h5 class="errorsal w-100" style="color:green;">
                                        {{ session('success') }}
                                    </h5><br/>
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
                                    <form method="POST" action="{{ url('user-password-update') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>New Password</label>
                                                    <input type="password" placeholder="New Password" class="user-password" name="password">
                                                    <h6 class="user-passwordError error"></h6>
                                                </div>
                                            </div>
                                            <input type="text" placeholder="id" value="{{ Auth::user()->id }}" name="user_id" hidden>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Confirm New Password</label>
                                                    <input type="password" placeholder="Confirm New Password" name="" class="user-confirmPassword">
                                                    <h6 class="user-confirmPasswordError error"></h6>
                                                </div>
                                            </div>
                                            <div class="buttons  mt-4">
                                                <button class="custom-button" type="reset">Reset </button>
                                                <button type="button" class="main-btn userUpdatePasswordCheck">Update</button>
                                                <button type="submit" class="main-btn userUpdatePassword" hidden>Update</button>
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