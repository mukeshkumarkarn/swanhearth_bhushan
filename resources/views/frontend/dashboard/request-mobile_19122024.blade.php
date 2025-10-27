@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Request Mobile Number</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Request Mobile Number</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage ">
    <div class="blog-page pt-5 pb-5 w-100 float-start">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div id="algn">
                        <div id="card">
                            <div id="upper-bg">
                                @if(Auth::user()->profile_img)
                                <img src="{{ url('assets/images/profile_img'.'/'. Auth::user()->profile_img) }}" alt="profile-pic" class="profile-pic">
                                @else
                                <img src="{{ asset('assets/images/no_image.jpg') }}" alt="profile-pic" class="profile-pic" style="width: 100px;">
                                @endif

                            </div>
                            <div id="lower-bg">
                                <div class="text">
                                    <p class="name">{{ Auth::user()->name }}</p>
                                    @if(Auth::check())
                                    @php
                                    $dob = new DateTime(Auth::user()->dob);
                                    $currentDate = new DateTime();
                                    $age = $dob->diff($currentDate)->y;
                                    @endphp
                                    <p class="title">{{ $age }} year old {{ Auth::user()->gender }}</p>
                                    @endif

                                    <p><i class="fas fa-map-marker-alt"></i> {{ Auth::user()->state }} {{ Auth::user()->city }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidepannal">
                        <div class="pannal-box mt-0">
                            <h5>My Profile</h5>
                            <div class="pannal-content">
                                <ul class="nav nav-tabs profile-setting">
                                    <li class="nav-item"><a class="nav-link {{ $bookmarksCount > 0 ? 'note' : '' }}" href="{{url('dashboard')}}"><span><i class="fa-solid fa-check-double"></i></span> My Bookmarks<div class="note-count2">{{$bookmarksCount}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link" href="{{url('dashboard/friend-message')}}"><span><i class="fa-solid fa-check-double"></i></span>Friend Message </a></li>
                                    <!-- <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-9"><span><i class="fa-solid fa-check-double"></i></span> Accepted Members</a></li> -->
                                    <!-- <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-10"><span><i class="fa-solid fa-check-double"></i></span> Sent Interests</a></li> -->
                                </ul>
                            </div>
                            <h5>Requests Received</h5>
                            <div class="pannal-content">
                                <ul class="nav nav-tabs profile-setting">
                                    <li class="nav-item"><a class="nav-link " href="{{url('dashboard/request-photo-received')}}"><span><i class="fa-solid fa-check-double"></i></span> Photo Request Received</a></li>
                                    <li class="nav-item"><a class="nav-link {{ $requestMobilesCount > 0 ? 'note' : '' }} active show" data-toggle="tab" href="#tab-14"><span><i class="fa-solid fa-check-double"></i></span> Request Mobile number<div class="note-count2">{{$requestMobilesCount}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link {{ $requestEmailsCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-email-received')}}"><span><i class="fa-solid fa-check-double"></i></span> Email Request Received<div class="note-count2">{{$requestEmailsCount}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link {{ $requestLikesCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-like-received')}}"><span><i class="fa-solid fa-check-double"></i></span> Like Request Received<div class="note-count2">{{$requestLikesCount}}</div></a></li>
                                </ul>
                            </div>
                            <h5>Requests Sent</h5>
                            <div class="pannal-content">
                                <ul class="nav nav-tabs profile-setting">
                                    <li class="nav-item"><a class="nav-link " href="{{url('dashboard/request-sent-photo')}}"><span><i class="fa-solid fa-check-double"></i></span> Photo Request Sent</a></li>
                                    <li class="nav-item"><a class="nav-link {{ $sendMobileRequestsCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-mobile-sent')}}"><span><i class="fa-solid fa-check-double"></i></span> Request Sent Mobile number<div class="note-count2">{{$sendMobileRequestsCount}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link {{ $sendEmailRequestsCont > 0 ? 'note' : '' }}" href="{{url('dashboard/request-email-sent')}}"><span><i class="fa-solid fa-check-double"></i></span> Email Request Sent <div class="note-count2">{{$sendEmailRequestsCont}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link {{ $sendLikescount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-like-sent')}}"><span><i class="fa-solid fa-check-double"></i></span> Like Request Sent <div class="note-count2">{{$sendLikescount}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span><i class="fa-solid fa-check-double"></i></span> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="my-profile tab-content">

                        <div class="tab-pane active show" id="tab-14">
                            <div class="heading">
                                <h2><strong>Request Mobile</strong> Number</h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="gallery4-wrapper">
                                <div class="row">
                                    @if(count($requestMobiles) > 0)
                                    @foreach($requestMobiles as $requestMobile)
                                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <h6 class="messageShow" style="color:green;"></h6>
                                        <div class="tab_image_wrapper">
                                            <div class="tab_image">
                                                <figure>
                                                    @if($requestMobile->profile_img)
                                                    <img src="{{ url('assets/images/profile_img'.'/'. $requestMobile->profile_img) }}" class="img-responsive" alt="profile-img">
                                                    @else
                                                    <img src="{{ asset('assets/images/no_image.jpg') }}" class="img-responsive" alt="footer-img">
                                                    @endif
                                                </figure>
                                            </div>
                                            <div class="tab_image_text">
                                                <div class="project_title">
                                                    <h4><a href="javascript:;">{{$requestMobile->name}}</a></h4>
                                                    <p> {{$requestMobile->city}}, {{$requestMobile->state}} </p>
                                                    <!-- <p> 85% Match </p> -->
                                                </div>

                                                <div class="req-btn-profile">
                                                    <ul class="media-list">
                                                        <div class="d-flex">
                                                            <li data-tooltip="Send Message"><a href="{{url('message').'/'.$requestMobile->user_ref}}"><i><img src="{{asset('assets/images/icon/send-message.png')}}" alt="send-message" /></i></a></li>
                                                            @if($requestMobile->request_mobile_status===1)
                                                            <button class="main-btn1 accept-request" data-reference="{{$requestMobile->id}}" id="{{$requestMobile->id}}">Accepted</button>
                                                            <button class="main-btn1 deny-request" data-reference="{{$requestMobile->id}}" id="{{$requestMobile->id}}">Deny</button>
                                                            @endif
                                                            @if($requestMobile->request_mobile_status===2)
                                                            <p>{{$requestMobile->mobile_no}}</p>
                                                            @endif
                                                        </div>
                                                    </ul>
                                                </div>
                                                <input type="text" class="user_id" value="{{Auth::user()->id}}" hidden>
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
                                {{ $requestMobiles->links('pagination::bootstrap-4') }}
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

<script>
    $(document).ready(function() {
        var id = $('.user_id').val();
        var url = '/api/mobile-request-notification-remove/' + id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function(data) {
                $('.MObileCountNot').css('background-color', 'white').show();
            }
        });
    });
</script>