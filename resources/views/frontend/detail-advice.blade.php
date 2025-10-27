@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Dating Advice</h2>
            <span><a href="{{('/')}}"> Home </a> &gt; <span class="font-color-pink">Dating Advice</span></span>
        </div>
    </div>
</div>

<section class="main-innerpage ">
    <div class="blog blog-page blog-single-page w-100 float-start">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="blog-box text-center w-100 float-start">
                        <div class="blog-img">
                            <img src="{{url('assets/dating-advice/detail_img'.'/'. $data->detail_img)}}" alt="" class="img-fluid">
                        </div>
                        <div class="blog-text text-start">
                            <ul class="tag-list">
                                <!-- <li><a href="javascript:;"><span><i class="fas fa-tags"></i></span> By Admin</a>
                                </li> -->
                                <li><a href="javascript:;"><span><i class="far fa-calendar-alt"></i></span>
                                {{ date('d F Y', strtotime($data->publish_date)) }}</a>
                                </li>
                            </ul>
                            <h4>{{$data->title}}</h4>
                            <p>{!! $data->long_description !!}</p>
                        </div>

                        <button class="main-btn deting-back mt-4" style="float: right;" onclick="window.history.back();">Back</button>
                    </div>


                </div>
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="sidepannal">


                        <div class="pannal-box">
                            <h5>Recent Dating Advice</h5>
                            <div class="pannal-content">
                                <div class="blog-list">
                                    @foreach($recent as $recent)
                                    <div class="blog-box">
                                        <div class="blog-list-img">
                                            <img src="{{url('assets/dating-advice/listing_img'.'/'. $recent->listing_img)}}" alt="blog-list-img" class="img-fluid">
                                        </div>
                                        <div class="blog-list-text">
                                            <a href="{{url('dating-advice') . '/' .$recent->slug}}" class="h6">{{$recent->title}}</a>
                                            <span>{{$recent->publish_date}}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="pannal-box">
                            <h5>Social Share</h5>
                            <div class="pannal-content">
                                <ul class="media-list">
                                    <li><a href="https://www.facebook.com/sharer.php?u={{url('dating-advice') . '/' .$data->slug}}" target="_blank" class="social-button">
                                            <i class="fab fa-facebook-f"></i>
                                        </a></li>
                                    <li> <a href="https://twitter.com/share?ref_src={{url('dating-advice') . '/' .$data->slug}}" class="twitter-share-button" data-text="{{$data->title}}" data-via="swanhearth" data-show-count="false" data-size="large"><i class="fab fa-twitter"></i></a></a></li>
                                </ul>
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