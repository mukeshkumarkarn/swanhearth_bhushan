@include('frontend.bin.head-tags')
<header class="w-100 float-start">
    <div class="main-header w-100 float-start mb-0 mt-5">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-2 col-6 p-0">
                    <div class="main-header-logo"> <a href="{{url('/')}}"> <img src="{{asset('assets/images/inner-logo.png')}}" class="img-fluid" alt="logo"> </a> </div>
                </div>
                <div class="col-lg-10 col-6 p-0">
                    @include('frontend.bin.page-menu')
                </div>
            </div>
        </div>
    </div>
    <div class="banner-shap"> <img src="{{asset('assets/images/banner-shape1.png')}}" alt="banner-shape1" class="img-fluid"> <img src="{{asset('assets/images/banner-shape2.png')}}" alt="banner-shape2" class="img-fluid"> </div>
    <div class="shadow-img"> </div>
</header>
</div>