@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Image Gallery</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Image Gallery</span></span>
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
                        <div class="tab-pane active show" id="tab-5">
                            <div class="heading">
                                <h2><strong>Image</strong> Gallery </h2>
                                <div class="heart-line"> <i class="fas fa-heart"></i> </div>
                            </div>
                            <div class="input-info-box">
                                <div class="content">
                                    <h5 class="messageShow"></h5>
                                    @if(session('success'))
                                    <h5 class="errorsal w-100" style="color:green;">
                                        {{ session('success') }}
                                    </h5>
                                    @endif

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif


                                    <div class="header mb-0">
                                        Profile Image
                                    </div>
                                    @if(Auth::user()->profile_img)
                                    <div class="gallery">
                                        <div class="">
                                            <a href="{{url('assets/images/profile_img').'/'.Auth::user()->profile_img}}" target="_blank" rel="noopener noreferrer">
                                                <img src="{{url('assets/images/profile_img').'/'.Auth::user()->profile_img}}" alt="Thumbnail" style="max-width: 100px; max-height: 100px;">
                                            </a>
                                        </div>
                                    </div>
                                    @endif
                                    <div class="header mb-0 mt-3">
                                        Upload Profile Image
                                    </div>
                                    <form method="POST" action="{{ url('profile-img') }}" enctype=multipart/form-data>
                                        @csrf
                                        <input type="text" placeholder="id" value="{{ Auth::user()->id }}" name="user_id" hidden>
                                        <div class="col-md-6">
                                            <div class="my-input-box">
                                                <input type="file" placeholder="image" name="profile_img" class="image" accept="image/jpeg, image/png" required>
                                            </div>
                                        </div>
                                        <div class="buttons  mt-4">
                                            <button type="submit" class="main-btn">Post</button>
                                        </div>
                                    </form>


                                    <hr>


                                    <div class="header mb-0">
                                        Image Gallery
                                    </div>
                                    <div class="gallery">
                                        @foreach($album as $album)
                                        <div class="gallery-item">
                                            <a href="{{url('assets/images/user_album'.'/'. $album->user_album)}}" data-fancybox="gallery-image" class="for-edit">
                                                <button type="submit" data-reference="{{$album->id}}" class="for-icon-box album-delete"><i class="fa-solid fa-trash-can"></i></button>
                                                <img class="gallery-image" src="{{url('assets/images/user_album'.'/'. $album->user_album)}}" alt="gallery image">
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
                                    @if($albumCont >= 5)
                                    <div class="header mb-0 mt-3">You have reached the maximum limit for album updates.</div>
                                    @elseif(Auth::user()->profile_img == null)
                                    <div class="header mb-0 mt-3">
                                        Upload Image Gallerys
                                    </div>
                                    <form method="POST" action="{{ url('profile-img') }}" enctype=multipart/form-data>
                                        @csrf
                                        <input type="text" placeholder="id" value="{{ Auth::user()->id }}" name="user_id" hidden>
                                        <div class="col-md-6">
                                            <div class="my-input-box">
                                                <input type="file" placeholder="image" name="profile_img" class="image" accept="image/jpeg, image/png" required>
                                            </div>
                                        </div>
                                        <div class="buttons  mt-4">
                                            <button type="submit" class="main-btn">Post</button>
                                        </div>
                                    </form>
                                    @else
                                    <div class="header mb-0 mt-3">
                                        Upload Image Gallerys
                                    </div>
                                    <form method="POST" action="{{ url('user-album-update') }}" enctype=multipart/form-data>
                                        @csrf
                                        <input type="text" placeholder="id" value="{{ Auth::user()->id }}" name="user_id" hidden>
                                        <div class="col-md-6">
                                            <div class="my-input-box">
                                                <input type="file" placeholder="image" name="user_album" class="image" accept="image/jpeg, image/png" required>
                                            </div>
                                        </div>
                                        <div class="buttons  mt-4">
                                            <a class="custom-button" href="{{url('/')}}">Back</a>
                                            <button type="submit" class="main-btn">Post</button>
                                        </div>
                                    </form>
                                    @endif
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