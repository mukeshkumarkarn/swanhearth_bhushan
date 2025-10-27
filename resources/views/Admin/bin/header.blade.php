<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{$dynamicMeta->title}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="{{$dynamicMeta->description}}" />
    <meta name="keywords" content="{{$dynamicMeta->title}}" />
    <meta name="author" content />
    <meta name="MobileOptimized" content="320" />
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fonts.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-free-6.4.2-web/css/all.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/swiper.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/jquery.fancybox.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/mycss.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}" />
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
                                    <li><a href="{{url('admin/all-users')}}">Home </a></li>
                                    <li><a href="{{url('admin/view-dynamic-meta')}}">Dynamic Meta </a></li>
                                    <li><a href="{{url('admin/setting')}}">Settings </a></li>
                                </ul>
                                <div class="main-btn float-end">
                                    <div class="menubtn-3">
                                        <div class="dropdown-container">
                                            <details class="dropdown right">
                                                <summary class="avatar">
                                                    @if(Session::get('avatar'))
                                                    <img src="{{ asset('assets/images/Admin-profile-img/' . Session::get('avatar')) }}" alt="footer-img">
                                                    @else
                                                    <img src="{{ asset('assets/images/no_image.jpg') }}" alt="footer-img" style="width: 60px;">
                                                    @endif
                                                </summary>
                                                <ul>
                                                    <li>
                                                        <p><span class="bold">{{ Session::get('first_name') }}</span></p>
                                                        <p><span class="block italic">{{ Session::get('email') }}</span></p>
                                                    </li>
                                                    <!-- Menu links -->
                                                    <li><a href="#">Account</a></li>
                                                    <li><a href="{{url('admin/setting')}}">Settings</a></li>
                                                    <li><a href="{{url('admin-logout')}}">Logout</a></li>
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