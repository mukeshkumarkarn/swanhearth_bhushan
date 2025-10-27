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
                                    <p class="title">{{ $age }} years, {{ ucfirst(Auth::user()->gender) }}</p>
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
								
                                    <li class="nav-item"><a class="nav-link  {{ $countMessage > 0 ? 'note' : '' }}" href="{{url('dashboard/friend-message')}}"><span><i class="fa-solid fa-check-double"></i></span>Friend Message <div class="note-count2">{{$countMessage}}</div></a></li>


                                    <!-- <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-9"><span><i class="fa-solid fa-check-double"></i></span> Accepted Members</a></li> -->
                                    <!-- <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-10"><span><i class="fa-solid fa-check-double"></i></span> Sent Interests</a></li> -->
                                </ul>
                            </div>
                            <h5>Requests Received</h5>
                            <div class="pannal-content">
                                <ul class="nav nav-tabs profile-setting">
                                    <li class="nav-item"><a class="nav-link " href="{{url('dashboard/request-photo-received')}}"><span><i class="fa-solid fa-check-double"></i></span> Photo Request Received</a></li>
                                    <li class="nav-item"><a class="nav-link {{ $requestMobilesCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-mobile-received')}}"><span><i class="fa-solid fa-check-double"></i></span> Request Mobile number<div class="note-count2">{{$requestMobilesCount}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link {{ $requestEmailsCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-email-received')}}"><span><i class="fa-solid fa-check-double"></i></span> Email Request Received<div class="note-count2">{{$requestEmailsCount}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link {{ $requestLikesCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-like-received')}}"><span><i class="fa-solid fa-check-double"></i></span> Like Request Received<div class="note-count2">{{$requestLikesCount}}</div></a></li>
                                </ul>
                            </div>
                            <h5>Requests Sent</h5>
                            <div class="pannal-content">
							
                                <ul class="nav nav-tabs profile-setting">
                                    <li class="nav-item"><a class="nav-link {{ $sendphotoRequestsCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-sent-photo')}}"><span><i class="fa-solid fa-check-double"></i></span> Photo Request Sent <div class="note-count2">{{$sendphotoRequestsCount}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link {{ $sendMobileRequestsCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-mobile-sent')}}"><span><i class="fa-solid fa-check-double"></i></span> Request Sent Mobile number<div class="note-count2">{{$sendMobileRequestsCount}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link {{ $sendEmailRequestsCont > 0 ? 'note' : '' }}" href="{{url('dashboard/request-email-sent')}}"><span><i class="fa-solid fa-check-double"></i></span> Email Request Sent <div class="note-count2">{{$sendEmailRequestsCont}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link {{ $sendLikescount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-like-sent')}}"><span><i class="fa-solid fa-check-double"></i></span> Like Request Sent <div class="note-count2">{{$sendLikescount}}</div></a></li>
                                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span><i class="fa-solid fa-check-double"></i></span> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
