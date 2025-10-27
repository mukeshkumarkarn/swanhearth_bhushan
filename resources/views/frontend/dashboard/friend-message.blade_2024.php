@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Friend Message</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Friend Message</span></span>
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
                        <div class="tab-pane active show" id="tab-8">
                            <div class="heading">
                                <h2> <strong>Friend</strong> Message</h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="gallery4-wrapper">
                                <div class="row">
                                    @if(count($message) > 0)
                                    @foreach($message as $message)
                                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <div class="tab_image_wrapper">
                                            <div class="tab_image">
                                                <figure>
                                                    @if($message->profile_img)
                                                    <img src="{{ url('assets/images/profile_img'.'/'. $message->profile_img) }}" class="img-responsive" alt="profile-img">
                                                    @else
                                                    <img src="{{ asset('assets/images/no_image.jpg') }}" class="img-responsive" alt="footer-img">
                                                    @endif
                                                </figure>
                                            </div>
                                            <div class="tab_image_text">
                                                <div class="project_title">
                                                    <h4><a href="javascript:;">{{$message->name}}</a></h4>
                                                    <p> {{$message->city}}, {{$message->state}} </p>
                                                    <!-- <p> 85% Match </p> -->
                                                </div>
                                                <div class="req-btn-profile">
                                                    <ul class="media-list">
                                                        <li data-tooltip="Send Message"><a href="{{url('message').'/'.$message->user_ref}}"><i><img src="{{asset('assets/images/icon/send-message.png')}}" alt="send-message" /></i></a></li>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footerFrontend')