<div class="col-lg-4 col-md-12 col-12">
    <div class="sidepannal">
        <div class="pannal-box mt-0">
            <h5>Manage Profile</h5>
            <div class="pannal-content">
                <ul class="nav nav-tabs profile-setting">
                    <li class="nav-item"><a class="{{Route::currentRouteName()=='all-users'? 'active':''}}" href="{{url('admin/all-users')}}"><span><i class="fa-solid fa-check-double"></i></span> Show users</a></li>
                    <li class="nav-item"><a class="{{Route::currentRouteName()=='block-users'? 'active':''}}" href="{{url('admin/block-users')}}"><span><i class="fa-solid fa-check-double"></i></span> Block users</a></li>
                    <li class="nav-item"><a class="{{Route::currentRouteName()=='dating-advice'? 'active':''}}" href="{{url('admin/dating-advice')}}"><span><i class="fa-solid fa-check-double"></i></span>Dating Advice </a></li>
                    <li class="nav-item"><a class="{{Route::currentRouteName()=='dating-stories'? 'active':''}}" href="{{url('admin/dating-stories')}}"><span><i class="fa-solid fa-check-double"></i></span>Dating Stories </a></li>
                    <li class="nav-item"><a class="{{Route::currentRouteName()=='poll-question'? 'active':''}}" href="{{url('admin/poll-question')}}"><span><i class="fa-solid fa-check-double"></i></span>Poll Questions</a></li>
                    @if(Session::get('admin_employee') == 'super-admin')
                    <li class="nav-item"><a class="{{Route::currentRouteName()=='view-contact'? 'active':''}}" href="{{url('admin/view-contact')}}"><span><i class="fa-solid fa-check-double"></i></span>View Contact</a></li>
                    <li class="nav-item"><a class="{{Route::currentRouteName()=='membership-show'? 'active':''}}" href="{{url('admin/membership-show')}}"><span><i class="fa-solid fa-check-double"></i></span>View Membership Show</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>