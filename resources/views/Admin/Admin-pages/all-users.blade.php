@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>All Users</h2>
            <span><a href=""> Home </a> &gt; <span class="font-color-pink">All Users</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage ">
    <div class="blog-page pt-5 pb-5 w-100 float-start">
        <div class="container">
            <div class="row">
                @include('Admin.Admin-pages.Left-menu.admin-main-left-menu')
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="my-profile tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="heading">
                                <h2>All <strong>Users</strong> </h2>
                                <input type="text" class="search-user" placeholder="name search">
                                <button class="main-btn search-user-button" type="button">search</button>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            @if(session('success'))
                            <h5 class="errorsal w-100 error">
                                {{ session('success') }}
                            </h5>
                            @endif
                            <div class="content">
                                <div class="row userdata">
                                    @foreach($data as $datas)
                                    <div class="col-md-12">
                                        <div class="friends-box">
                                            <div class="friends-img">
                                                @if($datas->profile_img)
                                                <img src="{{ url('assets/images/profile_img'.'/'. $datas->profile_img) }}" alt="profile-img" style="width: 60px;">
                                                @else
                                                @if($datas->gender == 'male')
                                                <img src="{{ asset('assets/images/profile_img/' . env('MALE')) }}" alt="single-product1" style="width: 60px;" class="img-fluid">
                                                @else
                                                <img src="{{ asset('assets/images/profile_img/' . env('FEMALE')) }}" alt="single-product1" style="width: 60px;" class="img-fluid">
                                                @endif
                                                @endif
                                            </div>
                                            <div class="friend-name">
                                                <h4> <a href="{{url('admin/user-details') . '/' .$datas->user_ref}}">{{$datas->name}}</a></h4>
                                                @php
                                                $dateString = $datas->updated_at;
                                                $formattedDate = date('j F Y', strtotime($dateString));
                                                @endphp
                                                <span>{{$formattedDate}}</span>
                                            </div>
                                            <div class="request-btn">
                                                <a href="{{url('admin-delete') . '/' .$datas->user_ref}}" class="main-btn">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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