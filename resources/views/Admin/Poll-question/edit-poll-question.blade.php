@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Add Poll Question</h2>
            <span><a href="index.html"> Home </a> &gt; <span class="font-color-pink">Admin</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage ">
    <div class="blog-page pt-5 pb-5 w-100 float-start">
        <div class="container">
            <div class="row">
                @include('Admin.Admin-pages.Left-menu.admin-main-left-menu')
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="my-profile tab-content">
                        <div class="tab-pane active show" id="tab-3">
                            <div class="heading">
                                <h2>Add <strong>Dating Advice</strong> </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="input-info-box">
                                <div class="content">
                                    @if(session('success'))
                                    <h5 class="errorsal w-100 error">
                                        {{ session('success') }}
                                    </h5>
                                    @endif
                                    <form method="POST" action="{{ url('update-poll-question') }}" enctype=multipart/form-data>
                                        @csrf
                                        <div class="row">

                                            @foreach($data as $question)
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Question</label>
                                                    <input type="text" value="{{$question->poll_question_id}}" name="question_id" hidden>
                                                    <input type="text" name="question" id="question" placeholder="question*" class="question" value="{{$question->question}}">
                                                </div>
                                            </div>
                                            @endforeach

                                            <hr>
                                            @foreach($options as $optionId => $optionValue)
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Option</label>
                                                    <input type="text" name="options[]" placeholder="option*" class="option" value="{{$optionValue}}">
                                                    <input type="text" value="{{$optionId}}" name="optionid[]" hidden>
                                                </div>
                                            </div>
                                            @endforeach


                                            <div class="buttons  mt-4">
                                                <a class="custom-button" href="{{url('admin/poll-question')}}">Back</a>
                                                <button type="submit" class="main-btn">Update </button>
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