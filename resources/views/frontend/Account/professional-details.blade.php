@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Professional Details</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Professional details</span></span>
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
                                <h2><strong>Professional</strong> Details</h2>
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
                                    <form method="POST" action="{{ url('user-professional-update') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Professional Details</label>
                                                    <textarea placeholder="Description" name="professional_details">{{ Auth::user()->professional_details }}</textarea>
                                                </div>
                                            </div>
										
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Achievement </label>
                                                    <textarea placeholder="Achievement" name="achievement">{{ Auth::user()->achievement }}</textarea>
                                                </div>
                                            </div>
										
                                           
                                            <input type="text" placeholder="id" value="{{ Auth::user()->id }}" name="user_id" hidden>
                                            
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Mother Tongue</label>
                                                    <div class="custum-select">
                                                        <select name="mother_tongue_id" class="input" id="selEducation">
                                                            <option value="">select</option>
                                                            @foreach($language as $hair)
                                                            @php
                                                            $selected = ($hair->id == Auth::user()->mother_tongue_id) ? "selected" : "";
                                                            @endphp
                                                            <option value="{{$hair->id}}" class="combo option" id="selEducation-0" {{$selected}}>{{$hair->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                           
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Languages I Speak</label>
                                                    <div class="custum-select">
                                                        <select name="speak_language_id" class="input" id="selEducation">
                                                            <option value="">select</option>
                                                            @foreach($language as $hair)
                                                            @php
                                                            $selected = ($hair->id == Auth::user()->speak_language_id) ? "selected" : "";
                                                            @endphp
                                                            <option value="{{$hair->id}}" class="combo option" id="selEducation-0" {{$selected}}>{{$hair->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                    
                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Annual Salary</label>
                                                    <div class="custum-select">
                                                        <select name="annual_salary" class="annual_salary" id="annual_salary">
                                                            <option value="">select</option>
                                                            @php
                                                                $salary = Auth::user()->annual_salary;
                                                            @endphp
                                                            @for ($i = 2; $i <= 30; $i += 2)
                                                                <option value="{{ $i }}L" {{ $salary == $i . 'L' ? 'selected' : '' }}>{{ $i }}L</option>
                                                            @endfor
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Political View</label>
                                                    <div class="custum-select">
                                                    <select name="political_view" class="political_view" id="political_view">
                                                        <option value="">select</option>
                                                        @php
                                                            $userPoliticalView = Auth::user()->political_view;
                                                        @endphp
                                                        <option value="Not Political" {{ $userPoliticalView == 'Not Political' ? 'selected' : '' }}>Not Political</option>
                                                        <option value="Conservative" {{ $userPoliticalView == 'Conservative' ? 'selected' : '' }}>Conservative</option>
                                                        <option value="Liberal" {{ $userPoliticalView == 'Liberal' ? 'selected' : '' }}>Liberal</option>
                                                    </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Hobbies</label>
                                                    <div class="custum-select">
                                                        <select name="hobbies_id" class="input" id="selEducation">
                                                            <option value="">select</option>
                                                            @foreach($hobbies as $hair)
                                                            @php
                                                            $selected = ($hair->id == Auth::user()->hobbies_id) ? "selected" : "";
                                                            @endphp
                                                            <option value="{{$hair->id}}" class="combo option" id="selEducation-0" {{$selected}}>{{$hair->hobbie_name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="my-input-box">
                                                    <label>Occupention</label>
                                                    <div class="custum-select">
                                                        <input name="Occupention" type="text" value="{{Auth::user()->Occupention}}">
                                                    </div>
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