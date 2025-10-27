@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Update Register Data</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Register New User</span></span>
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
                        <div class="tab-pane active show" id="tab-2">
                            <div class="heading">
                                <h2><strong>Update</strong> Data </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="input-info-box">
                                <div class="content">
                                    @if(session('success'))
                                    <h5 class="errorsal w-100" style="color:green;">
                                        {{ session('success') }}
                                    </h5>
                                    @endif

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <form method="POST" action="{{ url('admin-register-update') }}" enctype=multipart/form-data>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>First Name</label>
                                                    <input type="text" placeholder="First name" class="first-name" name="first_name" value="{{$data->first_name}}">
                                                    <h6 class="firstNameError error"></h6>
                                                </div>
                                            </div>
                                            <input type="text" name="emp_ref" value="{{$data->emp_ref}}" hidden>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Last Name</label>
                                                    <input type="text" placeholder="Last name" name="last_name" class="last-name" value="{{$data->last_name}}">
                                                    <h6 class="lastNameError error"></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-input">
                                                    <div class="custum-select">
                                                        <label>Gender</label>
                                                        <select name="gender" class="input gender" id="selEducation">
                                                            <option value="">select gender</option>
                                                            @php
                                                            $gender = $data->gender;
                                                            @endphp
                                                            <option value="male" {{$gender == 'male' ? 'selected' : ''}}>Male</option>
                                                            <option value="female" {{$gender == 'female' ? 'selected' : ''}}>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="genderError error"></h6>

                                            @if(Session::get('admin_employee') == 'super-admin')
                                            <div class="col-md-12">
                                                <div class="form-input">
                                                    <div class="custum-select">
                                                        <label>Role</label>
                                                        <select name="admin_employee" class="input admin_employee" id="selEducation">
                                                            <option value="">select Role</option>
                                                            @php
                                                            $admin_employee = $data->admin_employee;
                                                            @endphp
                                                            <option value="Admin" {{$admin_employee == 'Admin' ? 'selected' : ''}}>Admin</option>
                                                            <option value="super-admin" {{$admin_employee == 'super-admin' ? 'selected' : ''}}>Super Admin</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif

                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Email</label>
                                                    <input type="text" placeholder="Email" class="Adminemail" name="email" value="{{$data->email}}">
                                                    <h6 class="AdminEmailError error"></h6>
                                                </div>
                                            </div>


                                            <input type="text" name="parentId" value="{{Session::get('id')}}" hidden>

                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Profile img</label>
                                                    <input type="file" placeholder="profile_img" class="" name="profile_img">
                                                    @if($data->avatar)
                                                    <a href="{{url('assets/images/Admin-profile-img').'/'.$data->avatar}}" target="_blank" rel="noopener noreferrer">
                                                        Profile Image
                                                    </a>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="buttons mt-4">
                                                <a class="main-btn" href="{{url('admin/all-admin')}}">Back</a>
                                                <button type="button" class="main-btn AdminRegiterCheck-update">Update</button>
                                                <button type="submit" class="main-btn AdminRegiterSubmit-update" hidden>submit</button>
                                            </div>
                                        </div>
                                    </form>
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
<script src="{{asset('assets/js/Admin-js/edit-Admin-register.js')}}"></script>
