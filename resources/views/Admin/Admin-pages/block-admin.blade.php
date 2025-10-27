@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>All Block Admin</h2>
            <span><a href=""> Home </a> &gt; <span class="font-color-pink">All Block Admin</span></span>
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
                            <img src="{{ asset('assets/images/Admin-profile-img/' . Session::get('avatar')) }}" alt="profile-pic" class="profile-pic" style="width: 100px;">
                            </div>
                            <div id="lower-bg">
                                <div class="text">
                                    <p class="name">{{ Session::get('first_name') }}</p>
                                    <p class="name">{{ Session::get('email') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('Admin.Admin-pages.Left-menu.admin-setting-left-menu')
                </div>
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="my-profile tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="heading">
                                <h2>All <strong>Block Admin</strong> </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            @if(session('success'))
                            <h5 class="errorsal w-100 error">
                                {{ session('success') }}
                            </h5>
                            @endif
                            <div class="content">
                                <div class="row">
                                @if(count($data) > 0)
                                    @foreach($data as $datas)
                                    <div class="col-md-12">
                                        <div class="friends-box">
                                            <div class="friends-img">
                                                @if($datas->avatar)
                                                <img src="{{ url('assets/images/Admin-profile-img'.'/'. $datas->avatar) }}" alt="profile-img" style="width: 60px;">
                                                @else
                                                <img src="{{ asset('assets/images/no_image.jpg') }}" alt="footer-img">
                                                @endif
                                            </div>
                                            <div class="friend-name">
                                                <h4> <a href="#">{{$datas->first_name}} {{$datas->last_name}}</a></h4>
                                                @php
                                                $dateString = $datas->updated_at;
                                                $formattedDate = date('j F Y', strtotime($dateString));
                                                @endphp
                                                <span>{{$formattedDate}}</span>
                                            </div>
                                            <div class="request-btn">
                                                <a href="{{url('super-admin-unblock') . '/' .$datas->emp_ref}}" class="main-btn">Unblock</a>
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

                                    <div class="d-flex justify-content-center">
                                        {{ $data->links('pagination::bootstrap-4') }}
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