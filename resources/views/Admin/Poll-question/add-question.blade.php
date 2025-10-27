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
                                    <form method="POST" action="{{ url('add-question') }}" enctype=multipart/form-data>
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Question</label>
                                                    <input type="text" name="question" id="" placeholder="question*" class="question">
                                                    <h6 class="questionError error"></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>option 1</label>
                                                    <input type="text" name="options[]" id="" placeholder="option 1*" class="option1">
                                                    <h6 class="optionError1 error"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>option 2</label>
                                                    <input type="text" name="options[]" id="" placeholder="option 2*" class="option2">
                                                    <h6 class="optionError2 error"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>option 3</label>
                                                    <input type="text" name="options[]" id="" placeholder="option 3*" class="option3">
                                                    <h6 class="optionError3 error"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>option 4</label>
                                                    <input type="text" name="options[]" id="" placeholder="option 4*" class="option4">
                                                    <h6 class="optionError4 error"></h6>
                                                </div>
                                            </div>

                                            <div class="buttons  mt-4">
                                                <a class="custom-button" href="{{url('admin/poll-question')}}">Back</a>
                                                <button type="submit" class="main-btn questionsubmit" hidden>Save </button>
                                                <button type="button" class="main-btn questioncheck">Save </button>
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