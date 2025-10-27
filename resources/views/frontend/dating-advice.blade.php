@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Dating Advice</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Dating Advice</span></span>
        </div>
    </div>
</div>

<section class="main-innerpage ">
    <div class="testimonial-one-wrapper padd-100 float-start w-100">
        <div class="heading center-heading mb-5">
            <h2>Sweet <strong>Dating Advice</strong> for Lovers</h2>
            <div class="heart-line"> <i class="fa fa-heart"></i> </div>
			<p>Dating advice provides perfect direction to young generation for love and romance. <br/>Our love guru provides advice which builds confidence and overcome the relationship challenges.</p>

        </div>
        <div class="container">
            <div class="row">
                @foreach($data as $datas)
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="testimonial-one">
                        <div class="test-img"> <img src="{{url('assets/dating-advice/listing_img'.'/'. $datas->listing_img)}}" alt="image"> </div>
                        <div class="test-content">
                            <div class="test-icon"> <i class="fa-solid fa-handshake"></i> </div>
                            <ul class="tag-list mt-4">
                                <!-- <li><a href="javascript:;"><span><i class="fa fa-tags"></i></span> By Admin</a>
                                </li> -->
                                <li><a href="javascript:;"><span><i class="fa fa-calendar"></i></span> {{$datas->publish_date}}</a></li>
                            </ul>
                            <h6><a href="{{url('dating-advice') . '/' .$datas->slug}}">{{$datas->title}}</a></h6>
                            <p>{{$datas->short_description}}</p>
                            <a href="{{url('dating-advice') . '/' .$datas->slug}}" class="btn6 mt-4 mb-3">Read More &nbsp;<i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $data->links('pagination::bootstrap-4') }}
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')