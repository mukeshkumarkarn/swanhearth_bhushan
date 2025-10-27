@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Personal Details</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">personal details</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage ">
    <div class="blog-page pt-5 pb-5 w-100 float-start">
        <div class="container">
            <div class="row">
            @include('frontend.Account.left-menu')
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="my-profile tab-content">
                        <div class="tab-pane active show" id="tab-3">
                            <div class="heading">
                                <h2><strong>Personal</strong> Details</h2>
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
                                    <form method="POST" action="{{ url('user-personal-update') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>About me</label>
                                                    <textarea placeholder="Description" name="about_me">{{ Auth::user()->about_me }}</textarea>
                                                </div>
                                            </div>
										
                                            <div class="my-input-box">
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="my-input-box">
                                                            <label>Height</label>
                                                        </div>
                                                        <div class=" col-md-6">
                                                            <div class="my-input-box"> <span>Feet</span>
                                                                <div class="custum-select">
                                                                    <select name="heigh_feet" class="combo">
                                                                        @php
                                                                        $feet = Auth::user()->heigh_feet;
                                                                        @endphp
                                                                        <option value="">select</option>
                                                                        <option value="3" {{$feet == '3' ? 'selected' : ''}}>3</option>
                                                                        <option value="4" {{$feet == '4' ? 'selected' : ''}}>4</option>
                                                                        <option value="5" {{$feet == '5' ? 'selected' : ''}}>5</option>
                                                                        <option value="6" {{$feet == '6' ? 'selected' : ''}}>6</option>
                                                                        <option value="7" {{$feet == '7' ? 'selected' : ''}}>7</option>
                                                                        <option value="8" {{$feet == '8' ? 'selected' : ''}}>8</option>
                                                                        <option value="9" {{$feet == '9' ? 'selected' : ''}}>9</option>
                                                                        <option value="10" {{$feet == '10' ? 'selected' : ''}}>10</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class=" col-md-6">
                                                            <div class="my-input-box"> <span>Inch</span>
                                                                <div class="custum-select">
                                                                    <select name="heigh_inch" class="combo">
                                                                        @php
                                                                        $inch = Auth::user()->heigh_inch;
                                                                        @endphp
                                                                        <option value="">select</option>
                                                                        <option value="1" {{$inch == '1' ? 'selected' : ''}}>1</option>
                                                                        <option value="2" {{$inch == '2' ? 'selected' : ''}}>2</option>
                                                                        <option value="3" {{$inch == '3' ? 'selected' : ''}}>3</option>
                                                                        <option value="4" {{$inch == '4' ? 'selected' : ''}}>4</option>
                                                                        <option value="5" {{$inch == '5' ? 'selected' : ''}}>5</option>
                                                                        <option value="6" {{$inch == '6' ? 'selected' : ''}}>6</option>
                                                                        <option value="7" {{$inch == '7' ? 'selected' : ''}}>7</option>
                                                                        <option value="8" {{$inch == '8' ? 'selected' : ''}}>8</option>
                                                                        <option value="9" {{$inch == '9' ? 'selected' : ''}}>9</option>
                                                                        <option value="10" {{$inch == '10' ? 'selected' : ''}}>10</option>
                                                                        <option value="11" {{$inch == '11' ? 'selected' : ''}}>11</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
										
										
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Eye Color</label>
                                                    <div class="custum-select">
                                                        <select name="eye_id" class="input" id="selEducation">
                                                            <option value="">select</option>
                                                            @foreach($eyecolor as $eye)
                                                            @php
                                                            $selected = ($eye->id == Auth::user()->eye_id) ? "selected" : "";
                                                            @endphp
                                                            <option value="{{$eye->id}}" class="combo option" id="selEducation-0" {{$selected}}>{{$eye->eye_color}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" placeholder="id" value="{{ Auth::user()->id }}" name="user_id" hidden>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Hair Color</label>
                                                    <div class="custum-select">
                                                        <select name="hair_id" class="input" id="selEducation">
                                                            <option value="">select</option>
                                                            @foreach($haircolor as $hair)
                                                            @php
                                                            $selected = ($hair->id == Auth::user()->hair_id) ? "selected" : "";
                                                            @endphp
                                                            <option value="{{$hair->id}}" class="combo option" id="selEducation-0" {{$selected}}>{{$hair->hair_color}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Body Type</label>
                                                    <div class="custum-select">
                                                        <select name="body_type" class="combo">
                                                            @php
                                                            $userBodyType = Auth::user()->body_type;
                                                            @endphp
                                                            <option value="slim" {{$userBodyType == 'slim' ? 'selected' : ''}}>Slim</option>
                                                            <option value="average" {{$userBodyType == 'average' ? 'selected' : ''}}>Average</option>
                                                            <option value="athletic" {{$userBodyType == 'athletic' ? 'selected' : ''}}>Athletic</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Body Weight (kg)</label>
                                                    <input type="text" placeholder="Weight" name="body_weigh" value="{{ Auth::user()->body_weigh }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Religion</label>
                                                    <div class="custum-select">
                                                        <select name="religion_id" class="input" id="selEducation">
                                                            <option value="">select</option>
                                                            @foreach($religion as $reli)
                                                            @php
                                                            $selected = ($reli->id == Auth::user()->religion_id) ? "selected" : "";
                                                            @endphp
                                                            <option value="{{$reli->id}}" class="combo option" id="selEducation-0" {{$selected}}>{{$reli->religion_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box mb-1">
                                                    <label>My friend and family tell about me</label>
                                                </div>
                                                <div class="my-input-box">
                                                    @foreach($fritell as $fritellItem)
                                                    @php
                                                    $checked = in_array($fritellItem->id, $friendtell->pluck('friend_family_tell_id')->toArray()) ? 'checked' : '';
                                                    @endphp
                                                    <label class="labelforcustom">
                                                        <input value="{{ $fritellItem->id }}" {{ $checked }} name="friend_family_tell_id[]" type="checkbox" class="option-input checkbox" />
                                                        {{ $fritellItem->friend_family_tell }}
                                                    </label>
                                                    @endforeach
                                                </div>

                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box mb-1">
                                                    <label>My favourite romantic gesture</label>
                                                </div>
                                                <div class="my-input-box">
                                                    @foreach($romantic as $romantic)
                                                    @php
                                                    $checked = in_array($romantic->id, $romaticData->pluck('romantic_gesture_master_id')->toArray()) ? 'checked' : '';
                                                    @endphp
                                                    <label class="labelforcustom">
                                                        <input value="{{$romantic->id}}" {{$checked}} name="romantic_gesture_master_id[]" type="checkbox" class="option-input checkbox" />
                                                        {{$romantic->romantic_gesture}}
                                                    </label>
                                                    @endforeach
                                                </div>
                                            </div>


                                            <div class="buttons  mt-4">
                                                <a class="custom-button" href="{{url('/')}}">Back</a>
                                                <button type="submit" class="main-btn">Save Changes</button>
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