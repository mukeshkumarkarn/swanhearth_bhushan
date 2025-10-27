@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Photo Request send</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Photo Request send</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage ">
    <div class="blog-page pt-5 pb-5 w-100 float-start">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
				@include('frontend.dashboard.dashboard-leftmenu')	
				
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="my-profile tab-content">
                        <div class="tab-pane active show" id="tab-11">
                            <div class="heading">
                                <h2><strong> Photo Request</strong> send</h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="gallery4-wrapper">
                                <div class="row">
                                    @if(count($sendphotoRequests) > 0)
                                    @foreach($sendphotoRequests as $sendphoto)
                                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <div class="tab_image_wrapper">
                                            <div class="tab_image">
                                                <figure>
                                                    @if($sendphoto->profile_img)
                                                    <img src="{{ url('assets/images/profile_img'.'/'. $sendphoto->profile_img) }}" class="img-responsive" alt="profile-img">
                                                    @else
                                                    <img src="{{ asset('assets/images/no_image.jpg') }}" class="img-responsive" alt="footer-img">
                                                    @endif
                                                </figure>
                                            </div>
                                            <div class="tab_image_text">
                                                <div class="project_title">
                                                    <h4><a href="javascript:;">{{$sendphoto->name}}</a></h4>
                                                    <p> {{$sendphoto->city}}, {{$sendphoto->state}} </p>
                                                </div>
                                                <div class="req-btn-profile">
                                                    <ul class="media-list">
                                                        <li data-tooltip="Send Message"><a href="{{url('message').'/'.$sendphoto->user_ref}}"><i><img src="{{asset('assets/images/icon/send-message.png')}}" alt="send-message" /></i></a></li>
                                                        @if($sendphoto->photo_request_status===2)
                                                        <li data-tooltip="Show Photo"><a href="{{url('dashboard/show-image-gallery').'/'.$sendphoto->user_ref}}"><i><img src="{{asset('assets/images/icon/gallery.png')}}" alt="Show photo" /></i></a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                    <div class="col-lg-12 NoData">
                                        <h4><span class="alert-icon"><i class="fas fa-bullhorn "></i></span>
                                            No record found.
                                        </h4>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $sendphotoRequests->links('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')