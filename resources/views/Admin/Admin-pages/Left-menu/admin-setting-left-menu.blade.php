<div class="sidepannal">
    <div class="pannal-box mt-0">
        <h5>Manage Profile</h5>
        <div class="pannal-content">
            <ul class="nav nav-tabs profile-setting">
                <li class="nav-item"><a class="{{Route::currentRouteName()=='setting'? 'active':''}}"  href="{{url('admin/setting')}}"><span><i class="fa-solid fa-check-double"></i></span> Change Password</a></li>
                @if(Session::get('admin_employee') == 'super-admin')
                <li class="nav-item"><a class="{{Route::currentRouteName()=='all-admin'? 'active':''}}" href="{{url('admin/all-admin')}}"><span><i class="fa-solid fa-check-double"></i></span> All Admin</a></li>
                <li class="nav-item"><a class="{{Route::currentRouteName()=='block-admin'? 'active':''}}" href="{{url('admin/block-admin')}}"><span><i class="fa-solid fa-check-double"></i></span> All Block Admin</a></li>
                @endif
                <li class="nav-item"><a class="{{Route::currentRouteName()=='register'? 'active':''}}" href="{{url('admin/register')}}"><span><i class="fa-solid fa-check-double"></i></span> Register new Admin</a></li>
            </ul>
        </div>
    </div>
</div>