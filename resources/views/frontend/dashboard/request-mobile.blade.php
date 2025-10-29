@include('frontend.bin.all-page-header')
<div class="main-innerpage w-100 float-start">
    <div class="container">
        <div class="innerpages">
            <h2>Request Mobile Number</h2>
            <span><a href="{{url('/')}}"> Home </a> &gt; <span class="font-color-pink">Request Mobile Number</span></span>
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
                    <form method="post">
                        @csrf
                        @php
                            $mobile_number = isset($user_detail["mobile_no"]) ? $user_detail["mobile_no"] :'';
                        @endphp
                        <div class="row align-items-center">
                            <div class="col-md-3">
                                <label class="fw-bold">Mobile Number:</label>
                            </div>

                            <div class="col-md-2">
                                <span>{{$mobile_number}}</span>
                            </div>

                            <div class="col-md-3">
                                <input type="text" name="mobile_no" oninput="this.value = this.value.replace(/\D+/g, '')" maxlength="10" class="form-control" value="{{$mobile_number}}" placeholder="">
                            </div>

                            <div class="col-md-4">
                                <button type="submit" class="main-btn" name="update_mobile_no">Update</button>
                            </div>
                        </div>
                    </form>
				
				@include('frontend.dashboard.dashboard-icon')
				
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
@include('frontend.bin.footer')

<script>
    $(document).ready(function() {
        var id = $('.user_id').val();
        var url = '/api/mobile-request-notification-remove/' + id;
        var csrf = $("[name=_token]").val();
        var base_url = window.location.origin;
        url = base_url + url;
        $.ajax({
            type: 'get',
            url: url,
            success: function(data) {
                $('.MObileCountNot').css('background-color', 'white').show();
            }
        });
    });
</script>