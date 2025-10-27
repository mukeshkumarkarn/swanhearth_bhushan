<div class="col-lg-4 col-md-12 col-12">
    <div id="algn">
        <div id="card">
            <div id="upper-bg">
                @if(Auth::user()->profile_img)
                <img src="{{ url('assets/images/profile_img'.'/'. Auth::user()->profile_img) }}" alt="profile-pic" class="profile-pic">
                @elseif(Auth::user()->gender == 'male')
                <img src="{{ asset('assets/images/profile_img/' . env('MALE')) }}" alt="footer-img" class="profile-pic">
                @else
                <img src="{{ asset('assets/images/profile_img/' . env('FEMALE')) }}" alt="footer-img" class="profile-pic">
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
                    <p class="title">{{ $age }} year, {{ Auth::user()->gender }}</p>
                    @endif
                    <p><i class="fas fa-map-marker-alt"></i> {{ Auth::user()->city }}, {{ Auth::user()->state }}, {{ Auth::user()->country }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="sidepannal">
        <div class="pannal-box mt-0">
            <h5>Manage Profile</h5>
            <div class="pannal-content">
                <ul class="nav nav-tabs profile-setting">
                    <li class="nav-item"><a class="nav-link {{Route::currentRouteName()=='settings'? 'active':''}}" href="{{url('settings')}}"><span><i class="fa-solid fa-check-double"></i></span> Update Profile</a></li>
                    <li class="nav-item"><a class="nav-link {{Route::currentRouteName()=='personal-details'? 'active':''}}" href="{{url('settings/personal-details')}}"><span><i class="fa-solid fa-check-double"></i></span> Personal Details</a></li>
                    <li class="nav-item"><a class="nav-link {{Route::currentRouteName()=='professional-details'? 'active':''}}" href="{{url('settings/professional-details')}}"><span><i class="fa-solid fa-check-double"></i></span> Professional details </a></li>
                    <li class="nav-item"><a class="nav-link {{Route::currentRouteName()=='preferred-match'? 'active':''}}" href="{{url('settings/preferred-match')}}"><span><i class="fa-solid fa-check-double"></i></span> Preferred Match</a></li>
                    <li class="nav-item"><a class="nav-link {{Route::currentRouteName()=='album'? 'active':''}}" href="{{url('settings/album')}}"><span><i class="fa-solid fa-check-double"></i></span> Image Gallery</a></li>
                    <li class="nav-item"><a class="nav-link {{Route::currentRouteName()=='change-password'? 'active':''}}" href="{{url('settings/change-password')}}"><span><i class="fa-solid fa-check-double"></i></span> Change Password</a></li>
					<li class="nav-item"><a class="nav-link {{Route::currentRouteName()=='permission-manage'? 'active':''}}" href="{{url('settings/permission-manage')}}"><span><i class="fa-solid fa-check-double"></i></span> Manage Permission </a></li>
                    <li class="nav-item"><a class="nav-link {{Route::currentRouteName()=='delete-account'? 'active':''}}" href="{{url('settings/delete-account')}}"><span><i class="fa-solid fa-check-double"></i></span>Delete Account</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>