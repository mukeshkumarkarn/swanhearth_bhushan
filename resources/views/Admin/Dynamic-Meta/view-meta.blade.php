@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>View Dynamic Meta</h2>
            <span><a href=""> Home </a> &gt; <span class="font-color-pink">View Dynamic Meta</span></span>
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
                        <div class="tab-pane active show" id="tab-1">

                            <div class="heading">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                    <a href="{{url('admin/add-dynamic-meta')}}" class="main-btn" style="float: right;">Add Dynamic Meta</a>
                                </div>
                                <h2>View <strong>Dynamic Meta</strong> </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>

                            @if(session('success'))
                            <h5 class="errorsal w-100 error">
                                {{ session('success') }}
                            </h5>
                            @endif
                            <div class="content">
                                <div class="row">

                                    @php
                                    $i = 0;
                                    @endphp
                                    @foreach ($data as $datas)
                                    <div class="col-md-12">
                                        <div class="friends-box">
                                            <div class="friends-img">
                                            </div>
                                            <div class="friend-name">
                                                <h4>{{ ++$i }}. {{ $datas->page_name }}
                                                </h4>
                                                

                                              <p>Meta Title :- {{ $datas->title }}</p>
                                              <p>Meta Keyword :- {{ $datas->keywords }}</p>
                                              <p>Meta Description :- {{ $datas->description }}</p>


                                            </div>
                                            <div class="request-btn d-flex">
                                                <a href="{{ url('admin/edit-dynamic-meta') . '/' . $datas->id }}" class="main-btn">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

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