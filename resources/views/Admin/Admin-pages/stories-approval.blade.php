@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Dating Stories</h2>
            <span><a href="{{('admin/all-users')}}"> Home </a> &gt; <span class="font-color-pink">Dating Stories</span></span>
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


                        <div class="tab-pane active show" id="tab-4">
                            <div class="heading">
                                <h2> Dating <strong>Stories</strong></h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <a href="{{url('admin/add-stories')}}" class="main-btn" style="float: right;">Add Stories</a>
                                <a href="{{url('admin/active-stories')}}" class="main-btn" style="float: right;">Active Stories</a>
                            </div>
                            @if(session('success'))
                            <h5 class="errorsal w-100 error">
                                {{ session('success') }}
                            </h5>
                            @endif
                            <div class="content">
                                <div class="blog blog-wrap-2 p-0">

                                    <div class="w-100 float-start">
                                        <div class="row">
                                            @foreach($data as $datas)
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="blog-box text-center">
                                                    <div class="blog-img"> <img src="{{url('assets/stories/listing_img'.'/'. $datas->listing_img)}}" alt="ind3-blog-img-1" class="img-fluid"> </div>

                                                    <div class="blog-text p-3">
                                                        <ul class="tag-list">
                                                            <li><a href="javascript:;"><span><i class="fas fa-tags"></i></span>
                                                                    @if($datas->name)
                                                                    {{$datas->name}}
                                                                    @else
                                                                    By Admin
                                                                    @endif
                                                                </a>
                                                            </li>
                                                            @php
                                                            $dateString = $datas->updated_at;
                                                            $formattedDate = date('j F Y', strtotime($dateString));
                                                            @endphp
                                                            <li><a href="javascript:;"><span><i class="far fa-calendar-alt"></i></span>
                                                                    {{$formattedDate}}</a></li>

                                                        </ul>
                                                        <a href="{{url('admin/dating-stories') . '/' .$datas->slug}}" class="h4">{{$datas->title}}</a>
                                                        <a href="{{url('admin/stories-edit') . '/' .$datas->slug}}" class="h4"><i class="fa-regular fa-pen-to-square"></i></a>

                                                        <p>{{$datas->summary}} </p>

                                                    </div>
                                                    <div class="buttons admin-storie">
                                                        <a href="{{url('stories-active') . '/' .$datas->slug}}" class="main-btn">Approval</a>
                                                        <a data-bs-toggle="modal" data-email="{{$datas->email}}" data-bs-target="#staticBackdrop" class="main-btn StoriesMail">Review</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            {{ $data->links('pagination::bootstrap-4') }}
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="staticBackdropLabel">Stories Review</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-left">
                                                        <div class="input-info-box">
                                                            <div class="content">
                                                                <div class="row">
                                                                    <h6 class="message" style="color:green;"></h6>
                                                                    <div class="col-md-12">
                                                                        <div class="my-input-box">
                                                                            <label>Email</label>
                                                                            <input type="text" placeholder="Email" class="storiesEmail">
                                                                            <h6 class="storiesEmailError error"></h6>
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <div class="my-input-box">
                                                                            <label>Comment</label>
                                                                            <textarea placeholder="Comment" class="storiesComment"></textarea>
                                                                            <h6 class="storiesCommentError error"></h6>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="main-btn" data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="main-btn SendMailStories-User">Sent</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
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