<section>
    <footer>
        <div class="ind4-footer fadein visible">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="ind4-footer-box-1">
                            <div class="ind4-footer-logo"> <a href="{{url('/')}}"> <img src="{{asset('assets/images/index-3-logo.png')}}" alt="footer-img-logo"> </a> </div>
                            <p class="ind4-footer-text"> Best dating web portal for love and relationship. Avoid toxic environment, check compatibility and fall in love for long time commitment. </p>
                            <ul class="media-icon">
                                <li> <a href="https://www.instagram.com/swanhearth/" target="_blank"> <span> <i class="fa-brands fa-instagram"></i> </span> </a> </li>
                                <li> <a href="https://facebook.com/61559692744196" target="_blank"> <span> <i class="fa-brands fa-facebook-f"></i> </span> </a> </li>
                                <li> <a href="https://x.com/Swanhearth_com" target="_blank"> <span> <i class="fa-brands fa-twitter"></i> </span> </a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="ind4-footer-box-2">
                            <div class="ind4-footer-heading"> Featured Members </div>
                            @foreach($FooterUser as $user)
                            <ul class="first-ul">
                                <li>
                                    <span class="img-box-wrap"> <a href="javascript:">
                                            @if($user->profile_img)
                                            <img src="{{url('assets/images/profile_img'.'/'.$user->profile_img)}}" style="width: 60px;" alt="profile-img">
                                            @else
                                            @if($user->gender == 'male')
                                            <img src="{{ asset('assets/images/profile_img/' . env('MALE')) }}" alt="single-product1" style="width: 60px;" class="img-fluid">
                                            @else
                                            <img src="{{ asset('assets/images/profile_img/' . env('FEMALE')) }}" alt="single-product1" style="width: 60px;" class="img-fluid">
                                            @endif
                                            @endif
                                    </span>
                                </li>
                                <li> <span class="img-text-wrap"> <a href="javascript:;">{{$user->name}} </a><br> {{$user->city}}, {{$user->country}} </span> </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="ind4-footer-box-3">
                            <div class="ind4-footer-heading"> Contact &amp; Support </div>
                            <ul>
                                <li> <a href="{{url('contact-us')}}"> <span class="fa-solid fa-caret-right"></span> Contact Us </a></li>
                                <li> <a href="{{url('faqs')}}"> <span class="fa-solid fa-caret-right"></span> FAQ </a> </li>
                                <li> <a href="{{url('policy')}}"> <span class="fa-solid fa-caret-right"></span> Policy </a> </li>
                                <li> <a href="{{url('terms-and-condition')}}"> <span class="fa-solid fa-caret-right"></span> Terms &amp; Condition </a> </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="ind4-footer-box-4">
                            <div class="ind4-footer-heading"> Recent Activity </div>
                            @foreach($Footerstory as $Footerstory)
                            <ul class="first-ul">
                                <li> <span class="img-box-wrap"> <a href="{{url('dating-stories') . '/' .$Footerstory->slug}}"> <img src="{{url('assets/stories/listing_img'.'/'. $Footerstory->listing_img)}}" alt="footer-img" style="width: 70px;"> </a> </span> </li>
                                <li> <span class="img-text-wrap"> <a href="{{url('dating-stories') . '/' .$Footerstory->slug}}"> {{$Footerstory->title}}</a> {{ \Carbon\Carbon::parse($Footerstory->publish_date)->format('d M Y') }} </span> </li>
                            </ul>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ind4-footer-bottom"> <a href="javascript:void(0)"> Copyright © <?php echo date('Y') ?> Swanhearth. All Rights Reserved. </a> </div>
    </footer>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="{{asset('assets/js/swiper.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assets/js/wow.min.js')}}"></script>
<script src="{{asset('assets/js/user-register.js')}}"></script>
<script src="{{asset('assets/js/user-login.js')}}"></script>
<script src="{{asset('assets/js/frontend.js')}}"></script>
<script src="{{asset('assets/js/jquery.uploader.min.js')}}"></script>
<script src="{{asset('assets/js/Admin-js/admin-login.js')}}"></script>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="{{asset('assets/js/Admin-js/setting-page.js')}}"></script>
<script src="{{asset('assets/js/Admin-js/append.js')}}"></script>
<script src="{{asset('assets/js/dating-advice.js')}}"></script>
<script src="{{asset('assets/js/Admin-js/poll-question.js')}}"></script>
<script src="{{asset('assets/js/match-calculator.js')}}"></script>
<script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.js')}}"></script>
<script src="{{asset('assets/js/range-slider.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/setting.js')}}"></script>

<script>
    // counter js start
    $(document).ready(function($) {
        function isScrolledIntoView(elem) {
            var docViewTop = $(window).scrollTop();
            var docViewBottom = docViewTop + $(window).height();
            var elemTop = $(elem).offset().top;
            var elemBottom = elemTop + $(elem).height();
            return ((elemBottom <= docViewBottom));
        }

        function countUp() {
            $('.counter').each(function() {
                var $this = $(this),
                    countTo = $this.attr('data-count');

                $({
                    countNum: $this.text()
                }).animate({
                        countNum: countTo
                    },

                    {

                        duration: 8000,
                        easing: 'linear',
                        step: function() {
                            $this.text(Math.floor(this.countNum));
                        },
                        complete: function() {
                            $this.text(this.countNum);
                            //alert('finished');
                        }

                    });
            });
        }
        $(document).scroll(function() {
            if (isScrolledIntoView(".counter")) {
                countUp();
            }
        });
    });
</script>
<script>
    new WOW().init();
</script>

<script type="application/javascript">
    let ajaxConfig = {
        ajaxRequester: function(config, uploadFile, pCall, sCall, eCall) {
            let progress = 0
            let interval = setInterval(() => {
                progress += 10;
                pCall(progress)
                if (progress >= 100) {
                    clearInterval(interval)
                    const windowURL = window.URL || window.webkitURL;
                    sCall({
                        data: windowURL.createObjectURL(uploadFile.file)
                    })
                }
            }, 300)
        }
    }
    $("#activityPhotoUploder").uploader({
        multiple: true,
        ajaxConfig: ajaxConfig,
        autoUpload: false
    })
    $("#activityAttachFileUploader").uploader({
        multiple: true,
        ajaxConfig: ajaxConfig,
        autoUpload: false
    })
</script>

<script>
    $('.blog-slider .owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            },
            1366: {
                items: 4
            }
        }
    })
</script>

<script>
    // product Gallery and Zoom

    // activation carousel plugin
    var galleryThumbs = new Swiper('.gallery-thumbs', {
        spaceBetween: 5,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        breakpoints: {
            0: {
                slidesPerView: 3,
            },
            767: {
                slidesPerView: 4,
            }
        }
    });
    var galleryTop = new Swiper('.gallery-top', {
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: galleryThumbs
        },
    });
    // change carousel item height
    // gallery-thumbs
    let productCarouselThumbsItemWith = $('.gallery-thumbs .swiper-slide').outerWidth();
    $('.gallery-thumbs').css('height', productCarouselThumbsItemWith);
</script>


</body>

</html>