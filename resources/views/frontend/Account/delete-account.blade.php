@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Delete Account</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Delete Account</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage ">
    <div class="blog-page pt-5 pb-5 w-100 float-start">
        <div class="container">
            <div class="row">
            @include('frontend.Account.left-menu')
                <div class="col-lg-8 col-md-12 col-12">
                    <div class="my-profile tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <div class="heading">
                                <h2><strong>Delete</strong> Account </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="input-info-box">
                                <div class="content">
                                    @if(session('success'))
                                    <h5 class="errorsal w-100" style="color:green;">
                                        {{ session('success') }}
                                    </h5>
                                    @endif

                                    <a data-bs-toggle="modal" data-email="" data-bs-target="#staticBackdrop" class="main-btn StoriesMail">Delete Account</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-left">
                    <div class="input-info-box">
                        <div class="content">
                            <div class="row">
                                <h5 class="text-center">Are You Sure Delete Account</h5>
                                <form action="{{url('own-user-delete-account')}}" method="get" class="text-center" enctype=multipart/form-data>
                                    @csrf
                                    <div class="form-group text-center p-3">
                                        <input type="text" class="user_id" name="user_id" value="{{Auth::user()->id}}" hidden>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="main-btn" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="main-btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')