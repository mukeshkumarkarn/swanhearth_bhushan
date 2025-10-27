@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Dashboard</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">dashboard</span></span>
        </div>
    </div>
</div>
<section class="main-innerpage ">
    <div class="blog-page pt-5 pb-5 w-100 float-start">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
				
@include('frontend.dashboard.dashboard-leftmenu')				
					
                </div>
                <div class="col-lg-8 col-md-12 col-12">
				
				
				
				
				
												
												
@include('frontend.dashboard.dashboard-icon')												
												
												
												
					
					
					
					
					
					
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footerFrontend')