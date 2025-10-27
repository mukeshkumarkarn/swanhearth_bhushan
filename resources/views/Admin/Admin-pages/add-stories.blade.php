@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Add Stories By Admin</h2>
            <span><a href="index.html"> Home </a> &gt; <span class="font-color-pink">Add stories</span></span>
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

                        <div class="tab-pane active show" id="tab-5">
                            <div class="heading">
                                <h2> Add Stories <strong>by Admin</strong></h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="input-info-box">
                                <div class="content">
                                    @if(session('success'))
                                    <h5 class="errorsal w-100 error">
                                        {{ session('success') }}
                                    </h5>
                                    @endif
                                    <form method="POST" action="{{ url('story-add') }}" enctype=multipart/form-data>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Title</label>
                                                    <input type="text" name="title" id="" placeholder="title*" class="name">
                                                    <h6 class="error blognameerror"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Short Summary</label>
                                                    <input type="text" name="summary" id="" placeholder="short summary*" class="summary">
                                                    <h6 class="blogsummaryerror error"></h6>
                                                </div>
                                            </div>



                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Description</label>
                                                    <textarea class="ckeditor" name="details"></textarea>
                                                    <h6 class="blogdetailserror error"></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Home Page Upload Image</label>
                                                    <ul>
                                                        <li>
                                                            <input type="file" name="home_img" class="activityPhotoUploder home_img" value="">
                                                            <h6 class="homeImgerror error"></h6>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Listing Upload Image</label>
                                                    <ul>
                                                        <li>
                                                            <input type="file" name="listing_img" class="activityPhotoUploder listing_img" value="">
                                                            <h6 class="shortImgerror error"></h6>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Details Upload Image</label>
                                                    <ul>
                                                        <li>
                                                            <input type="file" name="detail_img" class="activityPhotoUploder detail_img" value="">
                                                            <h6 class="blogimageerror error"></h6>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Slug</label>
                                                    <input type="text" name="slug" id="" placeholder="slug*" class="slug">
                                                    <h6 class="slugError error"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Meta Title</label>
                                                    <input type="text" name="meta_title" id="" placeholder="title*" class="title">
                                                    <h6 class="error blogtitleerror"></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Meta Keyword</label>
                                                    <input type="text" name="meta_keyword" id="" placeholder="short detail*" class="keyword">
                                                    <h6 class="blogkeyworderror error"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Meta description</label>
                                                    <textarea type="text" name="meta_description" id="" placeholder="short detail*" class="description"></textarea>
                                                    <h6 class="blogdescriptionerror error"></h6>
                                                </div>
                                            </div>

                                            <div class="buttons  mt-4">
                                                <a class="custom-button" href="{{url('admin/dating-stories')}}">Back</a>
                                                <button type="button" class="main-btn addblog">Save </button>
                                                <button type="submit" class="main-btn submitButton" hidden>Save </button>
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