@include('Admin.bin.header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>MemberShip View</h2>
            <span><a href=""> Home </a> &gt; <span class="font-color-pink">Admin</span></span>
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
                                <h2>MemberShip <strong>view</strong> </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="content">
                                <div class="row">
                                    @foreach($data as $datas)
                                    <div class="col-md-12">
                                        <div class="friends-box">
                                            <div class="friends-img">
                                            </div>
                                            <div class="friend-name">
                                                <h4>Name - {{$datas->name}}</h4>
                                                <p>Email - {{$datas->email}}</p>
                                                <p>Subscription Plan - {{$datas->subscription_plan}}</p>
                                                <p>Subscription Start Date - {{$datas->subscription_start_date}}</p>
                                                <p>Subscription End Date - {{$datas->subscription_end_date}}</p>
                                                <p>Amount - {{$datas->fee}}</p>
                                                <p>Order id - {{$datas->order_id}}</p>
                                                <p>Transaction id - {{$datas->transaction_id}}</p>

                                            </div>
                                            <div class="request-btn">
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
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
</section>
<div class="clearfix"></div>

@include('frontend.bin.footer')