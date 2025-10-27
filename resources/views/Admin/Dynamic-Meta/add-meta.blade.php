@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Add Dynamic Meta</h2>
            <span><a href="index.html"> Home </a> &gt; <span class="font-color-pink">Add Dynamic Meta</span></span>
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
                                <h2>Add <strong>Dynamic Meta</strong> </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="input-info-box">
                                <div class="content">
                                    @if(session('success'))
                                    <h5 class="errorsal w-100 error">
                                        {{ session('success') }}
                                    </h5>
                                    @endif
                                    <form method="POST" action="{{ url('add-meta') }}" enctype=multipart/form-data>
                                        @csrf
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Page Name</label>
                                                    <input type="text" name="page_name" id="" placeholder="Page Name*" class="page_name" required>
                                                    <h6 class="pagenameError error"></h6>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Meta Title</label>
                                                    <input type="text" name="title" id="" placeholder="title" class="Metatitle" required>
                                                    <h6 class="MetatitleError error"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Meta Keyword</label>
                                                    <textarea type="text" name="keywords" id="" placeholder="meta keywords" class="Metakeywords" required></textarea>
                                                    <h6 class="MetakeywordsError2 error"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Meta Description</label>
                                                    <textarea type="text" name="description" id="" placeholder="meta decription*" class="Metadescription" required></textarea>
                                                    <h6 class="MetadescriptionError error"></h6>
                                                </div>
                                            </div>

                                            
                                            <div class="buttons  mt-4">
                                                <a class="custom-button" href="{{url('admin/view-dynamic-meta')}}">Back</a>
                                                <button type="submit" class="main-btn" hidden>Save </button>
                                                <button type="submit" class="main-btn">Save </button>
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