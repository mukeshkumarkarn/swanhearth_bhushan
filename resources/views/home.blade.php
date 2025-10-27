<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Milandeep dating</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content />
    <meta name="MobileOptimized" content="320" />
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="{{asset('assets/css/fonts.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-free-6.4.2-web/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />

    <!-- Bootstrap CDN JS Links -->

</head>

<body>

    <a href="javascript:;" id="back-to-top"><i class="fa fa-arrow-up"></i></a>
    <div id="header">
        <header class="w-100 float-start">
            <div class="main-header w-100 float-start mb-0 mt-5">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-6 p-0">
                            <div class="main-header-logo"> <a href="index.html"> <img src="{{asset('assets/images/inner-logo.png')}}" class="img-fluid" alt="logo"> </a> </div>
                        </div>
                        <div class="col-lg-10 col-6 p-0">
                            <div class="main-menu w-100 float-end">
                                <div class="overlay d-block d-lg-none"></div>
                                <ul class="float-end" id="cssmenu">
                                    <li class="d-block d-lg-none"> <a href="javascript:;" class="b-none"> <img src="{{asset('assets/images/inner-logo.png')}}" alt="logo"> </a> </li>
                                    <li><a href="{{('/')}}">Home</a></li>
                                    <li><a href="{{url('dating-advice')}}">Dating Advice </a></li>
                                    <li><a href="{{url('stories-dating')}}">Dating Stories </a></li>
                                    <li><a href="{{url('matchmaking')}}">Matchmaking </a></li>
                                    <li><a href="{{url('match-calculator')}}">Match Calculator </a></li>
                                    <li><a href="{{url('membership')}}">Membership </a></li>
                                    <li><a href="dashboard">Dashboard</a></li>
                                    <li><a href="matches">Matches</a></li>
                                    <li><a href="{{url('settings')}}">Settings </a></li>
                                </ul>
                                <div class="main-btn float-end">
                                    <div class="menubtn-3">
                                        <div class="dropdown-container">
                                            <details class="dropdown right">
                                                <summary class="avatar">
                                                    <img src="{{asset('assets/images/community-img6.jpg')}}" alt="usr">
                                                </summary>
                                                <ul>
                                                    <li>
                                                        <p><span class="bold">{{ Auth::user()->name }}</span></p>
                                                        <p><span class="block italic">{{ Auth::user()->email }}</span></p>
                                                    </li>
                                                    <!-- Menu links -->
                                                    <li><a href="#">Account</a></li>
                                                    <li><a href="#">Settings</a></li>
                                                    <li><a href="#">Help</a></li>
                                                    <li>
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                                            Logout
                                                        </a>
                                                    </li>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>

                                                </ul>
                                            </details>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobToggle d-flex d-lg-none">
                                    <div class="toggle-btn">
                                        <div class="icon-left"></div>
                                        <div class="icon-right"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="shadow-img"> </div>
        </header>
    </div>
    <div class="main-innerpage w-100 float-start">
        <div class="container">
            <div class="innerpages">
                <h2>Dashboard</h2>
                <span><a href="{{('/')}}"> Home </a> &gt; <span class="font-color-pink">Dashboard</span></span>
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
                                    <img src="{{asset('assets/images/community-img6.jpg')}}" alt="profile-pic" class="profile-pic">
                                </div>
                                <div id="lower-bg">
                                    <div class="text">
                                        <p class="name">{{ Auth::user()->name }}</p>
                                        <p class="title">33 year old Woman</p>
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
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-1"><span><i class="fa-solid fa-check-double"></i></span> My Bookmarks</a></li>
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-2"><span><i class="fa-solid fa-check-double"></i></span> Who is interested in me</a></li>
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-3"><span><i class="fa-solid fa-check-double"></i></span> Accepted Members</a></li>
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-3"><span><i class="fa-solid fa-check-double"></i></span> Sent Interests</a></li>
                                    </ul>
                                </div>

                                <h5>Requests</h5>
                                <div class="pannal-content">
                                    <ul class="nav nav-tabs profile-setting">
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-1"><span><i class="fa-solid fa-check-double"></i></span> Photo Request Sent</a></li>
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-2"><span><i class="fa-solid fa-check-double"></i></span> Photo Request Received</a></li>
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-3"><span><i class="fa-solid fa-check-double"></i></span> Mobile Request Sent</a></li>
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-3"><span><i class="fa-solid fa-check-double"></i></span> Mobile Request Received</a></li>
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-3"><span><i class="fa-solid fa-check-double"></i></span> Email Request Sent</a></li>
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-3"><span><i class="fa-solid fa-check-double"></i></span> Email Request Received</a></li>
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-1"><span><i class="fa-solid fa-check-double"></i></span> Message</a></li>
                                        <li class="nav-item"><a class="nav-link " data-toggle="tab" href="#tab-7"><span><i class="fa-solid fa-check-double"></i></span>Logout</a></li>
                                    </ul>
                                </div>





                            </div>

                        </div>
                    </div>
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="community-page">
                            <div class="main-members-section mt-0">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="members-box">
                                            <div class="members-img">
                                                <img src="{{asset('assets/images/community-img1.jpg')}}" alt="community-img1" class="img-fluid">
                                                <span class="profile-status off"><i class="far fa-clock"></i> Active 10 days
                                                    ago</span>
                                                <span class="age">33 year old Man</span>
                                            </div>
                                            <div class="members-text">
                                                <a href="#">
                                                    <h6>Abhishek Kumar</h6>
                                                </a>
                                                <span><i class="fas fa-map-marker-alt"></i> Muzaffarpur, India</span>
                                                <a href="javascript:;" class="font-color-pink w-100 d-inline-block">85% Match</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="members-box">
                                            <div class="members-img">
                                                <img src="{{asset('assets/images/community-img1.jpg')}}" alt="community-img1" class="img-fluid">
                                                <span class="profile-status off"><i class="far fa-clock"></i> Active 10 days
                                                    ago</span>
                                                <span class="age">33 year old Man</span>
                                            </div>
                                            <div class="members-text">
                                                <a href="#">
                                                    <h6>Abhishek Kumar</h6>
                                                </a>
                                                <span><i class="fas fa-map-marker-alt"></i> Muzaffarpur, India</span>
                                                <a href="javascript:;" class="font-color-pink w-100 d-inline-block">85% Match</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="members-box">
                                            <div class="members-img">
                                                <img src="{{asset('assets/images/community-img1.jpg')}}" alt="community-img1" class="img-fluid">
                                                <span class="profile-status off"><i class="far fa-clock"></i> Active 10 days
                                                    ago</span>
                                                <span class="age">33 year old Man</span>
                                            </div>
                                            <div class="members-text">
                                                <a href="#">
                                                    <h6>Abhishek Kumar</h6>
                                                </a>
                                                <span><i class="fas fa-map-marker-alt"></i> Muzaffarpur, India</span>
                                                <a href="javascript:;" class="font-color-pink w-100 d-inline-block">85% Match</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                        <div class="members-box">
                                            <div class="members-img">
                                                <img src="{{asset('assets/images/community-img1.jpg')}}" alt="community-img1" class="img-fluid">
                                                <span class="profile-status off"><i class="far fa-clock"></i> Active 10 days
                                                    ago</span>
                                                <span class="age">33 year old Man</span>
                                            </div>
                                            <div class="members-text">
                                                <a href="#">
                                                    <h6>Abhishek Kumar</h6>
                                                </a>
                                                <span><i class="fas fa-map-marker-alt"></i> Muzaffarpur, India</span>
                                                <a href="javascript:;" class="font-color-pink w-100 d-inline-block">85% Match</a>
                                            </div>
                                        </div>
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
    @include('frontend.bin.footer')