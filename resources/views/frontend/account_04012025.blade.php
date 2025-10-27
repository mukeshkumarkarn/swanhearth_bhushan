@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>My Account</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">My Account</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage">
    <!-- fifth button end -->
    <div class="bz_single_product_main_wrapper w-100 float-start">
        <div class="container">
            <div class="shoping_box w-100 float-start">
                <div class="row">
                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="product__carousel">
                            <div class="swiper-container gallery-top">
                                <div class="swiper-wrapper">

                                    @if($album != null && count($album) > 0)
                                    @foreach ($album as $albums)
                                    <div class="swiper-slide">
                                        <a href="{{ url('assets/images/user_album'.'/'. $albums->user_album) }}" data-fancybox="gallery-image">
                                            <img src="{{ url('assets/images/user_album'.'/'. $albums->user_album) }}" alt="single-product1" class="img-fluid" />
                                        </a>
                                    </div>
                                    @endforeach
                                    @else
                                    <a href="{{ url('assets/images/profile_img'.'/'. $data->profile_img) }}" data-fancybox="gallery-image">
                                        @if($data->profile_img)
                                        <img src="{{ url('assets/images/profile_img'.'/'. $data->profile_img) }}" alt="profile-img" class="img-fluid">
                                        @else
                                        @if($data->gender == 'male')
                                        <img src="{{ asset('assets/images/profile_img/' . env('MALE')) }}" alt="single-product1" class="img-fluid">
                                        @else
                                        <img src="{{ asset('assets/images/profile_img/' . env('FEMALE')) }}" alt="single-product1" class="img-fluid">
                                        @endif
                                        @endif
                                    </a>
                                    @endif

                                </div>
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white"></div>
                            </div>
                            <div class="swiper-container gallery-thumbs">
                                <div class="swiper-wrapper">
                                    @foreach ($album as $album)
                                    <div class="swiper-slide"> <img src="{{ url('assets/images/user_album'.'/'. $album->user_album) }}" alt="single-product1" class="img-fluid"> </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-12 col-12">
                        <div class="b_product_sell_details_wrapper mt-4 mt-lg-0 float_left">
                            <div class="bz_product_heading float_left">
                                <h3>{{$data->name}} , <?php
                                                        $dob = new DateTime($data->dob);
                                                        $currentDate = new DateTime();
                                                        $age = $dob->diff($currentDate)->y;
                                                        echo $age;
                                                        ?></h3>
                                <span class="font-color-pink"></span><br><span>{{$data->state}} {{$data->city}}</span>
                                <h6 class="messageShow" style="color: green;"></h6>

                                <input type="text" value="{{Auth::user()->id}}" class="user_id" hidden>
                            </div>
                            <div class="tab-five-wrapper float-start w-100 pt-3">
                                <ul class="nav nav-pills mb-3" id="pills-tab-five" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pills-consult-tab" data-bs-toggle="pill" data-bs-target="#pills-consult" type="button" role="tab" aria-controls="pills-consult" aria-selected="true">About</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-planning-tab" data-bs-toggle="pill" data-bs-target="#pills-planning" type="button" role="tab" aria-controls="pills-planning" aria-selected="false">Personal Details</button>
                                    </li>
                                    <!-- <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="pills-investment-tab" data-bs-toggle="pill" data-bs-target="#pills-investment" type="button" role="tab" aria-controls="pills-investment" aria-selected="false">Preferred Match</button>
                                    </li> -->
                                </ul>
                                <div class="container">
                                    <div class="row">
                                        <div class="tab-content p-0" id="pills-tabContentfive">
                                            <div class="tab-pane fade show active" id="pills-consult" role="tabpanel" aria-labelledby="pills-consult-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-4 my-table">
                                                        <tbody>
                                                            @if($data->name)
                                                            <tr>
                                                                <th scope="row">Name</th>
                                                                <td>{{$data->name}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->display_email)
                                                            <tr>
                                                                <th scope="row">Public Email</th>
                                                                <td>{{$data->display_email}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->qualification_name)
                                                            <tr>
                                                                <th scope="row">Education Level</th>
                                                                <td>{{$data->qualification_name}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->mobile_no)
                                                            <tr>
                                                                <th scope="row">Mobile Number</th>
                                                                <td>{{$data->mobile_no}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->state)
                                                            <tr>
                                                                <th scope="row">state</th>
                                                                <td>{{$data->state}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->city)
                                                            <tr>
                                                                <th scope="row">City</th>
                                                                <td>{{$data->city}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->pincode)
                                                            <tr>
                                                                <th scope="row">Zipcode/Pincode</th>
                                                                <td>{{$data->pincode}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                        </tbody>
                                                        <!-- end tbody -->
                                                    </table>
                                                    <!-- end table -->
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="pills-planning" role="tabpanel" aria-labelledby="pills-planning-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-3 my-table">
                                                        <tbody>
                                                            @if($data->dob)
                                                            <tr>
                                                                <th scope="row">Date of Birthday </th>
                                                                <td>{{$data->dob}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->eye_color)
                                                            <tr>
                                                                <th scope="row">Eye Color</th>
                                                                <td>{{$data->eye_color}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->eye_color)
                                                            <tr>
                                                                <th scope="row">Hair Color</th>
                                                                <td>{{$data->hair_color}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->body_type)
                                                            <tr>
                                                                <th scope="row">Body Type</th>
                                                                <td>{{$data->body_type}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->body_weigh)
                                                            <tr>
                                                                <th scope="row">Body Weight (kg)</th>
                                                                <td>{{$data->body_weigh}} Kg</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->religion_name)
                                                            <tr>
                                                                <th scope="row">Religion</th>
                                                                <td>{{$data->religion_name}}</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($data->heigh_feet)
                                                            <tr>
                                                                <th scope="row">Height</th>
                                                                <td>{{$data->heigh_feet}} Foot {{$data->heigh_inch}} Inch</td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                            @if($options)
                                                            <tr>
                                                                <th scope="row">My friend and family tell about me</th>
                                                                <td>
                                                                    <ul class="tag-line">
                                                                        @foreach ($options as $option)
                                                                        <li>{{ $option->friend_family_tell }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            <!-- end tr -->
                                                        </tbody>
                                                        <!-- end tbody -->
                                                    </table>
                                                    <!-- end table -->
                                                </div>
                                            </div>
                                            <!-- <div class="tab-pane fade" id="pills-investment" role="tabpanel" aria-labelledby="pills-investment-tab">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered mb-3 my-table">
                                                        <tbody>
                                                            @if($prematch)
                                                            @if($prematch->qualification_name)
                                                            <tr>
                                                                <th scope="row">Education</th>
                                                                <td>{{$prematch->qualification_name}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($prematch->state)
                                                            <tr>
                                                                <th scope="row">State</th>
                                                                <td>{{$prematch->state}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($prematch->city)
                                                            <tr>
                                                                <th scope="row">City</th>
                                                                <td>{{$prematch->city}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($prematch->height)
                                                            <tr>
                                                                <th scope="row">Height </th>
                                                                <td>{{$prematch->height}}.{{$prematch->Inch}}</td>
                                                            </tr>
                                                            @endif
                                                            @if($prematch->religion_name)
                                                            <tr>
                                                                <th scope="row">Religion</th>
                                                                <td>
                                                                    <ul class="tag-line">
                                                                        <li>{{$prematch->religion_name}}</li>
                                                                    </ul>
                                                                </td>
                                                            </tr>
                                                            @endif
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- fifth button end -->
                        </div>
                    </div>
                </div>
                <div class="for-next-prv-btn">
                </div>
            </div>
        </div>
    </div>
    <!-- bz Slider main wrapper End-->

</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')