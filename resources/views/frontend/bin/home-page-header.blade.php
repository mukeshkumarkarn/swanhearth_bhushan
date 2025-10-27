@include('frontend.bin.head-tags')
<div id="header">
  <header class="w-100 float-start">
    <div class="main-header main-header-three w-100 float-start">
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-2 col-6 p-0">
            <div class="main-header-logo-3"> <a href="{{url('/')}}"> <img src="{{asset('assets/images/index-3-logo.png')}}" class="img-fluid" alt="logo"> </a> </div>
          </div>
          <div class="col-lg-10 col-6 p-0">
          @include('frontend.bin.page-menu')
          </div>
        </div>
      </div>
    </div>
  </header>
</div>