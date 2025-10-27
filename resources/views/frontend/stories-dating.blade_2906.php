@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Dating Stories</h2>
            <span><a href="{{('/')}}"> Home </a> &gt; <span class="font-color-pink">Dating Stories</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage">
    <div class="blog blog-next w-100 float-start">
        <div class="container">
            <div class="heading center-heading">
                <h2>Sweet <strong>Stories From Our</strong> Lovers</h2>
                <div class="heart-line"> <i class="fa fa-heart"></i> </div>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                    <br>standard dummy text ever since the 1500s, when an unknown printer took
                </p>
            </div>
            <div class="w-100 float-start">
                <div class="row">
                    @foreach($data as $datas)
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="blog-box ">
                            <div class="blog-img"> <img src="{{url('assets/stories/listing_img'.'/'. $datas->listing_img)}}" alt="ind3-blog-img-1" class="img-fluid"> </div>
                            <div class="blog-text">
                                <ul class="list-start">
                                    <li><a href="#"><span><i class="fa fa-calendar-alt"></i></span> {{$datas->publish_date}}</a></li>
                                </ul>
                                <a href="{{url('dating-stories') . '/' .$datas->slug}}" class="h4">{{$datas->title}}</a>
                                <p>{{$datas->summary}}</p>
                                <a href="{{url('dating-stories') . '/' .$datas->slug}}" class="main-btn">Read More</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')