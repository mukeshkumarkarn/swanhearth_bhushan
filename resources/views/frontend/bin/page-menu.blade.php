@if(Auth::check() == false)
<div class="main-menu w-100 float-end">
    <div class="overlay d-block d-lg-none"></div>
    <ul class="float-end" id="cssmenu">
        <li class="d-block d-lg-none"> <a href="javascript:;" class="b-none logo-re"> <img src="{{asset('assets/images//inner-logo.png')}}" alt="logo"> </a> </li>
        <li><a href="{{('/')}}">Home</a></li>
		<li><a href="{{url('love-calculator')}}">Love Calculator </a></li>
        <li><a href="{{url('dating-advice')}}">Dating Advice </a></li>
        <li><a href="{{url('dating-stories')}}">Dating Stories </a></li>
        <!--<li><a href="{{url('matchmaking')}}">Matchmaking </a></li>-->
        
        <li><a href="{{url('membership')}}">Membership </a></li>
        <li><a href="{{url('contact-us')}}">Contact Us </a></li>
        <li class="d-block d-lg-none"><a href="{{url('login')}}">Login / Register</a></li>
    </ul>
    <div class="main-btn float-end d-none d-lg-block">
        <div class="menubtn-3"> <a href="{{url('login')}}">Login</a> / <a href="{{url('sign-up')}}">Register</a> </div>
    </div>
    <div class="mobToggle d-flex d-lg-none">
        <div class="toggle-btn">
            <div class="icon-left"></div>
            <div class="icon-right"></div>
        </div>
    </div>
</div>
@else
<div class="main-menu w-100 float-end">
    <div class="overlay d-block d-lg-none"></div>
    <ul class="float-end" id="cssmenu">
        <li class="d-block d-lg-none"> <a href="javascript:;" class="b-none logo-re"> <img src="{{asset('assets/images/inner-logo.png')}}" alt="logo"> </a> </li>
        <li><a href="{{('/')}}">Home</a></li>
		<li><a href="{{url('matches')}}">Matches</a></li>
		<li><a href="{{url('dashboard')}}" class="note">Dashboard<div class="note-count2 totalNotification"></div></a></li>
		<li><a href="{{url('love-calculator')}}">Love Calculator</a></li>
        <li><a href="{{url('dating-advice')}}">Dating Advice </a></li>
        <li><a href="{{url('dating-stories')}}">Dating Stories </a></li>
        <!--<li><a href="{{url('matchmaking')}}">Matchmaking </a></li>-->
        
        <li><a href="{{url('membership')}}">Membership </a></li>
        
        
        <li><a href="{{url('settings')}}">Settings </a></li>
        <!-- <li><a href="{{url('dashboard/friend-message')}}" class="note">Message<div class="note-count2 totalNotification"></div></a></li> -->

        <input type="text" value="{{ Auth::user()->id }}" class="id" hidden>
    </ul>
    <div class="main-btn float-end">
        <div class="menubtn-3">
            <div class="dropdown-container">
                <details class="dropdown right">
                    <summary class="avatar">
                        @if(Auth::user()->profile_img)
                        <img src="{{ asset('assets/images/profile_img/' . Auth::user()->profile_img) }}" alt="footer-img">
                        @else
                        @if(Auth::user()->gender == 'male')
                        <img src="{{ asset('assets/images/profile_img/' . env('MALE')) }}" alt="footer-img">
                        @else
                        <img src="{{ asset('assets/images/profile_img/' . env('FEMALE')) }}" alt="footer-img">
                        @endif
                        @endif

                    </summary>
                    <ul>
                        <li>
                            <p><span class="bold">{{ Auth::user()->name }}</span></p>
                            <p><span class="block italic">{{ Auth::user()->email }}</span></p>
                        </li>
                        <!-- Menu links -->
                        <li><a href="{{url('account')}}">Account</a></li>
                        <li><a href="{{url('settings')}}">Settings</a></li>
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
@endif