@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Permission Manage</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Permission Manage</span></span>
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
                        <div class="tab-pane active show" id="tab-6">
                            <div class="heading">
                                <h2><strong>Permission</strong> Manage </h2>
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
                                    <form method="POST" action="{{ url('permission-update') }}">
                                        @csrf
                                        <div class="row">
                                            <input type="text" placeholder="id" value="{{ Auth::user()->id }}" name="user_id" hidden>
                                            <div class="col-md-12">
                                                <div class="my-input-box mb-1">
                                                    <label>Display Profile image</label>
                                                </div>
                                                <div class="my-input-box">
                                                    @php
                                                    $profile = $data->profileShow_hide;
                                                    @endphp
                                                    <label class="labelforcustom">
                                                        <input type="radio" value="1" name="profileshow" {{ $profile == '1' ? 'checked' : '' }} class="option-input radio" />
                                                        All
                                                    </label>
                                                    <label class="labelforcustom">
                                                        <input type="radio" value="2" name="profileshow" {{ $profile == '2' ? 'checked' : '' }} class="option-input radio" />
                                                        ON Demand
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box mb-1">
                                                    <label>Display Email</label>
                                                </div>
                                                <div class="my-input-box">
                                                    @php
                                                    $emailshow = $data->email_show_hide;
                                                    @endphp
                                                    <label class="labelforcustom">
                                                        <input type="radio" value="1" name="emailshow" {{ $emailshow == '1' ? 'checked' : '' }} class="option-input radio" />
                                                        All
                                                    </label>
                                                    <label class="labelforcustom">
                                                        <input type="radio" value="2" name="emailshow" {{ $emailshow == '2' ? 'checked' : '' }} class="option-input radio" />
                                                        ON Demand
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box mb-1">
                                                    <label>Display Mobile</label>
                                                </div>
                                                <div class="my-input-box">
                                                    @php
                                                    $mobiles = $data->mobile_show_hide;
                                                    @endphp
                                                    <label class="labelforcustom">
                                                        <input type="radio" value="1" name="mobileshow" {{ $mobiles == '1' ? 'checked' : '' }} class="option-input radio" />
                                                        All
                                                    </label>
                                                    <label class="labelforcustom">
                                                        <input type="radio" value="2" name="mobileshow" {{ $mobiles == '2' ? 'checked' : '' }} class="option-input radio" />
                                                        ON Demand
                                                    </label>
                                                </div>
                                            </div>


                                            <div class="buttons  mt-4">
                                                <a class="custom-button" href="{{url('/')}}">Back</a>
                                                <button type="submit" class="main-btn">Update</button>
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