@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Preferred Match</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Preferred Match</span></span>
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
                        <div class="tab-pane active show" id="tab-6">
                            <div class="heading">
                                <h2><strong>Preferred</strong> Match </h2>
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
                                    <form method="POST" action="{{ url('user-preferred-matchs-update') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Education</label>
                                                    <div class="custum-select">
                                                        <select name="high_qualification_id" class="input" id="selEducation">
                                                            <option value="">select</option>
                                                            @if($qualification && count($qualification) > 0)
                                                            @foreach($qualification as $qua)
                                                            @php
                                                            $selected = ($perfectMatch && $qua->id == $perfectMatch->high_qualification_id) ? "selected" : "";
                                                            @endphp
                                                            <option value="{{$qua->id}}" class="combo option" id="selEducation-0" {{$selected}}>{{$qua->qualification_name}}</option>
                                                            @endforeach
                                                            @endif

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" placeholder="id" value="{{ Auth::user()->id }}" name="user_id" hidden>

                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Zipcode/Pincode </label>
                                                    <input type="text" placeholder="Pin" id="pincode" value="{{ $perfectMatch ? $perfectMatch->pincode : '' }}" name="pincode" class="pincode">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>State </label>
                                                    <input type="text" id="state" placeholder="State" name="state" class="state" value="{{ $perfectMatch ? $perfectMatch->state : '' }}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>City </label>
                                                    <input type="text" id="city" placeholder="City" name="city" class="city" value="{{ $perfectMatch ? $perfectMatch->city : '' }}">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box mb-1">
                                                    <label>Marital status</label>
                                                </div>
                                                <div class="my-input-box">
                                                    @if($meri && count($meri) > 0)
                                                    @foreach($meri as $mari)
                                                    @php
                                                    $checked = ($perfectMatch && $mari->id == $perfectMatch->marital_status_id) ? "checked" : "";
                                                    @endphp
                                                    <label class="labelforcustom">
                                                        <input type="radio" {{$checked}} value="{{ $mari->id }}" name="marital_status_id" class="option-input radio" />
                                                        {{ $mari->marital_status }}
                                                    </label>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Religion</label>
                                                    <div class="my-input-box">
                                                        @if($relis && count($relis) > 0)
                                                        @foreach($relis as $re)
                                                        @php
                                                        $checked = ($perfectMatch && $re->id == $perfectMatch->religion_id) ? "checked" : "";
                                                        @endphp
                                                        <label class="labelforcustom">
                                                            <input type="radio" {{$checked}} value="{{ $re->id }}" name="religion_id" class="option-input radio" />
                                                            {{ $re->religion_name }}
                                                        </label>
                                                        @endforeach
                                                        @endif
                                                    </div>
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

                                                                    <select name="height" class="combo">
                                                                        @php
                                                                        $feet = optional($perfectMatch)->height;
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

                                                                    <select name="Inch" class="combo">
                                                                        @php
                                                                        $inch = optional($perfectMatch)->Inch;
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
                                                                    </select>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="buttons  mt-4">
                                            <a class="custom-button" href="{{url('/')}}">Back</a>
                                                <button type="submit" class="main-btn">Update</button>
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