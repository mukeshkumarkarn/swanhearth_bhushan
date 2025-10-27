@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Show Image Gallery</h2>
            <span><a href="{{('/')}}"> Home </a> &gt; <span class="font-color-pink">Show Image Gallery</span></span>
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
                                    <div class="swiper-slide">
                                        <a href="{{ url('assets/images/profile_img'.'/'. $data->profile_img) }}" data-fancybox="gallery-image">
                                            @if($data->profile_img)
                                            <img src="{{ asset('assets/images/profile_img/' . $data->profile_img) }}" alt="footer-img">
                                            @else
                                            @if($data->gender == 'male')
                                            <img src="{{ asset('assets/images/profile_img/' . env('MALE')) }}" alt="footer-img">
                                            @else
                                            <img src="{{ asset('assets/images/profile_img/' . env('FEMALE')) }}" alt="footer-img">
                                            @endif
                                            @endif
                                        </a>
                                    </div>
                                    <div class="swiper-slide">
                                        <a href="{{ url('assets/images/profile_img'.'/'. $data->profile_img) }}" data-fancybox="gallery-image">
                                            <img src="{{ url('assets/images/profile_img'.'/'. $data->profile_img) }}" alt="single-product1" class="img-fluid" />
                                        </a>
                                    </div>

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