@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Admin</h2>
            <span><a href=""> Home </a> &gt; <span class="font-color-pink">Admin</span></span>
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
                                <h2>All <strong>Admin</strong> </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            @if(session('success'))
                            <h5 class="errorsal w-100 error">
                                {{ session('success') }}
                            </h5>
                            @endif
                            <div class="content">
                                <div class="row">
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
                                                <h4><a href="{{url('admin/edit-register') . '/' .$datas->emp_ref}}">{{$datas->first_name}} {{$datas->last_name}}
                                                        <a data-bs-toggle="modal" data-Adminref="{{$datas->id}}" data-bs-target="#staticBackdrop" class="AdminIdget" title="chnage password"><i class="fa-regular fa-pen-to-square"></i></a>
                                                    </a>
                                                </h4>
                                                @php
                                                $dateString = $datas->updated_at;
                                                $formattedDate = date('j F Y', strtotime($dateString));
                                                @endphp
                                                <span>{{$formattedDate}}</span>
                                            </div>
                                            <div class="request-btn">
                                                <a href="{{url('super-admin-block') . '/' .$datas->emp_ref}}" class="main-btn">Block</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="d-flex justify-content-center">
                                        {{ $data->links('pagination::bootstrap-4') }}
                                    </div>

                                    <!-- Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Admin Change Password</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-left">
                                                    <div class="input-info-box">
                                                        <div class="content">
                                                            <div class="row">
                                                                <h6 class="message" style="color:green;"></h6>
                                                                <div class="col-md-12">
                                                                    <div class="my-input-box">
                                                                        <label>Password</label>
                                                                        <input type="password" placeholder="password" class="adminPassrds">
                                                                        <h6 class="adminPassrdError error"></h6>
                                                                    </div>
                                                                </div>
                                                                <input type="" placeholder="" class="getid" hidden>

                                                                <div class="col-md-12">
                                                                    <div class="my-input-box">
                                                                        <label>Confirm Password</label>
                                                                        <input type="password" placeholder="confirm password" class="adminPassdConf">
                                                                        <h6 class="adminPassdConfError error"></h6>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="main-btn" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="main-btn AdminChangePassword">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->

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