@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Detail Stories</h2>
            <span><a href="{{('/')}}"> Home </a> &gt; <span class="font-color-pink">Detail Stories &gt;</span><a href="{{('/')}}"> {{$data->title}} </a></span>
        </div>
    </div>
</div>

<section class="main-innerpage ">
    <div class="blog blog-page blog-single-page w-100 float-start">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="blog-box text-center w-100 float-start">
                        <div class="blog-img">
                            @if($data->detail_img)
                            <img src="{{url('assets/stories/detail_img'.'/'. $data->detail_img)}}" alt="blog-box-img1" class="img-fluid">
                            @else
                            <img src="{{url('assets/stories/listing_img'.'/'. $data->listing_img)}}" alt="blog-box-img1" class="img-fluid">
                            @endif
                        </div>
                        <div class="blog-text text-start">
                            <ul class="list-start">
                                <li>
                                    <a href="#">
                                        @if($data->publish_date)
                                        <span><i class="fa fa-calendar-alt"></i></span>
                                        {{ date('d F Y', strtotime($data->publish_date)) }}
                                        @endif
                                    </a>
                                </li>
                            </ul>
                            <h4>{{$data->title}}</h4>
                            <p>{!! $data->details !!}</p>
                        </div>
                        <button class="main-btn deting-back mt-4" style="float: right;" onclick="window.history.back();">Back</button>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-12">
                    <div class="sidepannal">
                        <div class="pannal-content">
                            @if(Auth::check())
                            <div class="pannal-box">
                                @if(session('success'))
                                <h5 class="errorsal w-100" style="color:green;">
                                    {{ session('success') }}
                                </h5>
                                @endif <h5>Upload your dating Stories</h5>
                                <form method="POST" action="{{ url('add-user-story') }}" enctype=multipart/form-data>
                                    @csrf
                                    <div class="pannal-content">
                                        <div class="my-profile ">
                                            <div class="input-info-box p-0 for-bg-change">
                                                <div class="content">
                                                    <div class="my-input-box mb-2">
                                                        <label>Stories Title</label>
                                                        <input type="text" placeholder="Title" name="title" class="StoryTitle">
                                                    </div>
                                                    <h6 class="StoryTitleError error"></h6>

                                                    <div class="my-input-box mb-2">
                                                        <label>Stories Short Summary</label>
                                                        <input type="text" placeholder="Short Summary" name="summary" class="StorySummary">
                                                    </div>
                                                    <h6 class="StorySummaryError error"></h6>

                                                    <input type="text" class="user_id" id="" name="user_id" value="{{ auth()->user()->id ?? '' }}" hidden>

                                                    <div class="my-input-box mb-1">
                                                        <label>Your Storie</label>
                                                        <textarea placeholder="Description" class="StoryDescription ckeditor" name="details"></textarea>
                                                    </div>
                                                    <h6 class="StoryDescriptionError error"></h6>

                                                    <div class="my-input-box mb-1">
                                                        <label>Stories Photo</label>
                                                        <ul>
                                                            <li>
                                                                <input type="file" id="activityPhotoUploder" value="" name="listing_img" accept="image/jpeg, image/png">
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <h6 class="error imageError"></h6>

                                                    <!-- captcha -->
                                                    <fieldset>
                                                        <div class="rows">
                                                            <div class="capta-register col-sm-2 pr-0 d-flex">
                                                                <img id="imgCaptcha" src="{{ url('captcha') }}" alt="Captcha Image" style="height: 48px;">
                                                                <img src="{{asset('assets/images/arrows-rotate-solid.svg')}}" id="reloadchap" type="button" alt="logo" style="width:20px; margin-left: 20px;" />
                                                            </div>
                                                            <br>
                                                            <div class="my-input-box mb-1">
                                                                <input type="text" placeholder="Enter Captcha" name="captcha_value" class="captach_value chaptchastory pl-2" id="chapcha">
                                                                <h6 id="chapmessage" class="error"></h6>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <button type="button" class="Storyvalid" id="submit-btn" data-check="register" hidden>check</button>
                                                    <!-- captcha -->

                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="button" class="main-btn checkStory">Submit</button>
                                        <button type="submit" class="main-btn submitStory" hidden>Submit</button>
                                    </div>
                                </form>
                            </div>
                            @endif

                            @if(Auth::check())
                            @php
                            $wonstories = DB::table('stories_datings')->where('user_id', Auth::user()->id)->where('status', '!=', 3)->get();
                            @endphp
                            @if($wonstories->isNotEmpty())
                            <div class="pannal-box">
                                <h5>Added Dating Stories </h5>
                                <div class="pannal-content">
                                    <div class="blog-list">
                                        @foreach($wonstories as $story)
                                        <div class="blog-box position-icon">
                                            <div class="blog-list-img">
                                                <img src="{{url('assets/stories/listing_img'.'/'. $story->listing_img)}}" alt="admin-img" class="img-fluid">
                                            </div>
                                            <div class="blog-list-text">
                                                <a href="{{url('dating-stories') . '/' .$story->slug}}" class="h6">{{$story->title}} @if($story->status==1)
                                                    ( active )
                                                    @else
                                                    ( Inactive )
                                                    @endif</a>
                                                <span><?php echo date('d F Y', strtotime($story->updated_at)); ?></span>
                                            </div>
                                            <div class="for-edite-de">
                                                <a href="{{url('dating-stories/edit') . '/' .$story->slug}}"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a href="{{url('dating-stories-delete') . '/' .$story->ref_no}}"><i class="fa-solid fa-trash-can"></i></a>
                                                <a href="{{url('dating-stories') . '/' .$story->slug}}"><i class="fa-regular fa-eye"></i></a>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif

                            <div class="pannal-box">
                                <h5>Recent Dating Stories </h5>
                                <div class="pannal-content">
                                    <div class="blog-list">
                                        @foreach($recent as $recent)
                                        <div class="blog-box">
                                            <div class="blog-list-img">
                                                <img src="{{url('assets/stories/listing_img'.'/'. $recent->listing_img)}}" alt="blog-list-img" class="img-fluid">
                                            </div>
                                            <div class="blog-list-text">
                                                <a href="{{url('dating-stories') . '/' .$recent->slug}}" class="h6">{{$recent->title}}</a>
                                                <span>{{$recent->publish_date}}</span>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="pannal-box">
                                <h5>Social Share</h5>
                                <div class="pannal-content">
                                    <ul class="media-list">
                                        <li><a href="https://www.facebook.com/sharer.php?u={{url('stories-dating') . '/' .$data->slug}}" target="_blank" class="social-button">
                                                <i class="fab fa-facebook-f"></i>
                                            </a></li>
                                        <li> <a href="https://twitter.com/share?ref_src={{url('stories-dating') . '/' .$data->slug}}" class="twitter-share-button" data-text="{{$data->title}}" data-via="swanhearth" data-show-count="false" data-size="large"><i class="fab fa-twitter"></i></a></a></li>
                                    </ul>
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
<script>
    $(document).ready(function() {
        $('#submit-btn').click(function() {
            var captchaValue = $('input[name="captcha_value"]').val();
            //alert(captchaValue);
            if (captchaValue === '') {
                // Captcha value is empty, show an error message
                $('#chapmessage').html('Please enter captcha value');
                $('#chapmessage').show();
                return;
            }
            $.post('{{ route("validate-captcha") }}', {
                _token: '{{ csrf_token() }}',
                captcha_value: captchaValue
            }, function(data) {
                console.log(data);
                $('.loading-spinner').hide();
                $('.loginpage').prop('disabled', false).addClass('classDesign');
                if (data.message == "Captcha validation successful.") { // Captcha value is correct, submit the form
                    $('.submitStory').click();
                } else {
                    // Captcha value is incorrect, show an error message
                    $('#chapmessage').html('Invalid captcha value');
                    $('#chapmessage').show();
                    $('.loginpage').prop('enabled', false).addClass('classenabled');
                }
            });
        });
    });
</script>

<script>
    // Get references to the login button and submit button
    const loginBtn = document.getElementById('login-btn');
    const submitBtn = document.getElementById('submit-btn');
    // Add a click event listener to the login button
    loginBtn.addEventListener('click', function() {
        // Trigger a click event on the submit button
        submitBtn.click();
    });
</script>



<script>
    document.getElementById("reloadBtn").addEventListener("click", function() {
        var captchaImg = document.getElementById("imgCaptcha");
        var captchaSrc = captchaImg.src;
        captchaImg.src = captchaSrc.split("?")[0] + "?" + new Date().getTime();
    });
</script>

<!-- chapcha reload function -->
<script>
    const reload = document.querySelector('#reloadchap');
    reload.addEventListener('click', function() {
        const captchaImg = document.querySelector('#imgCaptcha');
        captchaImg.src = "{{ url('captcha') }}?rand=" + Math.random();
    });
</script>