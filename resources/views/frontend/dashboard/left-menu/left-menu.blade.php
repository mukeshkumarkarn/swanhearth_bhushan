<div class="sidepannal">
    <div class="pannal-box mt-0">
        <h5>My Profile</h5>
        <div class="pannal-content">
            <ul class="nav nav-tabs profile-setting">
                <li class="nav-item"><a class="nav-link {{ $bookmarksCount > 0 ? 'note' : '' }} active show" data-toggle="tab" href="#tab-7"><span><i class="fa-solid fa-check-double"></i></span> My Bookmarks<div class="note-count2">{{$bookmarksCount}}</div></a></li>
                <li class="nav-item"><a class="nav-link " href="{{url('dashboard/friend-message')}}"><span><i class="fa-solid fa-check-double"></i></span>Friend Message </a></li>
            </ul>
        </div>
        <h5>Requests Received</h5>
        <div class="pannal-content">
            <ul class="nav nav-tabs profile-setting">
                <li class="nav-item"><a class="nav-link " href="{{url('dashboard/request-photo-recived')}}"><span><i class="fa-solid fa-check-double"></i></span> Photo Request Received</a></li>
                <li class="nav-item"><a class="nav-link {{ $requestMobilesCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-mobile-recived')}}"><span><i class="fa-solid fa-check-double"></i></span> Request Mobile number<div class="note-count2">{{$requestMobilesCount}}</div></a></li>
                <li class="nav-item"><a class="nav-link {{ $requestEmailsCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-email-recived')}}"><span><i class="fa-solid fa-check-double"></i></span> Email Request Received<div class="note-count2">{{$requestEmailsCount}}</div></a></li>
                <li class="nav-item"><a class="nav-link {{ $requestLikesCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-like-recived')}}"><span><i class="fa-solid fa-check-double"></i></span> Like Request Received<div class="note-count2">{{$requestLikesCount}}</div></a></li>
            </ul>
        </div>
        <h5>Requests Sent</h5>
        <div class="pannal-content">
            <ul class="nav nav-tabs profile-setting">
                <li class="nav-item"><a class="nav-link " href="{{url('dashboard/request-send-photo')}}"><span><i class="fa-solid fa-check-double"></i></span> Photo Request Sent</a></li>
                <li class="nav-item"><a class="nav-link {{ $sendMobileRequestsCount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-mobile-send')}}"><span><i class="fa-solid fa-check-double"></i></span> Request Sent Mobile number<div class="note-count2">{{$sendMobileRequestsCount}}</div></a></li>
                <li class="nav-item"><a class="nav-link {{ $sendEmailRequestsCont > 0 ? 'note' : '' }}" href="{{url('dashboard/request-email-send')}}"><span><i class="fa-solid fa-check-double"></i></span> Email Request Sent <div class="note-count2">{{$sendEmailRequestsCont}}</div></a></li>
                <li class="nav-item"><a class="nav-link {{ $sendLikescount > 0 ? 'note' : '' }}" href="{{url('dashboard/request-like-send')}}"><span><i class="fa-solid fa-check-double"></i></span> Like Request Sent <div class="note-count2">{{$sendLikescount}}</div></a></li>
                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><span><i class="fa-solid fa-check-double"></i></span> Logout</a></li>
            </ul>
        </div>
    </div>
</div>