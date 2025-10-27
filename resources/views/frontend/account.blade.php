@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>My Account</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">My Account</span></span>
        </div>
    </div>
</div>

<section class="main-innerpage">

@include('frontend.user_details')


</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')