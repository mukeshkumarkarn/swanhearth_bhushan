@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Admin</h2>
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
                                    <form method="POST" action="{{ url('dating-advice-update') }}" enctype=multipart/form-data>
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Title</label>
                                                    <input type="text" name="title" id="" placeholder="title*" class="nameedit" value="{{$data->title}}">
                                                    <h6 class="error blognameerroredit"></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Short Summary</label>
                                                    <input type="text" name="summary" id="" placeholder="short detail*" class="summaryedit" value="{{$data->short_description}}">
                                                    <h6 class="blogsummaryerroredit error"></h6>
                                                </div>
                                            </div>

                                            <input type="text" value="{{$data->ref_no}}" name="ref_no" hidden>


                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Description</label>
                                                    <textarea class="ckeditor" name="details">{{$data->long_description}}</textarea>
                                                    <h6 class="blogdetailserroredit error"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Home Page Upload Image</label>
                                                    <ul>
                                                        <li>
                                                            <input type="file" name="home_img" class="activityPhotoUploder" value="">
                                                            @if($data->home_img)
                                                            <a href="{{url('assets/dating-advice/home_img').'/'.$data->home_img}}" target="_blank" rel="noopener noreferrer">
                                                                <img src="{{url('assets/dating-advice/home_img').'/'.$data->home_img}}" alt="Thumbnail" style="max-width: 100px; max-height: 100px;">
                                                            </a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Listing Upload Image</label>
                                                    <ul>
                                                        <li>
                                                            <input type="file" name="listing_img" class="activityPhotoUploder" value="">
                                                            @if($data->listing_img)
                                                            <a href="{{url('assets/dating-advice/listing_img').'/'.$data->listing_img}}" target="_blank" rel="noopener noreferrer">
                                                                <img src="{{url('assets/dating-advice/listing_img').'/'.$data->listing_img}}" alt="Thumbnail" style="max-width: 100px; max-height: 100px;">
                                                            </a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Details Upload Image</label>
                                                    <ul>
                                                        <li>
                                                            <input type="file" name="detail_img" class="activityPhotoUploder" value="">
                                                            @if($data->detail_img)
                                                            <a href="{{url('assets/dating-advice/detail_img').'/'.$data->detail_img}}" target="_blank" rel="noopener noreferrer">
                                                                <img src="{{url('assets/dating-advice/detail_img').'/'.$data->detail_img}}" alt="Thumbnail" style="max-width: 100px; max-height: 100px;">
                                                            </a>
                                                            @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Slug</label>
                                                    <input type="text" name="slug" id="" placeholder="*" class="slugedit" value="{{$data->slug}}">
                                                    <h6 class="error slugErroredit"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Meta Title</label>
                                                    <input type="text" name="meta_title" id="" placeholder="title*" class="titleedit" value="{{$data->meta_title}}">
                                                    <h6 class="error blogtitleerroredit"></h6>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Meta Keyword</label>
                                                    <input type="text" name="meta_keyword" id="" placeholder="short detail*" class="keywordedit" value="{{$data->meta_keyword}}">
                                                    <h6 class="blogkeyworderroredit error"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="my-input-box">
                                                    <label>Meta description</label>
                                                    <textarea type="text" name="meta_description" id="" placeholder="short detail*" class="descriptionedit">{{$data->meta_description}}</textarea>
                                                    <h6 class="blogdescriptionerroredit error"></h6>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-input">
                                                    <div class="custum-select">
                                                        <label>Status</label>
                                                        <select name="status" class="input staus" id="selEducation">
                                                            @php
                                                            $status = $data->status;
                                                            @endphp
                                                            <option value="1" {{$status == '1' ? 'selected' : ''}}>Active</option>
                                                            <option value="2" {{$status == '2' ? 'selected' : ''}}>Inactive</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="buttons  mt-4">
                                                <a class="custom-button" href="{{url('admin/dating-advice')}}">Back</a>
                                                <button type="button" class="main-btn addblogedit">Update </button>
                                                <button type="submit" class="main-btn submitButtonedit" hidden>Update </button>
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>