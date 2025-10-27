@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Dating Advice</h2>
            <span><a href="{{url('admin/all-users')}}"> Home </a> &gt; <span class="font-color-pink">Dating Advice</span></span>
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
                                <h2> Dating <strong>Advice</strong></h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <a href="{{url('admin/add-dating-advice')}}" class="main-btn" style="float: right;">Add Dating</a>
                                <a href="{{url('admin/active-dating-advice')}}" class="main-btn" style="float: right;">Active Dating</a>
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
                                                    <div class="blog-img"> <img src="{{url('assets/dating-advice/listing_img'.'/'. $datas->listing_img)}}" alt="ind3-blog-img-1" class="img-fluid"> </div>
                                                    <div class="blog-text p-3">
                                                        <ul class="tag-list">
                                                            <li><a href="javascript:;"><span><i class="fas fa-tags"></i></span> By Admin</a>
                                                            </li>
                                                            @php
                                                            $dateString = $datas->updated_at;
                                                            $formattedDate = date('j F Y', strtotime($dateString));
                                                            @endphp
                                                            <li><a href="javascript:;"><span><i class="far fa-calendar-alt"></i></span>
                                                                    {{$formattedDate}}</a></li>

                                                        </ul>
                                                        <a href="{{url('admin/dating-advice') . '/' .$datas->slug}}" class="h4">{{$datas->title}}</a>
                                                        <a href="{{url('admin/dating-advice/edit') . '/' .$datas->slug}}" class="h4" title="Edit"><i class="fa-regular fa-pen-to-square"></i></a>

                                                        <p>{{$datas->summary}} </p>

                                                    </div>
                                                    <div class="buttons admin-storie">
                                                        @if($datas->status == 2)
                                                        <a href="{{url('dating-advice-active') . '/' .$datas->slug}}" class="main-btn">Active</a>
                                                        @else
                                                        <a href="{{url('dating-advice-inactive') . '/' .$datas->slug}}" class="main-btn">Inactive</a>
                                                        @endif
                                                        <a href="{{url('admin/dating-advice') . '/' .$datas->slug}}" class="main-btn">Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>

                                        <div class="d-flex justify-content-center">
                                            {{ $data->links('pagination::bootstrap-4') }}
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