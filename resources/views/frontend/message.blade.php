@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2> Message</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink"> Message</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage ">
    <div class="main-chat-box w-100 float-start">
        <div class="container">
            <div class="chat-box">
                <div class="top-bar">
                    <div class="left"> <a href="{{url('dashboard/friend-message')}}" class=""><i class="fas fa-chevron-left"></i></a>
                        <div class="chat-search">
                            <input type="text" name="search" id="search" placeholder="Search......">
                            <label for="search"><i class="fas fa-search"></i></label>
                        </div>
                    </div>
                    <div class="right"> <a href="javascript:;"><i class="fas fa-edit"></i></a> <a href="javascript:;"><i class="fas fa-sliders-h"></i></a> </div>
                </div>
                <div class="main-chat">
                    <div class="chat-tab">
                        <ul class="nav nav-tabs chat-list">
                            @if($otheruserid && $otheruserid->name)
                            <li class="nav-item">
                                <a class="nav-link active show" data-toggle="tab" href="#tab-1">
                                    <div class="profile-avtar active">
                                        @if($otheruserid->profile_img)
                                        <img src="{{ url('assets/images/profile_img'.'/'. $otheruserid->profile_img) }}" class="img-fluid" alt="profile-img">
                                        @else
                                        <img src="{{ asset('assets/images/no_image.jpg') }}" class="img-fluid" alt="footer-img">
                                        @endif
                                    </div>
                                    <div class="right-info">
                                        <h4 class="profile-name"> {{$otheruserid->name}} </h4>
                                        <p class="msg-chat">{{$otheruserid->about_me}}</p>
                                    </div>
                                </a>
                            </li>
                            @else
                            <li class="nav-item"> <a class="nav-link " data-toggle="tab" href="#tab-2">
                                    <div class="profile-avtar"> <img src="{{asset('assets/images/avatar2.png')}}" alt="avtar2" class="img-fluid"> </div>
                                    <div class="right-info">
                                        <h4 class="profile-name"> Sandhya Gupta </h4>
                                        <p class="msg-chat">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                    </div>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                    <div class="msger tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <main class="msger-chat realchart">
                                @foreach($message as $message)
                                <div class="msg {{ $message->user_id == Auth::user()->id ? 'right-msg' : 'left-msg' }}">
                                    <div class="msg-info-time">
                                        @if(date('Y-m-d', strtotime($message->message_time)) === date('Y-m-d'))
                                        {{ date('H:i', strtotime($message->message_time)) }}
                                        @else
                                        {{ $message->message_time }}
                                        @endif
                                    </div>
                                    <div class="msg-img">
                                        <img src="{{ asset($message->user_id == Auth::user()->id ? 'assets/images/profile_img/' . Auth::user()->profile_img : 'assets/images/profile_img/' . $message->other_person_profile_img) }}" alt="avatar" class="img-fluid chatImg">
                                    </div>

                                    <div class="msg-bubble">
                                        <div class="msg-text">{{ $message->message }}</div>
                                    </div>
                                </div>
                                @endforeach
                            </main>
                            <!-- <form>
                                <div class="msger-inputarea">
                                    <span><i class="fas fa-image"></i></span>
                                    <input type="text" class="otheruserid" name="otheruserid" value="{{$otheruserid->id}}" hidden>
                                    <input type="text" class="user_id" name="user_id" value="{{Auth::user()->id}}" hidden>
                                    <input type="text" class="msger-input message" placeholder="Message..." name="message">
                                    <button type="button" class="msger-send-btn send-message"><i class="fas fa-paper-plane"></i></button>
                                </div>
                            </form> -->
                            <form>
                                <div class="msger-inputarea">
                                    <span><i class="fas fa-image"></i></span>
                                    <input type="text" class="otheruserid" name="otheruserid" value="{{$otheruserid->id}}" hidden>
                                    <input type="text" class="user_id" name="user_id" value="{{Auth::user()->id}}" hidden>
                                    <input type="text" class="msger-input message" placeholder="Message..." name="message" @if($payments->where('status', 1)->count() == 1) disabled @endif>
                                    @if($payments->where('status', 1)->count() == 1)
                                    <p><a href="{{url('membership')}}" class="fs-title">Please recharge to send messages.</a></p>
                                    @endif
                                    <button type="button" class="msger-send-btn send-message" @if($payments->where('status', 1)->count() == 1) disabled @endif><i class="fas fa-paper-plane"></i></button>
                                </div>
                            </form>

                            <h6 class="send-messageError error"></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')
<script src="{{asset('assets/js/send-message.js')}}"></script>
