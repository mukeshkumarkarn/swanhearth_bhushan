@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Dashboard</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">dashboard</span></span>
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
                        <div class="tab-pane active show" id="tab-7">
                            <div class="heading">
                                <h2><strong>Book</strong>marks</h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="gallery4-wrapper">
                                <div class="row">
                                    @if(count($bookmarks) > 0)
                                    @foreach($bookmarks as $data)
                                    <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12">
                                        <div class="tab_image_wrapper">
                                            <div class="tab_image">
                                                <figure>
                                                    @if($data->profile_img)
                                                    <img src="{{ url('assets/images/profile_img'.'/'. $data->profile_img) }}" class="img-responsive" alt="profile-img">
                                                    @else
                                                    <img src="{{ asset('assets/images/no_image.jpg') }}" class="img-responsive" alt="footer-img">
                                                    @endif
                                                </figure>
                                            </div>
                                            <div class="tab_image_text">
                                                <div class="project_title">
                                                    <h4><a href="javascript:;">{{$data->name}}</a></h4>
                                                    <p> {{$data->state}}, {{$data->city}} </p>
                                                    <!-- <p> 85% Match </p> -->
                                                </div>

                                                <h6 class="messageShow" style="color: green;"></h6>
                                                <div class="req-btn-profile">
                                                    <ul class="media-list">
                                                        <li data-tooltip="Send Message"><a href="{{url('message').'/'.$data->user_ref}}"><i><img src="{{asset('assets/images/icon/send-message.png')}}" alt="send-message" /></i></a></li>

                                                        <!-- like Button -->
                                                        @if($data->like === 'like')
                                                        <li data-tooltip="Like" class="user-dislike userlike" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Like.png')}}" style="filter: hue-rotate(120deg);" alt="Like" /></i></a></li>
                                                        @else
                                                        <li data-tooltip="Like" class="userlike user-like" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Like.png')}}" alt="Like" /></i></a></li>
                                                        @endif

                                                        <!-- Bookmark Button -->
                                                        @if($data->bookmark === 'bookmark')
                                                        <li data-tooltip="Bookmark" class="cancle-Bookmark userBook" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/bookmark.png')}}" style="filter: hue-rotate(120deg);" alt="Bookmark" /></i></a></li>
                                                        @else
                                                        <li data-tooltip="Bookmark" class="Bookmark userBook" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/bookmark.png')}}" alt="Bookmark" /></i></a></li>
                                                        @endif

                                                        <!-- Request Mobile Button -->
                                                        @if($data->request_mobile === 'request-mobile')
                                                        <li data-tooltip="Request Mob no." class="cancle-request-mobile RequestMobile" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Mobile.png')}}" style="filter: hue-rotate(120deg);" alt="Request Mobile" /></i></a></li>
                                                        @else
                                                        <li data-tooltip="Request Mob no." class="request-mobile RequestMobile" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Mobile.png')}}" alt="Request Mobile" /></i></a></li>
                                                        @endif

                                                        <!-- Request email Button -->
                                                        @if($data->request_email === 'request-email')
                                                        <li data-tooltip="Request Email" class="cancle-request-email RequestEmail" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Email.png')}}" style="filter: hue-rotate(120deg);" alt="Request Email" /></i></a></li>
                                                        @else
                                                        <li data-tooltip="Request Email" class="request-email RequestEmail" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/Request-Email.png')}}" alt="Request Email" /></i></a></li>
                                                        @endif

                                                        <!-- block Button -->
                                                        @if($data->block === 'block')
                                                        <li data-tooltip="Block" class="unblock requestBlock" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/userBlock.png')}}" style="filter: hue-rotate(120deg);" alt="Block" /></i></a></li>
                                                        @else
                                                        <li data-tooltip="Block" class="block requestBlock" data-reference="{{$data->user_ref}}" id="{{$data->id}}"><a><i><img src="{{asset('assets/images/icon/userBlock.png')}}" alt="Block" /></i></a></li>
                                                        @endif
                                                    </ul>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    @endforeach()
                                    @else
                                    <div class="col-lg-12 NoData">
                                        <h4><span class="alert-icon"><i class="fas fa-bullhorn "></i></span>
                                            No record found.
                                        </h4>
                                    </div>
                                    @endif
                                </div>
                                <input type="text" value="{{Auth::user()->id}}" class="user_id" hidden>
                            </div>
                            <div class="d-flex justify-content-center">
                                {{ $bookmarks->links('pagination::bootstrap-4') }}
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